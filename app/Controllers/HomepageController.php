<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PostAdsModel;
use App\Models\PostGalleryModel;
use App\Models\CategoryModel;
use App\Models\Country;
use App\Models\City;
use App\Models\state;

use App\Models\SubscriptionPlansModel;

class HomepageController extends BaseController
{
    public function index()
    {
        
        $postAddModel = new PostAdsModel();
        $data['highlightplans_ads'] = $postAddModel->get_highlight_post();
        
        $PostGalleryModel = new PostGalleryModel();
        $categoryMoldel = new CategoryModel();
        $data['adds_list_random'] = $postAddModel->get_random_post();
        $data['categorydetails'] = $categoryMoldel->findAll();
        $data['post_ads_gallery'] = $PostGalleryModel->findAll();
        // echo'<pre>';
        // print_r($data['adds_list_random']);
        $data['title'] = 'Homepage';
        return  view('frontend/Page/index', $data);
    }

    public function loadmore($limit = 3){
        
        $postAddModel = new PostAdsModel();
        
        
        $PostGalleryModel = new PostGalleryModel();
        $categoryMoldel = new CategoryModel();
        $data['adds_list_random'] = $postAddModel->get_random_postloadmore();
        $data['categorydetails'] = $categoryMoldel->findAll();
        $data['post_ads_gallery'] = $PostGalleryModel->findAll();
        
        $data['title'] = 'Homepage';
        return  view('frontend/Page/index', $data);
    }
}
