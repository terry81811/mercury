<?php

class Public_letter_model extends CRUD_model
{
    protected $_table = 'PUBLIC_LETTER';
    protected $_primary_key = 'public_letter_id';
    
    // ------------------------------------------------------------------------
    
    public function __construct()
    {
        parent::__construct();
    }
    
    // ------------------------------------------------------------------------
    
}
