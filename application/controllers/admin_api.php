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
        $this->load->model('admin_model');

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

    public function update_stories()
    {
        $post_data = $this->input->post(NULL, TRUE);
        $threshold = $post_data['threshold'];
        $this->today_stories_v2($threshold);
    }

    //update today story
    public function today_stories_v2($threshold)
    {
        $this->admin_model->update(array('admin_story_update_time' => date("Y-m-d H:i:s")),1);

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


    public function new_stories()
    {
        $post_data = $this->input->post(NULL, TRUE);
        $limit = $post_data['threshold'];
        $this->story_no_response($limit);
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
    //  show email
    //---------------------------------------------------------------------------------------------------

    private function owner_has_to_reply($user_id = null, $story_id = null)
    {
        $_has_to_reply_list = array();
        //確認該故事是否是使用者的
        $story = $this->story_model->get($story_id);
        if($story[0]['story_user_id'] == $user_id){
            $reply_to_me = $this->reply_model->get(array('reply_story_id' => $story_id, 'reply_to_id' => $user_id));
            foreach ($reply_to_me as $_key => $reply) {
                $my_reply = $this->reply_model->get(array('reply_story_id' => $story_id, 'reply_to_id' => $reply['reply_sender_id']));
                //print_r($my_reply);
                //信的主人根本沒回過
                if(sizeof($my_reply) == 0){
                    $_has_to_reply_list[] = $reply['reply_sender_id'];
                }

                //信的主人最後一封回信的id比較小
                else if($reply['reply_id'] > $my_reply[sizeof($my_reply)-1]['reply_id']){
                    $_has_to_reply_list[] = $reply['reply_sender_id'];                  
                }

            }
            return $_has_to_reply_list;
        }
    }


    public function no_res_owner()
    {
        $no_res_owner = array();

        $users = $this->user_model->get();
        foreach ($users as $_key => $user) {
            $stories_by_user = $this->story_model->get(array('story_user_id' => $user['user_id']));
            foreach ($stories_by_user as $_story_key => $story) {
                $has_to_reply = $this->owner_has_to_reply($user['user_id'],$story['story_id']);
                if(sizeof($has_to_reply) > 0){
                    $no_res_owner[$user['user_id']] = $user;
                }
            }
            # code...
        }

        foreach ($no_res_owner as $_key_user => $user) {
            echo $user['user_email']."<br>";
            # code...
        }

        echo "total: ".sizeof($no_res_owner);
    }

    public function no_res_user()
    {
        
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