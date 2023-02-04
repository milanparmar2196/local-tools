<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Model\CountryModel;

class Country extends BaseController
{
    public function index()
    {
        $CountryModel = new Country();
        $data['name'] = $CountryModel->orderBy('name', 'ASC')->findAll;
        return view('country', $data);
    }
}
