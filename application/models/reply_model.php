<?php

class Reply_model extends CRUD_model
{
    protected $_table = 'REPLY_TABLE';
    protected $_primary_key = 'reply_id';
    
    // ------------------------------------------------------------------------
    
    public function __construct()
    {
        parent::__construct();
    }
    
    // ------------------------------------------------------------------------
    
}
