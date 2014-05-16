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
    // private validattion
    //---------------------------------------------------------------------------------------------------

    private function _require_login()
    {
        if ($this->session->userdata('user_id') == false) {
            redirect('/');
        }
        return $this->session->userdata('user_id');
    }

    private function _require_register()
    {
        $user_id = $this->_require_login();
        $user = $this->user_model->get($user_id);

        if($user[0]['user_nickname'] == false){
            redirect('/register');
        }

        return 0;
    }

    private function _admin_require_login()
    {
        if ($this->session->userdata('mercury_admin_login') == 0) {
            redirect('/mercury_db_login');
        }
        else{
            return 1;
        }
    }

    //---------------------------------------------------------------------------------------------------
    // LOGIN/LOGOUT
    //---------------------------------------------------------------------------------------------------


	public function login()
	{

			if($this->session->userdata('user_id')){
                $user_id = $this->session->userdata('user_id');
                $user = $this->user_model->get($user_id);
                if($user[0]['user_nickname'] == false){
                    redirect('/register');
                }
                else{
                    redirect('/write_story');
                }
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
                    $this->update_user_login_count($user_id);
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

    public function update_user_login_count($user_id = null)
    {
        $user = $this->user_model->get($user_id);
        $user_login_count = $user[0]['user_login_count'];
        $result = $this->user_model->update(['user_login_count' => $user_login_count +1 ], $user_id);
        return $result;
    }

    public function register()
    {
        $user_id = $this->_require_login();

        $post_data = $this->input->post(NULL, TRUE);

        $user_email = $post_data['user_email'];        
        $user_school = $post_data['user_school'];
        $user_department = $post_data['user_department'];
        $user_nickname = $post_data['user_nickname'];

        $user_data = array(
            'user_email' => $user_email,
            'user_school' => $user_school,
            'user_department' => $user_department,
            'user_nickname' => $user_nickname,
            'user_update_time' => date("Y-m-d H:i:s")
            );

        $result = $this->user_model->update($user_data, $user_id);
        redirect('/write_story');

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
        $this->_require_register();

        $post_data = $this->input->post(NULL, TRUE);

        $user_data = array(
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
    // EMAIL
    //---------------------------------------------------------------------------------------------------

    public function email_api()
    {
        $this->_admin_require_login();
        $post_data = $this->input->post(NULL, TRUE);

        print_r($post_data);

        $email_type = $post_data['email_type']; 
        
        if($email_type == 'all'){
            $users = $this->user_model->get();
            foreach ($users as $_key => $user) {
                $email_to[] = $user['user_email'];
            }

        }else if($email_type == 'active-user'){

        }else if($email_type == 'inactive-user'){

        }else if($email_type == 'self-def'){
            $email_to = explode(",", $post_data['email_to']);
        }

//        print_r($email_to);

        $email_subject = $post_data['email_subject'];
        
        $email_message = $post_data['email_message'];
        $email_message = "<p>".$email_message."</p>";

        $this->send_email($email_subject,$email_message,$email_to);
    }

    private function send_email($email_subject = NULL, $email_message = NULL, $email_to = NULL)
    {
        $this->load->library('email');

            $email_message = "<h4>Dear Mercury瓶中信用戶</h4>".$email_message."<h4>best regards,<br>Mercury團隊 敬上</h4>";

            $this->email->from('service.mercury.so@gmail.com', 'Mercury瓶中信');
            $this->email->subject($email_subject);
            $this->email->message($email_message); 

            foreach ($email_to as $_key => $_receiver) {
                $this->email->to($_receiver); 
                $this->email->send();
            }
    }


    public function email_test($order_id)
    {
        $this->confirm_email($order_id,1,1,'terrytsai0811@gmail.com');
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

}