<?php

namespace App\Services;
use App\commom\ResultUtils;
use App\Models\User;
use Exception;
class userServices extends BaseServices
{
    private $user;
    function __construct()
   {
       parent::__construct();
       $this->user = new User();
       $this -> user -> protect(false);
   }
   public function addUserInfo($requestData){
    
    $validate = $this->validationAddUser($requestData);
    if($validate->getErrors()){
        return [
            'status'=> ResultUtils::STATUS_CODE_ERROR,
            'messageCode'=>ResultUtils::MESSAGE_CODE_ERROR,
            'messages'=> $validate->getErrors()
        ]; 
        
    }else{
        $dataSave=$requestData->getPost();
        $dataSave['type']=1;
        unset($dataSave['confirmPassword']);
        $dataSave['password']=password_hash($dataSave['password'], PASSWORD_BCRYPT);
        $this->user->save($dataSave);// lưu vào csdl
        
        return [
            'status'=> ResultUtils::STATUS_CODE_SUCCESS,
            'messageCode'=>ResultUtils::MESSAGE_CODE_SUCCESS,
            'messages'=> ['MSGSUCCESS'=>'Thêm mới thành công']
        ];
        
    }
    
}   
    public function loginUser($request){
        $requestData=$request->getPost(); 
        $email=$requestData['email'];
        $password=$requestData['password'];
        $requestEmail=$this->user->where('email',$email)->first();
        if($requestEmail){
        
            if(password_verify($password, $requestEmail['password'])){
                $requestType=[];
                $requestType['name']=$requestEmail['name'];
                $requestType['type']=$requestEmail['Type'];
                return $requestType;
            }
        }
        //return 0;
    }
    private function validationAddUser($requestData){
    $rule = [
        'email'=>'required|valid_email|is_unique[users.email]',//users=> table users-> trỏ đến field email
        'name'=>'required|max_length[100]',
        'password'=>'required|max_length[50]|min_length[6]',
        'confirmPassword'=>'required|matches[password]',
        'phoneNumber'=>'required|numeric'
    ];
    $message = [
        'email'=>[
            'required'=>'Địa chỉ email không được để trống',
            'valid_email'=>'Tài khoản {field} {value} nhập sai định dạng',
            'is_unique'=>'Email đã tồn tại'
        ],
        'name'=>[
            'required'=>'Tên không được để trống',
            'max_length'=>'Tên tối đa {param} ký tự'
        ],
        'password'=>[
            'required'=>'Mật khẩu không được để trống',
            'max_length'=>'Mật khẩu tối đa {param} ký tự',
            'min_length'=>'Mật khẩu ít nhất {param} ký tự'
        ],
        'confirmPassword'=>[
            'required'=>'Nhập lại mật khẩu không được để trống',
            'matches'=>'Mật khẩu nhập lại không khớp',
        ],
        'phoneNumber'=>[
            'required'=>'Số điện thoại không được để trống'
        ]
    ];
    $this->validation->setRules($rule,$message);
    $this->validation->withRequest($requestData)->run();
    return $this->validation;
}
}
