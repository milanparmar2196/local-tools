<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class EditorController extends BaseController
{
    public function index()
    {
        $data['title'] = 'Error 404!';
        
        $data['not_valid'] = 'Sorry! You must enter a valid Login Credentials.';
        return view('frontend/error404', $data);
    }
}
