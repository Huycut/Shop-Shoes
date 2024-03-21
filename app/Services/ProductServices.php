<?php

namespace App\Services;
use App\Models\Product;
use App\Models\Category;

use Exception;
class ProductServices extends BaseServices
{
    private $products,$category;
     function __construct()
    {
        parent::__construct();
        $this->products = new Product();
        $this->category = new Category();
        $this -> products -> protect(false);
    }
    public function getCategory(){
        return $this->category->findAll();
    }
     public function getAllProduct()
    {
        return $this->products->orderBy('idProduct','ASC')->paginate(6);
    }
    public function countAllProduct(){
        return $this->products->countAll();
    }
    public function pageProduct($value){
        $pager = \Config\Services::pager(null, null, true);
        $pager->setPath($value != null ? 'san-pham/'.$value : 'san-pham');
        return $pager;
    }
    public function getNumberKey(){
        $result = $this->category->findAll();
        $resultNumberKey = [];
        foreach($result as $rs){            
            $resultNumberKey[$rs['key']] = $this->products->where('keyProduct',$rs['key'])->countAllResults();
        }      
        return $resultNumberKey;
    }
    public function getProductByMeta($metaProduct){
        return $this->products->where('meta',$metaProduct)->get()->getResult();
    }
    public function getAllProductByKey($value){
        return $this->products->where('keyProduct',$value)->paginate(6);
    }
    public function addCart($value){
        $result = $value->getPost();
        $resultArray= $this->products
        ->select('idProduct,nameProduct,imgProduct,price,meta')
        ->where('idProduct',$result['idProduct'])
        ->get()
        ->getResultArray();
        $flattenArray = array_reduce($resultArray, function ($carry, $item) {// chuyển đổi mảng 2 chiều thành 1 chiều
            return array_merge($carry, $item);
        }, []);
        $flattenArray['qty']=$result['qty'];
        return $flattenArray; 
    }
        
}
