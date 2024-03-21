<?php

namespace App\Controllers;
use App\Services\ProductServices;
use App\Controllers\BaseController;


class Products extends BaseController
{
    private $Product,$data=[];
    public function __construct(){
        $this->Product = new ProductServices();
        $this->data= $this->loadLayout($this->data);
        $this->data['category'] = $this->Product->getCategory();
        $this->data['countCategory'] = $this->Product->getNumberKey();
        //$this->data['page'] = $this->Product->pageProduct();
    }
    
    public function index()
    {
        $this->data['Product'] = $this->Product->getAllProduct();
        $this->data['page'] = $this->Product->pageProduct('');
        return view('Home/category',$this->data);
    }
    public function getProductById($segment){
        $this->data['product']= $this->Product->getProductByMeta($segment);
        return view('Home/singleProduct',$this->data);
    }
    public function getAllProductByKey($segment){
        $this->data['Product'] = $this->Product->getAllProductByKey($segment);
        $this->data['page'] = $this->Product->pageProduct($segment);
        return view('Home/category',$this->data);
    }
    public function addCart(){
        $ssCart = \Config\Services::session();
        //$ssCart->destroy();
        $cart = $ssCart->get('cart') ?? [];
        // Kiểm tra giá trị trùng lặp trong mảng
        if($ssCart->has('cart')){
            $result = 0;
            $checkCart=$this->Product->addCart($this->request);
            foreach($cart as &$key ){
                if($key['idProduct']===$checkCart['idProduct']){
                    $key['qty']=intval($key['qty'])+1;
                    $result = 1;
                    
                }
            }
            if($result==0){
                $cart[] = $checkCart;
            }
        }
        else{
            $checkCart=$this->Product->addCart($this->request);
            $cart[] = $checkCart;
            
        }
        $ssCart->set('cart', $cart);
        return redirect()->back();;
    }

}
