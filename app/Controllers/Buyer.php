<?php

namespace App\Controllers;
use App\Services\UserServices;
use App\Controllers\BaseController;

class Buyer extends BaseController
{
    private $service;
    public function __construct(){
        $this->service = new UserServices();
    }
    public function login(){
        $data=[];
        $data=$this->loadLayout($data);
        //dd($data);
        return view('Home/Buyer/login',$data);
    }
    public function login_process(){

        $result= $this->service->loginUser($this->request);        
        $session = \Config\Services::session();
        $session->set('name',$result['name']);
        if($result['type']==1){
            
            return  $this->response->redirect('/');  
        }
        else{
            return  0;
        }
    }
    public function register(){
        $data=[];
        $data=$this->loadLayout($data);
        return view('Home/Buyer/registration',$data);
    }
    public function registration(){
        $resultCreate = $this->service->addUserInfo($this->request);
        if($resultCreate['status']=='SUCCESS'){
            return $this->response->redirect('login');
        }
    }
}
