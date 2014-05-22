<?php

class Pick_model extends CRUD_model
{
    protected $_table = 'PICK_TABLE';
    protected $_primary_key = 'pick_id';
    
    // ------------------------------------------------------------------------
    
    public function __construct()
    {
        parent::__construct();
    }
    
    // ------------------------------------------------------------------------
    
}
