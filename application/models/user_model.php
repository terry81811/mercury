<?php

class User_model extends CRUD_model
{
    protected $_table = 'USER_TABLE';
    protected $_primary_key = 'user_id';
    
    // ------------------------------------------------------------------------
    
    public function __construct()
    {
        parent::__construct();
    }
    
    // ------------------------------------------------------------------------
    
}
