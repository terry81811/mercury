<?php

class Admin_model extends CRUD_model
{
    protected $_table = 'ADMIN_TABLE';
    protected $_primary_key = 'admin_id';
    
    // ------------------------------------------------------------------------
    
    public function __construct()
    {
        parent::__construct();
    }
    
    // ------------------------------------------------------------------------
    
}
