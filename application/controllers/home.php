<?php

class Home extends CI_Controller
{
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('user_model');
    }

    private function _fb_login_url()
    {
        $login_url = $this->facebook->getLoginUrl(array(
            'scope'         => 'read_stream, publish_stream, email, user_about_me',
            'redirect_uri' => site_url('/api/login'),
        ));

        return $login_url;
    }

    private function _require_login()
    {
        if ($this->session->userdata('user_id') == false) {
        	redirect('/');
        }
        return $this->session->userdata('user_id');
    }

    private function _get_user_byid($user_id = null)
    {
    	$user = $this->user_model->get($user_id);
    	return $user;
    }

	//---------------------------------------------------------------------------------------------------
	//	FIRST Campaign
	//---------------------------------------------------------------------------------------------------

	public function index()
	{
		$data['fb_login_url'] = $this->_fb_login_url();	
		$this->load->view('index/index',$data);
	}


	public function write_story()
	{
		$user_id = $this->_require_login();
		$user = $this->_get_user_byid($user_id);
		$data['user_name'] = $user[0]['user_name'];
		$this->load->view('index/write_story',$data);		
	}

	//---------------------------------------------------------------------------------------------------
	
	public function page()
	{
		$this->_require_login();
		$this->load->view('template/header_view_general');
		$this->load->view('home/page_view');
		$this->load->view('template/footer_view');
	}

	public function cabin()
	{
		$this->_require_login();
		$this->load->view('template/header_view_general');
		$this->load->view('home/cabin_view');
		$this->load->view('template/footer_view');
	}

	public function store()
	{
		$this->_require_login();
		$this->load->view('template/header_view_general');
		$this->load->view('home/store_view');
		$this->load->view('template/footer_view');
	}

	public function write_public()
	{
		$this->_require_login();
		$this->load->view('template/header_view_general');
		$this->load->view('home/write_view');
		$this->load->view('template/footer_view');
	}

	public function write_private()
	{
		$this->_require_login();
		$this->load->view('template/header_view_general');
		$this->load->view('home/write_view');
		$this->load->view('template/footer_view');
	}

	public function bottle_history()
	{
		$this->_require_login();
		$this->load->view('template/header_view_general');
		$this->load->view('home/public_sea_view');
		$this->load->view('template/footer_view');
	}

	public function private_beach()
	{
		$this->_require_login();
		$this->load->view('template/header_view_general');
		$this->load->view('home/public_sea_view');
		$this->load->view('template/footer_view');
	}

	public function public_sea()
	{
		$this->_require_login();
		$this->load->view('template/header_view_general');
		$this->load->view('home/public_sea_view');
		$this->load->view('template/footer_view');
	}

	public function mercury_how()
	{
		$this->_require_login();
		$this->load->view('template/header_view_general');
		$this->load->view('home/public_sea_view');
		$this->load->view('template/footer_view');
	}

	public function advise_us()
	{
		$this->_require_login();
		$this->load->view('template/header_view_general');
		$this->load->view('home/public_sea_view');
		$this->load->view('template/footer_view');
	}




	//---------------------------------------------------------------------------------------------------


	public function register()
	{
		$this->load->view('home/inc/header_view');
		$this->load->view('home/register_view');
		$this->load->view('home/inc/footer_view');
	}


	//---------------------------------------------------------------------------------------------------
	//test
	//---------------------------------------------------------------------------------------------------

	public function test_private_send()
	{


	}


	public function test_private_receive()
	{
		

	}

	public function test_public_send()
	{
		

	}

	public function test_public_receive()
	{
		

	}




}