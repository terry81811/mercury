<?php

class Letter_model extends CRUD_model
{
    protected $_table = 'LETTER';
    protected $_primary_key = 'letter_id';
    
    // ------------------------------------------------------------------------
    
    public function __construct()
    {
        parent::__construct();
    }
    
    // ------------------------------------------------------------------------
    
}
