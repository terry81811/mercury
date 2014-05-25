<?php

class Home extends CI_Controller
{
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('story_model');
        $this->load->model('pick_model');
        $this->load->model('reply_model');
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

    private function _is_user_bottle($story_id = null)
    {
    	if($story_id){
	    	$user_id = $this->_require_login();
	    	$is_user_bottle = $this->pick_model->get(array('pick_story_id' => $story_id, 'pick_picker_id' => $user_id));
	    	if(sizeof($is_user_bottle) == 0){
	    		return 0;
	    	}else{
	    		return 1;
	    	}
    	}
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

	public function my_bottles()
	{
		$user_id = $this->_require_login();
		$user = $this->_get_user_byid($user_id);
		$data['user_name'] = $user[0]['user_name'];
		$data['user_nickname'] = $user[0]['user_nickname'];

		$stories = $this->story_model->get(array('story_user_id' => $user_id));

			$data['fb_login_url'] = $this->_fb_login_url();	
			$data['login_logout_url'] = '/api/logout';	
        	$data['login_logout_text'] = 'Sign Out';	


		$data['stories'] = $stories;
		$this->load->view('index/twenty_head');
		$this->load->view('index/my_bottles',$data);		
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

	public function pick($code_err = null)
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

        	$err = 0;
        	if(!empty($code_err)){
        		$err = 1;
        	}
        		$data['err'] = $err;

		$this->load->view('index/twenty_head');
		$this->load->view('index/pick',$data);		
		$this->load->view('index/pickjs',$data);		
		$this->load->view('index/twenty_footer');
	}

	public function bottles($story_id = null)
	{
		$user_id = $this->_require_login();
        $this->_require_register();

		$user = $this->_get_user_byid($user_id);

		$data['user_name'] = $user[0]['user_name'];
		$data['fb_login_url'] = $this->_fb_login_url();	
		$data['login_logout_url'] = '/api/logout';	
    	$data['login_logout_text'] = 'Sign Out';	

    	//若無指定story，則顯示全部
        if($story_id == null){
        	$picked_story = array();
        	$story = array();
        	$picked_story_ids = $this->pick_model->get(array('pick_picker_id' => $user_id));
        	foreach ($picked_story_ids as $_key => $_value) {
        		$story = $this->story_model->get($_value['pick_story_id']);
        		$user = $this->user_model->get($story[0]['story_user_id']);
        		
        		$story[0]['user_nickname'] = $user[0]['user_nickname'];
        		$story[0]['user_school'] = $user[0]['user_school'];
        		$story[0]['user_department'] = $user[0]['user_department'];

        		$picked_story[] = $story[0];
        	}

        	$data['picked_story'] = $picked_story;
			$this->load->view('index/twenty_head');
			$this->load->view('index/bottles',$data);		
			$this->load->view('index/twenty_footer');

        }else{

        	$story = $this->story_model->get($story_id);

        	//指定story，測試user是否是story owner
        	if($user_id == $story[0]['story_user_id']){

			        		$all_replies = $this->reply_model->get(array('reply_story_id' => $story_id));
			        		$replies = array();

			        		foreach ($all_replies as $_key => $reply) {
				        			$reply_sender = $this->user_model->get($reply['reply_sender_id']);
				        			$reply['user_nickname'] = $reply_sender[0]['user_nickname'];
				        			$reply['user_school'] = $reply_sender[0]['user_school'];
				        			$reply['user_department'] = $reply_sender[0]['user_department'];
									$reply['is_send'] = false;

			        				if($reply['reply_sender_id'] != $user_id){
										$replies[$reply['reply_sender_id']] = $reply;
			        				}

			        		}

			        		$user = $this->user_model->get($user_id);
			        		
			        		$data['user_school'] = $user[0]['user_school'];
			        		$data['user_department'] = $user[0]['user_department'];
			        		$data['user_nickname'] = $user[0]['user_nickname'];
			        		$data['story'] = $story[0];

			        		$data['replies'] = $replies;

							$this->load->view('index/twenty_head');
							$this->load->view('index/pick_bottle_me',$data);		
							$this->load->view('index/pick_bottlejs',$data);		
							$this->load->view('index/twenty_footer');

        	}
        	else{
		        	//指定story，測試user是否擁有此故事
		        	$_is_user_bottle = $this->_is_user_bottle($story_id);

		        	if($_is_user_bottle == 0){
		        		$data['_is_user_bottle'] = '0';
						$this->load->view('index/twenty_head');
						$this->load->view('index/pick',$data);		
						$this->load->view('index/twenty_footer');
		        	}else{
		        		$sender = $this->user_model->get($story[0]['story_user_id']);
		        		$sender_id = $sender[0]['user_id'];
		        		$reply_nickname = $sender[0]['user_nickname'];

		        		$waiting_reply = 0;
						$reply_id_limit = 0;
						$opposite_reply_id = 0;


		        		//看使用者是否回應過
		        		$is_reply = $this->reply_model->get(array('reply_story_id' => $story_id, 'reply_sender_id' => $user_id));

				        if(sizeof($is_reply) > 0){

			        		$all_replies = $this->reply_model->get(array('reply_story_id' => $story_id));

			        		$replies = array();
			        		foreach ($all_replies as $_key => $reply) {

			        			if(($reply['reply_sender_id'] == $sender_id && $reply['reply_to_id'] == $user_id) || ($reply['reply_sender_id'] == $user_id && $reply['reply_to_id'] == $sender_id) ){
			        				$reply_sender = $this->user_model->get($reply['reply_sender_id']);
				        			$reply['user_nickname'] = $reply_sender[0]['user_nickname'];
				        			if($reply['reply_sender_id'] == $user_id){
				        				$reply['is_send'] = true;
				        			}else{
				        				$reply['is_send'] = false;
				        			}
				        			$replies[] = $reply;
			        			}
			        		}

			        		//看使用者是否是還在等待瓶子主人回應	        		
			        		if($replies[sizeof($replies) - 1]['reply_sender_id'] == $user_id){
			        			$waiting_reply = 1;
			        		}

			        		$data['reply_nickname'] = $reply_nickname;

			        		$data['waiting_reply'] = $waiting_reply;
			        		$data['is_reply'] = sizeof($is_reply);
			        		$data['replies'] = $replies;

			        		$data['user_school'] = $sender[0]['user_school'];
			        		$data['user_department'] = $sender[0]['user_department'];
			        		$data['user_nickname'] = $sender[0]['user_nickname'];
			        		$data['story'] = $story[0];
							$this->load->view('index/twenty_head');
							$this->load->view('index/pick_bottle',$data);		
							$this->load->view('index/pick_bottlejs',$data);		
							$this->load->view('index/twenty_footer');
		        		}


		        		else{

			        		$all_replies = $this->reply_model->get(array('reply_story_id' => $story_id));
			        		$replies = $all_replies;

			        		foreach ($replies as $_key => $reply) {
				        			$reply_sender = $this->user_model->get($reply['reply_sender_id']);
				        			$replies[$_key]['user_nickname'] = $reply_sender[0]['user_nickname'];
									$replies[$_key]['is_send'] = false;
			        		}
			        		$data['reply_nickname'] = $reply_nickname;

			        		$data['waiting_reply'] = $waiting_reply;
			        		$data['is_reply'] = sizeof($is_reply);
			        		$data['replies'] = $replies;

			        		$data['user_school'] = $sender[0]['user_school'];
			        		$data['user_department'] = $sender[0]['user_department'];
			        		$data['user_nickname'] = $sender[0]['user_nickname'];
			        		$data['story'] = $story[0];
							$this->load->view('index/twenty_head');
							$this->load->view('index/pick_bottle',$data);		
							$this->load->view('index/pick_bottlejs',$data);		
							$this->load->view('index/twenty_footer');
		        		}
		        	}
        	}
       	}
	}




	public function bottles_reply($story_id = null)
	{

		$user_id = $this->_require_login();
        $this->_require_register();

		$user = $this->_get_user_byid($user_id);

		$data['user_name'] = $user[0]['user_name'];
		$data['fb_login_url'] = $this->_fb_login_url();	
		$data['login_logout_url'] = '/api/logout';	
    	$data['login_logout_text'] = 'Sign Out';	

		$get_data = $this->input->get(NULL, TRUE);

    	if(empty($story_id)) {
    		redirect('/bottles');
    	}
		if(empty($get_data['sender_id'])){
    		redirect('/bottles/'.$story_id);
		}


		$sender_id = $get_data['sender_id'];
        $story = $this->story_model->get($story_id);

		//確認該user真的有reply這篇文章
		$is_reply = $this->reply_model->get(array('reply_story_id' => $story_id, 'reply_sender_id' => $sender_id));
		if(sizeof($is_reply) == 0){
    		redirect('/bottles/'.$story_id);			
		}

        					$replies = array();
			        		$all_replies = $this->reply_model->get(array('reply_story_id' => $story_id));
			        		foreach ($all_replies as $_key => $reply) {

			        			if(($reply['reply_sender_id'] == $sender_id && $reply['reply_to_id'] == $user_id) || ($reply['reply_sender_id'] == $user_id && $reply['reply_to_id'] == $sender_id) ){
			        				$replies[$_key] = $reply;
				        			$reply_sender = $this->user_model->get($reply['reply_sender_id']);
				        			$replies[$_key]['user_school'] = $reply_sender[0]['user_school'];
				        			$replies[$_key]['user_department'] = $reply_sender[0]['user_department'];
				        			$replies[$_key]['user_nickname'] = $reply_sender[0]['user_nickname'];
				        			if($reply['reply_sender_id'] == $user_id){
				        				$replies[$_key]['is_send'] = true;
				        			}else{
				        				$replies[$_key]['is_send'] = false;
				        			}
			        			}
			        		}

			        		$user = $this->user_model->get($sender_id);

			        		$data['reply_to_id'] = $user[0]['user_id'];
			        		$data['reply_school'] = $user[0]['user_school'];
			        		$data['reply_department'] = $user[0]['user_department'];
			        		$data['reply_nickname'] = $user[0]['user_nickname'];

			        		$user = $this->user_model->get($user_id);
			        		
			        		$data['user_school'] = $user[0]['user_school'];
			        		$data['user_department'] = $user[0]['user_department'];
			        		$data['user_nickname'] = $user[0]['user_nickname'];
			        		$data['story'] = $story[0];

			        		$data['replies'] = $replies;

							$this->load->view('index/twenty_head');
							$this->load->view('index/pick_bottle_me_res',$data);		
							$this->load->view('index/pick_bottle_mejs',$data);		
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