<?php

class Suggest_model extends CRUD_model
{
    protected $_table = 'SUGGEST_TABLE';
    protected $_primary_key = 'suggest_id';
    
    // ------------------------------------------------------------------------
    
    public function __construct()
    {
        parent::__construct();
    }
    
    // ------------------------------------------------------------------------
    
}
