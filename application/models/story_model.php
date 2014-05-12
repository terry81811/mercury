<?php

class Story_model extends CRUD_model
{
    protected $_table = 'STORY_TABLE';
    protected $_primary_key = 'story_id';
    
    // ------------------------------------------------------------------------
    
    public function __construct()
    {
        parent::__construct();
    }
    
    // ------------------------------------------------------------------------
    
}
