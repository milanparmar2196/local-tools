<?php

namespace App\Models;

use CodeIgniter\Model;

class PostAdsModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'post_ads';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['seller_id', 'category_id', 'sub_category_id', 'brand_id', 'ad_plan_id', 'ad_type', 'title', 'description', 'currency', 'duration', 'amount', 'stocks', 'vendor_name', 'phone_number', 'provider_desc', 'address_line_1', 'address_line_2', 'vendor_country', 'vendor_state', 'vendor_city', 'pincode', 'deopsite', 'deposite_duration', 'deposite_amount', 'product_detail', 'about_product', 'things_to_know_desc', 'cancellation_policy', 'listing_address1', 'listing_address2', 'country_list', 'state_list', 'city_list', 'postcode_list', 'latitude', 'longitude', 'status', 'ads_start_datetime', 'ads_end_datetime', 'tax_id', 'service_fee', 'demage', 'demage_amount'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function get_highlight_post()
    {
        $today = date('Y-m-d');
        $data = $this->db->table('post_ads')
            ->select('post_ads.*,tbl_countries.name AS country_name,tbl_states.name AS state_name,cities.name AS city_name')
            ->join('subscription_plans', 'post_ads.ad_plan_id = subscription_plans.id', 'LEFT')
            ->join('subscription_category', 'subscription_category.id = subscription_plans.plan_id', 'LEFT')
            ->join('tbl_countries', 'tbl_countries.id = post_ads.country_list')
            ->join('tbl_states', 'tbl_states.id = post_ads.state_list')
            ->join('cities', 'cities.id = post_ads.city_list')
            ->where('subscription_category.id = 2')
            ->where('post_ads.ads_time <=', $today)
            ->where('post_ads.ads_end_datetime >=', $today)
            ->where('post_ads.status', 'active')
            ->get();
        $data = $data->getResultArray();
        return $data;
    }

    public function get_random_post()
    {

        $today = date('Y-m-d');
        $data = $this->db->table('post_ads')
            ->select('post_ads.*,tbl_countries.name AS country_name,tbl_states.name AS state_name,cities.name AS city_name')

            ->join('subscription_plans', 'post_ads.ad_plan_id = subscription_plans.id', 'LEFT')
            ->join('subscription_category', 'subscription_category.id = subscription_plans.plan_id', 'LEFT')
            ->join('tbl_countries', 'tbl_countries.id = post_ads.country_list')
            ->join('tbl_states', 'tbl_states.id = post_ads.state_list')
            ->join('cities', 'cities.id = post_ads.city_list')
            ->where('subscription_category.id != 2')
            ->where('post_ads.ads_time <=', $today)
            ->where('post_ads.ads_end_datetime >=', $today)
            ->where('post_ads.status', 'active')
            ->orderBy('rand()')
            ->limit('9')
            ->get();
        $data = $data->getResultArray();
        return $data;
    }

    public function get_random_postloadmore()
    {

        $today = date('Y-m-d');
        $data = $this->db->table('post_ads')
            ->select('post_ads.*,tbl_countries.name AS country_name,tbl_states.name AS state_name,cities.name AS city_name')

            ->join('subscription_plans', 'post_ads.ad_plan_id = subscription_plans.id', 'LEFT')
            ->join('subscription_category', 'subscription_category.id = subscription_plans.plan_id', 'LEFT')
            ->join('tbl_countries', 'tbl_countries.id = post_ads.country_list')
            ->join('tbl_states', 'tbl_states.id = post_ads.state_list')
            ->join('cities', 'cities.id = post_ads.city_list')
            ->where('subscription_category.id != 2')
            ->where('post_ads.ads_time <=', $today)
            ->where('post_ads.ads_end_datetime >=', $today)
            ->where('post_ads.status', 'active')
            ->orderBy('rand()')
            ->limit('9')
            ->get();
        $data = $data->getResultArray();
        return $data;
    }

    // Product page data

    public function get_product_details($param)
    {
        $today = date('Y-m-d');
        $product_id = $param;
        $data = $this->db->table('post_ads')
            ->select('post_ads.*, tbl_countries.name AS country_name,tbl_states.name AS state_name,cities.name AS city_name,
     categories.Name as category_name, categories.id as product_categoryid, users.first_name AS seller_firstname, users.last_name AS seller_lastname, users.phone AS seller_phone, users.email AS seller_email, users.created_at AS seller_joindate, users.image AS seller_image ')
            ->join('users', 'users.id  =  post_ads.seller_id', 'LEFT')
            ->join('categories', 'categories.id = post_ads.category_id', 'LEFT')
            ->join('subscription_plans', 'post_ads.ad_plan_id = subscription_plans.id', 'LEFT')
            ->join('subscription_category', 'subscription_category.id = subscription_plans.plan_id', 'LEFT')
            ->join('tbl_countries', 'tbl_countries.id = post_ads.country_list')
            ->join('tbl_states', 'tbl_states.id = post_ads.state_list')
            ->join('cities', 'cities.id = post_ads.city_list')
            ->where('post_ads.id = ', $product_id)
            ->where('post_ads.ads_time <=', $today)
            ->where('post_ads.ads_end_datetime >=', $today)
            ->where('post_ads.status', 'active')
            ->get();
        $data = $data->getResultArray();

        return $data;
    }

    public function get_related_product($param)
    {
        $product_id = $param;
        $data = $this->db->table('post_ads')
            ->select('post_ads.*, tbl_countries.name AS country_name,tbl_states.name AS state_name,cities.name AS city_name,
      categories.Name as category_name, categories.id as product_categoryid, gallerypost_ads.image_name')
            ->join('users', 'users.id  =  post_ads.seller_id', 'LEFT')
            ->join('gallerypost_ads', 'gallerypost_ads.post_id  =  post_ads.id', 'LEFT')
            ->join('categories', 'categories.id = post_ads.category_id', 'LEFT')
            ->join('tbl_countries', 'tbl_countries.id = post_ads.country_list')
            ->join('tbl_states', 'tbl_states.id = post_ads.state_list')
            ->join('cities', 'cities.id = post_ads.city_list')
            ->where('post_ads.category_id = categories.id')
            ->where('post_ads.status', 'active')
            ->limit('4')
            ->get();
        $data = $data->getResultArray();

        return $data;
    }
    public function getproducts($userid, $searchText)
    {
        $data = $this->db->table('post_ads pa')
            ->select('pa.*,c.name as category,ci.name as city,gpa.image_name')
            ->join('categories c', 'c.id=pa.category_id', 'LEFT')
            ->join('cities ci', 'ci.id=pa.city_list', 'LEFT')
            ->join('gallerypost_ads gpa', 'pa.id=gpa.post_id', 'LEFT')
            ->where(['pa.seller_id' => $userid]);

        if (!empty($searchText)) {
            $data->where('pa.title LIKE "%' . $searchText . '%"');
        }
        $data = $data->orderby('pa.id', 'DESC')
            ->groupBy('pa.id')
            ->get()
            ->getResultArray();

        return $data;
    }


    public function getplans()
    {
        $plans = $this->db->table('subscription_category')->get()->getResultArray();
        return $plans;
    }


    public function getmembership($userid, $searchText)
    {
        $data = $this->db->table('post_ads pa')
            ->select('pa.*,c.name as category,ci.name as city,gpa.image_name,spc.name as membership,spl.duration as sduration,spl.amount as samount')
            ->join('categories c', 'c.id=pa.category_id', 'LEFT')
            ->join('cities ci', 'ci.id=pa.city_list', 'LEFT')
            ->join('gallerypost_ads gpa', 'pa.id=gpa.post_id', 'LEFT')
            ->join('subscription_plans spl', 'spl.id=pa.ad_plan_id', 'LEFT')
            ->join('subscription_category spc', 'spc.id=spl.plan_id', 'LEFT')
            ->where(['pa.seller_id' => $userid]);

        if (!empty($searchText)) {
            $data->where('pa.title LIKE "%' . $searchText . '%"');
        }
        $data = $data->orderby('pa.id', 'DESC')
            ->groupBy('pa.id')
            ->get()
            ->getResultArray();

        return $data;
    }

    public function deleteproduct($id)
    {
        $query = $this->db->table('post_ads')->delete(array('id' => $id));

        return $query;
    }

    public function  changestatus($id, $status)
    {
        // echo $id."".$status;die(); 
        $query = $this->db->table('post_ads')->update(['status' => $status], array('id' => $id));
        return $query;
    }

    public function  getPosts($filters)
    {
        $today = date('Y-m-d');
        $distanceString = '';
        if ($filters['lat'] != 0 && $filters['long'] != 0) {
            $lat = $filters['lat'];
            $long = $filters['long'];
            $distanceString = "( 6378 * acos ( cos ( radians($lat) ) 
                                * cos( radians( post_ads.latitude ) )
                                * cos( radians( post_ads.longitude ) - radians($long) )
                                + sin ( radians($lat) ) * sin( radians( post_ads.latitude ) ) ) ) AS distance";
        }

        $builder = $this->db->table('post_ads');

        $builder->select("post_ads.title, post_ads.amount, post_ads.duration, tbl_countries.name AS country_name, states.name AS state_name, tbl_cities.name AS city_name, GROUP_CONCAT(gallerypost_ads.image_name) as images, categories.name as category_name, $distanceString");

        $builder->join('subscription_plans', 'post_ads.ad_plan_id = subscription_plans.id', 'LEFT');
        $builder->join('subscription_category', 'subscription_category.id = subscription_plans.plan_id', 'LEFT');
        $builder->join('tbl_countries', 'tbl_countries.id = post_ads.country_list', 'LEFT');
        $builder->join('states', 'states.id = post_ads.state_list', 'LEFT');
        $builder->join('tbl_cities', 'tbl_cities.id = post_ads.city_list', 'LEFT');
        $builder->join('gallerypost_ads', 'gallerypost_ads.post_id = post_ads.id', 'LEFT');
        $builder->join('categories', 'categories.id = post_ads.category_id', 'LEFT');

        $builder->where('post_ads.ads_time <=', $today);
        $builder->where('post_ads.ads_end_datetime >=', $today);
        $builder->where('post_ads.status', 'active');

        if (isset($filters['subscriptionCategory']) && $filters['subscriptionCategory'] == 2) {
            $builder->where('subscription_category.id = 2');
        } else if (isset($filters['subscriptionCategory']) && $filters['subscriptionCategory'] == -2) {
            $builder->where('subscription_category.id != 2');
        }

        if (isset($filters['zipcode']) && $filters['zipcode'] != 0) {
            $builder->where('post_ads.postcode_list =', $filters['zipcode']);
        }

        if (isset($filters['category']) && $filters['category'] != 0) {
            $builder->where('categories.id =', $filters['category']);
            $builder->where('categories.parent_id = 0');
        }

        if (isset($filters['subCategory']) && $filters['subCategory'] != 0) {
            $builder->where('categories.id =', $filters['subCategory']);
            $builder->where('categories.parent_id != 0');
        }

        if (isset($filters['search']) && $filters['search'] != '') {
            $builder->like('post_ads.title', $filters['search']);
        }

        if (isset($filters['distance']) && $filters['distance'] != 0) {
            $builder->having('distance <', $filters['distance']);
        }

        if ($filters['pagination'] == 'true' && $filters['page'] >= 0 && $filters['perPage']) {
            $builder->limit($filters['perPage'], (($filters['page'] - 1) * $filters['perPage']));
        }

        $builder->groupBy('post_ads.id');

        if (isset($filters['order']) && $filters['order'] != '') {
            $builder->orderBy('subscription_category.id', $filters['order']);
        }

        $result = $builder->get()->getResultArray();

        return $result;
    }

    function getCountry($countryId)
    {
        $builder = $this->db->table('tbl_countries');
        $builder->where('tbl_countries.id =', $countryId);

        $result = $builder->get()->getRow();
        return $result;
    }

    function getState($stateId)
    {
        $builder = $this->db->table('states');
        $builder->where('states.id =', $stateId);

        $result = $builder->get()->getRow();
        return $result;
    }
}
