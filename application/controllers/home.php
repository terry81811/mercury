<?php

class Home extends CI_Controller
{
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('story_model');
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

    private function _require_register()
    {
        $user_id = $this->_require_login();
        $user = $this->user_model->get($user_id);

        if($user[0]['user_nickname'] == false){
            redirect('/register');
        }

        return 0;
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
        if ($this->session->userdata('user_id') == false) {
			$data['fb_login_url'] = $this->_fb_login_url();	
			$data['login_logout_url'] = $this->_fb_login_url();	
			$data['login_logout_text'] = 'Sign Up';	

			$users = $this->user_model->get();
			$data['users_count'] = sizeof($users);	

			$this->load->view('index/twenty_head');
			$this->load->view('index/index',$data);
			$this->load->view('index/twenty_footer');

        }else{

			$user_id = $this->_require_login();
	        $this->_require_register();
			$user = $this->_get_user_byid($user_id);
			$data['user_name'] = $user[0]['user_name'];

			$data['fb_login_url'] = $this->_fb_login_url();	
			$data['login_logout_url'] = '/api/logout';	
        	$data['login_logout_text'] = 'Sign Out';	
        	
			$users = $this->user_model->get();
			$data['users_count'] = sizeof($users);	

			$this->load->view('index/twenty_head');
			$this->load->view('index/index_login',$data);
			$this->load->view('index/twenty_footer');
        }
	}


	public function story_sent()
	{
		$user_id = $this->_require_login();
        $this->_require_register();

		$user = $this->_get_user_byid($user_id);

		$data['user_name'] = $user[0]['user_name'];
		$data['login_logout_url'] = '/api/logout';	

		$this->load->view('index/twenty_head');
		$this->load->view('index/story_sent',$data);
		$this->load->view('index/twenty_footer');
	}

	public function write_story()
	{
		$user_id = $this->_require_login();
        $this->_require_register();

		$user = $this->_get_user_byid($user_id);
		$data['user_name'] = $user[0]['user_name'];


		$this->load->view('index/twenty_head');
		$this->load->view('index/write_story',$data);		
		$this->load->view('index/write_storyjs');
		$this->load->view('index/twenty_footer');
	}


	public function my_story()
	{
		$user_id = $this->_require_login();
		$user = $this->_get_user_byid($user_id);
		$data['user_name'] = $user[0]['user_name'];
		$data['user_nickname'] = $user[0]['user_nickname'];

		$stories = $this->story_model->get(array('story_user_id' => $user_id));

		$data['stories'] = $stories;
		$this->load->view('index/twenty_head');
		$this->load->view('index/my_story',$data);		
		$this->load->view('index/twenty_footer');
	}

	public function register()
	{
		$user_id = $this->_require_login();
		$user = $this->_get_user_byid($user_id);

        if($user[0]['user_nickname'] == true){
            redirect('/');
        }

		$data['user_name'] = $user[0]['user_name'];


		$this->load->view('index/twenty_head');
		$this->load->view('index/register',$data);		
		$this->load->view('index/twenty_footer');
	}


	//---------------------------------------------------------------------------------------------------
	//	SECOND Campaign
	//---------------------------------------------------------------------------------------------------

	public function test()
	{
		$user_id = $this->_require_login();
        $this->_require_register();

		$user = $this->_get_user_byid($user_id);
		$data['user_name'] = $user[0]['user_name'];
		
			$users = $this->user_model->get();
			$data['users_count'] = sizeof($users);	

			$data['fb_login_url'] = $this->_fb_login_url();	
			$data['login_logout_url'] = '/api/logout';	
        	$data['login_logout_text'] = 'Sign Out';	

		$this->load->view('index/twenty_head');
		$this->load->view('index/test',$data);		
		$this->load->view('index/twenty_footer');
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
	//	Internal pages
	//---------------------------------------------------------------------------------------------------

    private function _admin_require_login()
    {
        if ($this->session->userdata('mercury_admin_login') == 0) {
        	redirect('/mercury_db_login');
        }
        else{
	        return 1;
        }
    }

	public function mercury_db_login()
	{
		if($this->session->userdata('mercury_admin_login') == 1){
			redirect('mercury_db');
		}
		else{
			$this->load->view('admin/header');
			$this->load->view('admin/login');
			$this->load->view('admin/footer');
		}
	}

	public function mercury_db()
	{
		$this->_admin_require_login();

		$male = $this->user_model->get(array('user_gender' => 'male'));
		$female = $this->user_model->get(array('user_gender' => 'female'));

		$users = $this->user_model->get();
		usort($users, function($a, $b) {
		    return $b['user_login_count'] - $a['user_login_count'];
		});

		$data['users'] = $users;
		$data['male_count'] = sizeof($male);
		$data['female_count'] = sizeof($female);
		$this->load->view('admin/header');
		$this->load->view('admin/mercury_db',$data);
		$this->load->view('admin/footer');
	}

	public function mercury_db_story()
	{
		$this->_admin_require_login();

		$male = $this->user_model->get(array('user_gender' => 'male'));
		$female = $this->user_model->get(array('user_gender' => 'female'));

		$stories = $this->story_model->get();

		foreach ($stories as $_key => $story) {
			$story_writer = $this->user_model->get($story['story_user_id']);
			$stories[$_key]['story_writer'] = $story_writer[0]['user_name'];
			$stories[$_key]['story_writer_nickname'] = $story_writer[0]['user_nickname'];
		}

		$data['stories'] = $stories;
		$data['male_count'] = sizeof($male);
		$data['female_count'] = sizeof($female);
		$this->load->view('admin/header');
		$this->load->view('admin/mercury_db_story',$data);
		$this->load->view('admin/footer');
	}

	public function mercury_mail()
	{
		$this->_admin_require_login();

		$this->load->view('admin/header');
		$this->load->view('admin/mercury_mail');
		$this->load->view('admin/footer');
	}


	//---------------------------------------------------------------------------------------------------



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