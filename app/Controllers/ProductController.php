<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PostAdsModel;
use App\Models\CategoryModel;
use App\Models\PostGalleryModel;
use App\Models\PostAdsPostAdsOtherdetailsModel;
use App\Models\TaxModel;

class ProductController extends BaseController
{   
    
    public function index($param = "$1")
    {   $product = $param;
        $data['title'] = 'Products';
        $PostModel = new PostAdsModel();
        $data['product_data'] = $PostModel->get_product_details($param);
        $categoryModel = new CategoryModel();
        $catwhere = [
            'is_active' => 1,
            'parent_id' => 0
        ];

        $data['category_data'] =  $categoryModel->where($catwhere)->findAll();
        $PostGalleryModel = new PostGalleryModel();
        $data['post_gallery_data'] = $PostGalleryModel->where('post_id', $product)->findAll();
        $PostAdsPostAdsOtherdetailsModel = new PostAdsPostAdsOtherdetailsModel();
        $ads_where = [
            'post_id' => $product
        ];
        $data['post_ads_data_other'] = $PostAdsPostAdsOtherdetailsModel->where($ads_where)->findAll();
        $data['related_product'] = $PostModel->get_related_product($param);
        $taxModel = new TaxModel();
        $data['tax'] = $taxModel->where('status', 1)->findAll();
        
        
        return view('frontend/Page/product', $data);
    }

    public function add_to_cart(){
        $rules = [
            'product_id'          => 'required',
            'product_seller_id'          => 'required',
            'buyer_datefrom'          => 'required',
            'buyer_dateto'          => 'required',
            'buyer_timeefrom'          => 'required',
            'buyer_timeto'          => 'required',
            'buy_stock'         => 'required',
            'total_price'      => 'required',
            'product_price'          => 'required',
            'total_duration_tyoe'          => 'required',
            'total_duration'         => 'required'
            
        ];
        if($this->validate($rules)){
            $session = session();
            $buynowsess = [
                'product_id'           =>$this->request->getVar('product_id'),
                'product_seller_id'    =>$this->request->getVar('product_seller_id'),
                'buyer_datefrom'       =>$this->request->getVar('buyer_datefrom'),
                'buyer_dateto'         =>$this->request->getVar('buyer_dateto'),
                'buyer_timeefrom'      =>$this->request->getVar('buyer_timeefrom'),
                'buyer_timeto'         =>$this->request->getVar('buyer_timeto'),
                'buy_stock'            =>$this->request->getVar('buy_stock'),
                'total_price'          =>$this->request->getVar('total_price'),
                'product_price'         =>$this->request->getVar('product_price'),
                'total_duration_tyoe'   =>$this->request->getVar('total_duration_tyoe'),
                'total_duration'        =>$this->request->getVar('total_duration'),
                'status' =>$this->request->getVar('status')
            ];
            $session->set($buynowsess);
           
        }
        
    }
}
