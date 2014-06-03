<?php

class Admin_api extends CI_Controller
{
	//---------------------------------------------------------------------------------------------------

    public function __construct() 
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('story_model');
        $this->load->model('reply_model');

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

    public function story_type_change()
    {
        $post_data = $this->input->post(NULL, TRUE);
        $story_type_change = $post_data['story_type_change'];

        foreach ($story_type_change as $_key => $story_id) {
            $story = $this->story_model->get($story_id);
            if($story[0]['story_type'] == 0){
                $this->story_model->update(array('story_type' => 1),$story_id);
            }else{
                $this->story_model->update(array('story_type' => 0),$story_id);
            }
        }
        redirect('/mercury_db_story');

    }


    //update today story
    public function today_stories()
    {
        $stories = $this->story_model->get(array('story_type' => 0));
        shuffle($stories);

        $users = $this->user_model->get();
        foreach ($users as $_key => $user) {
            if(sizeof($stories) == 0){
                echo "no more stories orz<br>";
                $stories = $this->story_model->get(array('story_type' => 0));
                shuffle($stories);
            }
            echo "giving story ID:".$stories[0]['story_id']." to user ID:".$user['user_id'];

            if($stories[0]['story_id'] != $user['user_today_story_id']){

                $counter = 0;
                while($stories[$counter]['story_user_id'] == $user['user_id']){
                    echo "my own STORY!<br>";
                    $counter ++;
                }

                if($counter == 0){
                    echo "not my story<br>";
                    $story = array_shift($stories);
                    $this->user_model->update(array('user_today_story_id' => $story['story_id']),$user['user_id']);
                }else{
                    echo "my story round + ".$counter."<br>";
                    $story = $stories[$counter];
                    $this->user_model->update(array('user_today_story_id' => $story['story_id']),$user['user_id']);
                }


            }else{
                echo "YESTERDAY!<BR>";
                $story_key = array_rand($stories, 1);
                $story = $stories[$story_key];
                $this->user_model->update(array('user_today_story_id' => $story['story_id']),$user['user_id']);
            }

        }

    }

    public function story_no_response($limit)
    {
        $stories = $this->story_model->get(array('story_type' => 0));

        foreach ($stories as $_key => $story) {

            $is_reply = $this->reply_model->get(array('reply_story_id' => $story['story_id']));
            if($story['story_id'] < $limit && sizeof($is_reply) == 0){
                echo " ID: ".$story['story_id']." code: ".$story['story_code']."<br>";
            }
        }
    }


}