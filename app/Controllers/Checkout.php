<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Checkout extends BaseController
{
    public function index()
    {
        if(session()->get('id'))
        {
            $data['title'] = 'Checkout';
            return view('frontend/page/checkout', $data);
        }else{
            return redirect()->to('/login');
        }
    }
}
