<?php

namespace App\Controllers;

class Home extends BaseController
{   
    public function index(): string
    {

         $data=[];
        session()->has('name'); 
        $data= $this->loadLayout($data);    
        return view('Home/index',$data);
    }
}
