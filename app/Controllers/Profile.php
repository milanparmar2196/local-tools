<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;
use App\Models\Country;

class Profile extends BaseController

{

    public function __construct()
    {
        if (session()->get('customer_type') != "2") {
            echo 'Access denied';
            exit;
        }
    }

    public function index()
    {
        $user_id = session()->get('id');
        $userModel = new UsersModel();
        $countryModel = new Country();
        $data['user_data'] = $userModel->where('id', $user_id)->findAll();
        $data['country_data'] = $countryModel->findAll();
        echo view('frontend/Page/profile', $data);
       
    }
}
