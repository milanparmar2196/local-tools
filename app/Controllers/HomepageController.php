<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PostAdsModel;
use App\Models\PostGalleryModel;
use App\Models\CategoryModel;
use App\Models\ZipcodesGermanyModel;

class HomepageController extends BaseController
{
    public function index()
    {
        // Get navbar data
        $data['navbar'] = \Config\Services::getNavBarData();

        $distanceFlag = false;
        $filters = [
            'zip' => 0,
            'distance' => 0,
            'category' => 0,
            'subCategory' => 0,
            'search' => ''
        ];

        $url = parse_url($_SERVER['REQUEST_URI']);
        if (array_key_exists("query", $url)) {
            parse_str($url['query'], $params);

            $filters['zip'] = (array_key_exists("zip", $params) && $params['zip'] > 0) ? (int)$params['zip'] : $filters['zip'];
            if ($filters['zip'] > 0 && $filters['zip'] != '') {
                $filters['distance'] = (array_key_exists("distance", $params) && $params['distance'] > 0) ? (int)$params['distance'] : $filters['distance'];
            }
            $filters['category'] = (array_key_exists("category", $params) && $params['category'] > 0) ? (int)$params['category'] : $filters['category'];
            $filters['subCategory'] = (array_key_exists("sub-category", $params) && $params['sub-category'] > 0) ? (int)$params['sub-category'] : $filters['subCategory'];
            $filters['search'] = array_key_exists("search", $params) ? $params['search'] : $filters['search'];
        }

        if ($filters['category'] && $filters['category'] != 0) {
            $categoryModel = new CategoryModel();
            $categoryRow = $categoryModel->getCategory($filters['category']);
            $subCategories = $categoryModel->getSubCategories($filters['category']);

            $categoryRow->subCategories = $subCategories;
            $data['cat_subcategories'] = $categoryRow;
        }

        if ($filters['zip'] && $filters['zip'] > 0) {
            $zipcodesGermanyModel = new ZipcodesGermanyModel();
            $zipcodeRow = $zipcodesGermanyModel->getZipcode($filters['zip']);
            $data['zipName'] = $zipcodeRow->name . " - " . $zipcodeRow->zipcode;
            $distanceFlag = true;
        }

        $data['filters'] = $filters;
        $data['distanceFlag'] = $distanceFlag;

        // Get all categories
        $categoryModel = new CategoryModel();
        $data['categories'] = $categoryModel->getAllCategories();
        $data['title'] = 'Homepage';

        return  view('frontend/Page/index', $data);
    }

    public function getPosts()
    {
        $filters = $_GET['filters'];

        // Load model
        $postAdsModel = new PostAdsModel();
        $zipcodesGermanyModel = new ZipcodesGermanyModel();

        // Pagination
        if ($filters['pagination'] == 'true') {
            $page = 1;
            $perPage = 2;
            if (isset($filters['page'])) {
                $page = $filters['page'];
                if ($page <= 0) {
                    $page = 1;
                }
            }
            $filters['page'] = $page;
            $filters['perPage'] = $perPage;

            // For response array
            $result["page"] = $page + 1;
            $result["perPage"] = $perPage;
        }

        // Filter by zipcode
        $lat = 0;
        $long = 0;
        if (isset($filters['zip']) && $filters['zip'] != 0) {
            $zipcodeRow = $zipcodesGermanyModel->getZipcode($filters['zip']);
            $filters['zipcode'] = $zipcodeRow->zipcode;

            if (isset($filters['distance']) && $filters['distance'] != 0) {
                $lat = $zipcodeRow->lat;
                $long = $zipcodeRow->lon;
            }
        } else {
            // Distance filter only work if location provided
            $filters['distance'] = 0;
        }
        $filters['lat'] = $lat;
        $filters['long'] = $long;

        // Response array
        $result["posts"] = $postAdsModel->getPosts($filters);

        echo json_encode($result);
    }

    function getZipcodes()
    {
        $searchText = $_GET['term'];

        $zipcodesGermanyModel = new ZipcodesGermanyModel();
        $zipcodes = $zipcodesGermanyModel->getZipcodesByText($searchText);

        echo json_encode($zipcodes);
    }
}
