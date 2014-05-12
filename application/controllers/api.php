<?php

class Api extends CI_Controller
{
	//---------------------------------------------------------------------------------------------------

    public function __construct() 
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('story_model');

        $this->load->library('curl');
    }

	//---------------------------------------------------------------------------------------------------

    private function _require_login()
    {
        if ($this->session->userdata('user_id') == false) {
            redirect('/');
        }
        return $this->session->userdata('user_id');
    }

	//---------------------------------------------------------------------------------------------------


	public function login()
	{

			if($this->session->userdata('user_id')){
				redirect('/write_story');
			}

		//query fb user
            $fbuser = $this->facebook->getUser();
                try {
                    $data['user_profile'] = $this->facebook->api('/me');
                } catch (FacebookApiException $e) {
                    error_log($e);
                    $fbuser = NULL;
                }

            //user FB query ok
            if($fbuser) 
            {
            	$is_old = $this->get_user_byfbid($data['user_profile']['id']);

                if(!empty($is_old))
                {
			        $user_id = $is_old[0]['user_id'];
			        $this->session->set_userdata('user_id', $is_old[0]['user_id']);             
			        $this->session->set_userdata('user_fbid', $is_old[0]['user_fbid']);
			        $this->update_user_login_time($user_id);
			        redirect('/write_story');
                }
                else
                {
                	$user_data = array(
                		'user_name' => $data['user_profile']['name'],
			            'user_fbid' => $data['user_profile']['id'],
			            'user_email' => $data['user_profile']['email'],
                        'user_gender' => $data['user_profile']['gender'],
			            'user_reg_time' => date("Y-m-d H:i:s"),
			            'user_update_time' => date("Y-m-d H:i:s")
			            );

                	$user_fbid = $data['user_profile']['id'];
                	$user_id = $this->insert_user($user_data);

			        $this->session->set_userdata('user_id', $user_id);             
			        $this->session->set_userdata('user_fbid', $user_fbid);
			        redirect('/write_story');
                }

            }

            //user FB query fail, facebook->getUser failed
            else{
                $this->facebook->destroySession();
                redirect('/');

            }
	}


	public function logout()
	{
        $this->session->unset_userdata('user_fbid');
		$this->session->unset_userdata('user_id');
        // Logs off session from website
        $this->facebook->destroySession();
        redirect('/');
	}   	





	//---------------------------------------------------------------------------------------------------
	// CRUD APIs - USERS
	//---------------------------------------------------------------------------------------------------

	public function insert_user($user_data)
	{
        $user_id = $this->user_model->insert($user_data);
		return $user_id;
	}


    public function get_user_byfbid($user_fbid = null)
    {
    	$user_id = $this->user_model->get(array('user_fbid' => $user_fbid));
    	return $user_id;
    }

    public function update_user_login_time($user_id = null)
    {
		$result = $this->user_model->update(['user_update_time' => date("Y-m-d H:i:s")], $user_id);
    	return $result;
    }


    //---------------------------------------------------------------------------------------------------
    // CRUD APIs - STORIES
    //---------------------------------------------------------------------------------------------------

    private function story_code()
    {
        $code = substr(md5(rand()), 0, 4);
        return $code;
    }

    public function write_story()
    {
        $user_id = $this->_require_login();

        $post_data = $this->input->post(NULL, TRUE);

        $user_school = $post_data['user_school'];
        $user_department = $post_data['user_department'];
        $user_nickname = $post_data['user_nickname'];

        $user_data = array(
            'user_school' => $user_school,
            'user_department' => $user_department,
            'user_nickname' => $user_nickname,
            'user_update_time' => date("Y-m-d H:i:s")
            );


        $result = $this->user_model->update($user_data, $user_id);

        $story_subject = $post_data['story_subject'];
        $story_content = $post_data['story_content'];

        $story_data = array(
            'story_user_id' => $user_id,
            'story_subject' => $story_subject,
            'story_content' => $story_content,
            'story_time' => date("Y-m-d H:i:s"),
            'story_code' => $this->story_code()
            );

        $story_id = $this->story_model->insert($story_data);
        $story = $this->story_model->get($story_id);

        $data['story'] = $story;
        $data['login_logout_url'] = '/api/logout';

        redirect('/story_sent');
    }


	//---------------------------------------------------------------------------------------------------
	// Working
	//---------------------------------------------------------------------------------------------------
	

	public function api_test()
	{
		$this->load->view('template/header_view_general');
		$this->load->view('home/public_sea_view');
		$this->load->view('template/footer_view');
	}


	//---------------------------------------------------------------------------------------------------

	public function register()
	{

		if($this->_require_login() != 0){		

			echo $this->_fb_login_url();
			$this->load->view('template/header_view_general');
			$this->load->view('home/public_sea_view');
			$this->load->view('template/footer_view');

		}
	}

}