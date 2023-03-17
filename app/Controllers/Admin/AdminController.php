<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class AdminController extends BaseController
{
    public function __construct()
    {
        if (session()->get('customer_type') != "0") {
            session_destroy();
            return redirect()->to('/login');
        }
    }
    public function index()
    {
        return view("admin/pages/dashboard");
    }
}