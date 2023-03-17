<?php

namespace App\Models;

use CodeIgniter\Model;

class CartModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'cart';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['product_id','product_seller_id','buyer_datefrom','buyer_dateto','buyer_timeefrom','buyer_timeto','buy_stock','total_price','price','total_duration_tyoe','total_duration','status'];

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

    public function get_cart_data(){
        $data = $this->db ->table('cart')
      ->select('cart.*, post_ads.title, gallerypost_ads.image_name , categories.name AS category_name, categories.id AS category_id, tbl_countries.name AS country_name, ,tbl_states.name AS state_name,cities.name AS city_name')
      ->join('users', 'users.id  =  cart.user_id','LEFT')
      ->join('post_ads', 'post_ads.id  =  cart.product_id','LEFT')
      ->join('categories','categories.id = post_ads.category_id','LEFT')
      //->join('categories','categories.parent_id = post_ads.category_id','LEFT')
      ->join('gallerypost_ads', 'gallerypost_ads.post_id  =  cart.product_id','LEFT')
      ->join('tbl_countries', 'tbl_countries.id = post_ads.country_list')
      ->join('tbl_states', 'tbl_states.id = post_ads.state_list')
      ->join('cities', 'cities.id = post_ads.city_list')
      
      ->where('cart.status',1)
      ->get();
      $data = $data->getResultArray();
     
     return $data;
    }
    public function get_cart_session_data(){
        $session = session();
        $data = [

            'id'  => $session->get('id'),
            'product_id'  => $session->get('product_id'),
            'user_id'  => $session->get('user_id'),
            'product_seller_id'  => $session->get('product_seller_id'),
            'buyer_datefrom'  => $session->get('buyer_datefrom'),
            'buyer_dateto'  => $session->get('buyer_dateto'),
            'buyer_timeefrom'  => $session->get('buyer_timeefrom'),
            'buyer_timeefrom'  => $session->get('buyer_timeefrom'),
            'buyer_timeto'  => $session->get('buyer_timeto'),
            'buy_stock'  => $session->get('buy_stock'),
            'total_price'  => $session->get('total_price'),
            'price'  => $session->get('price'),
            'total_duration_tyoe'  => $session->get('total_duration_tyoe'),
            'total_duration'  => $session->get('total_duration'),
            'status'  => $session->get('status'),
            'created_at'  => $session->get('created_at'),
            
        ];

    }
}
