<?php

class Api extends CI_Controller
{
	//---------------------------------------------------------------------------------------------------

    public function __construct() 
    {
        parent::__construct();
        $this->load->model('user_model');

        $this->load->library('curl');
    }

	//---------------------------------------------------------------------------------------------------

    private function _require_login()
    {
        if ($this->session->userdata('user_id') == false) {
        	$this->output->set_header('refresh:2; url="/"'); 
            $this->output->set_output('redircting');
            return 0;
        }
        return 1;
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
	// CRUD APIs
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