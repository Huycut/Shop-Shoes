<?php

namespace App\Services;

class BaseServices
{
    public $validation;
    function __construct(){
        $this->validation = \Config\Services::validation();
    }
        
}
