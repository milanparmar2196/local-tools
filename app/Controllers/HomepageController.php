<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PostAdsModel;
use App\Models\PostGalleryModel;
use App\Models\CategoryModel;
use App\Models\ZipcodesGermanyModel;
use App\Models\BrandsModel;

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
            'search' => '',
            'brands' => 0,
            'price' => '0:0',
            'minPrice' => 0,
            'maxPrice' => 0
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
            $filters['brands'] = (array_key_exists("brands", $params) && isset($params['brands'])) ? explode(',', $params['brands']) : $filters['brands'];
            $filters['price'] = (array_key_exists("price", $params) && $params['price'] != '0:0') ? explode(':', $params['price']) : explode(':', $filters['price']);
            $filters['minPrice'] = (isset($filters['price'][0])) ? (int)$filters['price'][0] : (int)$filters['minPrice'];
            $filters['maxPrice'] = (isset($filters['price'][1])) ? (int)$filters['price'][1] : (int)$filters['maxPrice'];
        }
        
        $data['subCategoryFlag'] = false;
        if ($filters['category'] && $filters['category'] != 0) {
            $data['subCategoryFlag'] = true;
            $categoryModel = new CategoryModel();
            $categoryRow = $categoryModel->getCategory($filters['category']);
            $subCategories = $categoryModel->getSubCategories($filters['category']);
            
            if(isset($categoryRow)){
                $categoryRow->subCategories = $subCategories;
                $data['cat_subcategories'] = $categoryRow;
            }

            // Get brands
            $brandsModel = new BrandsModel();
            $data['brands'] = $brandsModel->getAllBrands();
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
            $perPage = 9;
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
                $mapboxGeocodingUrl = env("MAPBOX_GEOCODING_URL");
                $mapboxPublicToken = env("MAPBOX_PUBLIC_TOKEN");
                $client = \Config\Services::curlrequest();
                $response = $client->request('GET', "$mapboxGeocodingUrl/v5/mapbox.places/$zipcodeRow->zipcode.json?proximity=ip&access_token=$mapboxPublicToken");
                $mapboxBody = json_decode($response->getBody());
                $coordinates = $mapboxBody->features[0]->geometry->coordinates;
                $lat = $coordinates[1];
                $long = $coordinates[0];
            }
        } else {
            // Distance filter only work if location provided
            $filters['distance'] = 0;
        }
        $filters['lat'] = $lat;
        $filters['long'] = $long;
        
        // Brands
        if(isset($filters['brands'])) {
            $filters['brands'] = json_decode($filters['brands']);
        }

        // Post type
        if(isset($filters['postType'])) {
            $result['postType'] = $filters['postType'];
        }

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
