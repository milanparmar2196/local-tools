<?php

namespace Config;

use CodeIgniter\Config\BaseService;
use App\Models\ZipcodesGermanyModel;
use App\Models\CategoryModel;
use App\Models\PostAdsModel;

/**
 * Services Configuration file.
 *
 * Services are simply other classes/libraries that the system uses
 * to do its job. This is used by CodeIgniter to allow the core of the
 * framework to be swapped out easily without affecting the usage within
 * the rest of your application.
 *
 * This file holds any application-specific services, or service overrides
 * that you might need. An example has been included with the general
 * method format you should use for your service methods. For more examples,
 * see the core Services file at system/Config/Services.php.
 */
class Services extends BaseService
{
    /*
     * public static function example($getShared = true)
     * {
     *     if ($getShared) {
     *         return static::getSharedInstance('example');
     *     }
     *
     *     return new \CodeIgniter\Example();
     * }
     */

    public static function getNavBarData()
    {
        $zipcodesGermanyModel = new ZipcodesGermanyModel();
        $data['zipcodes'] = $zipcodesGermanyModel->getAllZipcodes();

        $data['distances'] = [
            5 => '+ 5 km',
            10 => '+ 10 km',
            20 => '+ 20 km',
            30 => '+ 30 km',
            50 => '+ 50 km',
            100 => '+ 100 km',
            150 => '+ 150 km',
            200 => '+ 200 km',
        ];

        $categoryModel = new CategoryModel();
        $data['categories'] = $categoryModel->getAllCategories();

        return $data;
    }
}
