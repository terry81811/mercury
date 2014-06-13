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
        $this->load->model('pick_model');

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
        $stories = $this->story_model->get(array('story_type' => 0, 'story_type_admin' => 0));
        shuffle($stories);

        $users = $this->user_model->get();
        foreach ($users as $_key => $user) {
            if(sizeof($stories) == 0){
                echo "no more stories orz<br>";
                $stories = $this->story_model->get(array('story_type' => 0, 'story_type_admin' => 0));
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

    //update today story
    public function today_stories_v2($threshold)
    {
        $all_stories = $this->story_model->get(array('story_type' => 0, 'story_type_admin' => 0));

        $new_stories = array();
//        $old_stories = array();

        foreach ($all_stories as $_key => $story) {
            $pick = $this->pick_model->get(array('pick_story_id' => $story['story_id']));
            if(sizeof($pick) <= $threshold){
                $new_stories[] = $story;
            }
        }

        echo "sizeof new story = ".sizeof($new_stories)."<br>";

        shuffle($new_stories);
        $stories = $new_stories;

        $users = $this->user_model->get();

        foreach ($users as $_key => $user) {
            if(sizeof($stories) == 0){
                echo "no more new stories orz<br>";
                $stories = $this->story_model->get(array('story_type' => 0, 'story_type_admin' => 0));
                shuffle($stories);
            }
            echo "giving story ID:".$stories[0]['story_id']." to user ID:".$user['user_id']."<br>";

            $is_picked_array = $this->pick_model->get(array('pick_story_id' => $stories[0]['story_id'], 'pick_picker_id' => $user['user_id']));
            if(sizeof($is_picked_array) == 0){
                $is_picked = 0;
            }else{
                $is_picked = 1;
            }

            if($stories[0]['story_user_id'] == $user['user_id']){
                $is_mine = 1;
            }else{
                $is_mine = 0;
            }

            while($is_picked == 1 || $is_mine == 1){
                echo "pick = ".$is_picked." # mine = ".$is_mine."shuffle!! <br>";
                shuffle($stories);                

                $is_picked_array = $this->pick_model->get(array('pick_story_id' => $stories[0]['story_id'], 'pick_picker_id' => $user['user_id']));
                if(sizeof($is_picked_array) == 0){
                    $is_picked = 0;
                }else{
                    $is_picked = 1;
                }

                if($stories[0]['story_user_id'] == $user['user_id']){
                    $is_mine = 1;
                }else{
                    $is_mine = 0;
                }
                echo "giving story ID:".$stories[0]['story_id']." to user ID:".$user['user_id']."<br>";

            }

            $story = array_shift($stories);
            $this->user_model->update(array('user_today_story_id' => $story['story_id']),$user['user_id']);
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




    //---------------------------------------------------------------------------------------------------
    //  get statistics
    //---------------------------------------------------------------------------------------------------

    public function story_length()
    {
        $stories = $this->story_model->get(array('story_type' => 0));
        $length = 0;
        foreach ($stories as $_key => $story) {
            $length += strlen($story['story_content']);

        }
        $avg = $length/sizeof($stories);
        echo $avg."<br>".sizeof($stories);
        return $avg;
    }

    public function reply_length()
    {
        $replies = $this->reply_model->get();
        $length = 0;
        foreach ($replies as $_key => $reply) {
            $length += strlen($reply['reply_text']);

        }
        $avg = $length/sizeof($replies);
        echo $avg."<br>".sizeof($replies);
        return $avg;
    }


    //---------------------------------------------------------------------------------------------------
    //  response suggest
    //---------------------------------------------------------------------------------------------------

    public function response_suggest($suggest_user_id)
    {
        $post_data = $this->input->post(NULL, TRUE);
        $reply_suggestion = $post_data['reply_suggestion'];

        $reply_suggest_data = array(
            'suggest_user_id' => $suggest_user_id,
            'suggest_from_user' => 0,
            'suggest_text' => $reply_suggestion,
            'suggest_time' => date("Y-m-d H:i:s")
            );

        $this->suggest_model->insert($suggest_data);
        redirect('/mercury_db_res');

    }


}