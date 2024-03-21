<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class CartController extends BaseController
{
    private $data=[];
    public function __construct(){
        $this->data= $this->loadLayout($this->data);;
    }
    public function index()
    {
        $ssCart = \Config\Services::session();
        if ($ssCart->has('cart')){
            $this->data['cartList']=array_values(session('cart'));
        }
        else{
            $this->data['cartList']=null;
        }
        return view('Home/cart',$this->data);
    }
    public function delProduct($id){
        $ssCart = \Config\Services::session();
        $newCart = [];$result=0;
        
        $cartPrd = $ssCart->get('cart');
        foreach ($cartPrd as $key => $cPrd) {
            if ($cPrd['idProduct'] == base64_decode($id)) {
                unset($cartPrd[$key]);
                $newCart = $cartPrd;
                $result=1;
            }
        }
        if($result==1){
            $ssCart->set('cart',$newCart);
            $response = ['success' => true, 'message' => 'Xóa sản phẩm thành công'];
        }else {
            $response = ['success' => false, 'message' => 'Không tìm thấy sản phẩm để xóa'];
        }
        header('Content-Type: application/json');
        echo json_encode($response);

        
    }

}
