<?php

class Admin_api extends CI_Controller
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

    public function admin_login()
    {
        $post_data = $this->input->post(NULL, TRUE);
        if($post_data['id'] == 'mercury' && $post_data['pw'] == 'mercury2014')
        {
            $this->session->set_userdata('mercury_admin_login', '1');
            redirect('/mercury_db');
        }else{
            redirect('/mercury_db_login');
        }
    }

    public function admin_logout()
    {
        $this->session->unset_userdata('mercury_admin_login');
        redirect('/mercury_db_login');        
    }

    //---------------------------------------------------------------------------------------------------

    //update today story
    public function today_stories()
    {
        $stories = $this->story_model->get();
        shuffle($stories);

        $users = $this->user_model->get();
        foreach ($users as $_key => $user) {
            if(sizeof($stories) == 0){
                $stories = $this->story_model->get();
                shuffle($stories);
            }

            if($stories[0]['story_id'] != $user['user_today_story_id']){
                $story = array_shift($stories);
                $this->user_model->update(array('user_today_story_id' => $story['story_id']),$user['user_id']);
            }else{
                $story_key = array_rand($stories, 1);
                $story = $stories[$story_key];
                $this->user_model->update(array('user_today_story_id' => $story['story_id']),$user['user_id']);
            }

        }

    }


}