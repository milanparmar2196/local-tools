<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoryModel;
use App\Models\CartModel;

class CartController extends BaseController
{
    public function index()
    {
        if (session()->get('isLoggedIn') == True) {
            $data['title'] = 'Cart';
            $cartmodel = new CartModel();
            
            $data['cart_data'] = $cartmodel->get_cart_data();

            $categoryModel = new CategoryModel();
            $data['sub_category'] = $categoryModel->find();
            // echo '<pre>';
            // print_r($data['sub_category']);
            
            return view('frontend/page/cart', $data);
        }
        $data['title'] = 'Cart';

        $cartmodel = new CartModel();
            
        $data['cart_data'] = $cartmodel->get_cart_session_data();

        $categoryModel = new CategoryModel();
        $data['sub_category'] = $categoryModel->find();

        return view('frontend/page/cart', $data);
    }
    public function sendcart(){
        $rules = [
            'product_id'          => 'required',
            'buyer_id'          => 'required',
            'product_seller_id'          => 'required',
            'buyer_datefrom'          => 'required',
            'buyer_dateto'          => 'required',
            'buyer_timeefrom'          => 'required',
            'buyer_timeto'          => 'required',
            'buy_stock'         => 'required',
            'total_price'      => 'required',
            'product_price'          => 'required',
            'total_duration_tyoe'          => 'required',
            'total_duration'         => 'required',
            
        ];
        if($this->validate($rules)){
           if(session()->get('id')){
                helper(['form']);
                $cartmodel = new CartModel(); 
                $data = [
                    'product_id' =>$this->request->getVar('product_id'),
                    'user_id' =>$this->request->getVar('buyer_id'),
                    'product_seller_id' =>$this->request->getVar('product_seller_id'),
                    'buyer_datefrom' =>$this->request->getVar('buyer_datefrom'),
                    'buyer_dateto' =>$this->request->getVar('buyer_dateto'),
                    'buyer_timeefrom' =>$this->request->getVar('buyer_timeefrom'),
                    'buyer_timeto' =>$this->request->getVar('buyer_timeto'),
                    'buy_stock' =>$this->request->getVar('buy_stock'),
                    'total_price' =>$this->request->getVar('total_price'),
                    'price' =>$this->request->getVar('product_price'),
                    'total_duration_tyoe' =>$this->request->getVar('total_duration_tyoe'),
                    'total_duration' =>$this->request->getVar('total_duration'),
                    'status' =>$this->request->getVar('status')
                    
                ];
                
                $result = $cartmodel->save($data);
                if($result){
                    return redirect()->to('cart')->with('status', 'Product added to cart successfully');
                }
                else{
                    return redirect()->to('product/'.$data['product_id'].'')->with('status', 'Somthing Went Wrong adding to cart');
                }
           }
           else{
                $session = session();
                $add_to_cart_sess = [
                    'product_id' =>$this->request->getVar('product_id'),
                    'product_seller_id' =>$this->request->getVar('product_seller_id'),
                    'buyer_datefrom' =>$this->request->getVar('buyer_datefrom'),
                    'buyer_dateto' =>$this->request->getVar('buyer_dateto'),
                    'buyer_timeefrom' =>$this->request->getVar('buyer_timeefrom'),
                    'buyer_timeto' =>$this->request->getVar('buyer_timeto'),
                    'buy_stock' =>$this->request->getVar('buy_stock'),
                    'total_price' =>$this->request->getVar('total_price'),
                    'product_price' =>$this->request->getVar('product_price'),
                    'total_duration_tyoe' =>$this->request->getVar('total_duration_tyoe'),
                    'total_duration' =>$this->request->getVar('total_duration'),
                    'status' =>$this->request->getVar('status')
                ];
                $session->set($add_to_cart_sess);
           }
           
        }
    }
}
