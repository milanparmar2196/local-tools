<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class OrderModel extends Model
{

    protected $DBGroup          = 'default';
    protected $table            = 'tblorders';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = '';
    protected $createdField  = '';
    protected $updatedField  = '';
    protected $deletedField  = '';

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



    public function updateStatus($data, $id)
    {
        
        $query = $this->db->table('tblorders')->update($data, array('id' => $id));
        
        return $query;
    }
    public function deleteOrder($id)
    {
        $query = $this->db->table('tblorders')->delete(array('id' => $id));
        
        return $query;
    }
    public function update_order($data, $id){
        $query = $this->db->table('tblorders')->update($data, array('id' => $id));
    }
	
	public function get_ordersbyuser_id($userid,$searchText){
		
		
		$data=$this->db->table('tblorders')
				->select('tblorders.*,pa.title,pa.currency,c.name as category,ci.name as city,gpa.image_name')
				->join('post_ads pa','pa.id=tblorders.product_id','LEFT')
				->join('categories c','c.id=pa.category_id','LEFT')
				->join('cities ci','ci.id=pa.city_list','LEFT')
				->join('gallerypost_ads gpa','pa.id=gpa.post_id','LEFT')
				
				->where(['tblorders.user_id'=>$userid]);
				
				if(!empty($searchText)){
					$data->where('pa.title LIKE "%'.$searchText.'%"');
				}
				$data=$data->orderby('tblorders.id','DESC')
				->groupBy('tblorders.id')
				 ->get()
				->getResultArray();
				
				//echo $this->db->getLastQuery(); die;
		return $data;
	}

    public function get_orderdetails($orderid){	
		
		$data=$this->db->table('tblorders')
				->select('tblorders.*,pa.title,pa.currency,c.name as category,ci.name as city,gpa.image_name,pa.listing_address1,pa.listing_address2,tc.name as seller_country,ts.name as seller_state,c.name as seller_city,pa.postcode_list as seller_pincode,u.country_pre,u.phone as seller_phone,u.email as seller_email,u.first_name as seller_fname,u.last_name as seller_lname,uu.first_name as orderuserfname,uu.last_name as orderuserlname,spc.name as membership')
               ->join('post_ads pa','pa.id=tblorders.product_id','LEFT')
				->join('categories c','c.id=pa.category_id','LEFT')
				->join('cities ci','ci.id=pa.city_list','LEFT')
                ->join('tbl_states ts','ts.id=pa.state_list','LEFT')
                ->join('tbl_countries tc','tc.id=pa.country_list','LEFT')
				->join('gallerypost_ads gpa','pa.id=gpa.post_id','LEFT')
                ->join('users u','pa.seller_id=u.id','LEFT')
				->join('users uu','tblorders.user_id=uu.id','LEFT')
				->join('subscription_plans spl','spl.id=pa.ad_plan_id','LEFT')
				->join('subscription_category spc','spc.id=spl.plan_id','LEFT')
				->where(['tblorders.id'=>$orderid])
				->groupBy('tblorders.id')
				->get()
				->getRowArray();				
				
				//echo $this->db->getLastQuery(); die;
		return $data;
	}


    public function get_allorders($userid,$fromdate,$todate){	
		
		$data=$this->db->table('tblorders')
				->select('tblorders.*,pa.title,pa.currency,c.name as category,ci.name as city,gpa.image_name')
				->join('post_ads pa','pa.id=tblorders.product_id','LEFT')
				->join('categories c','c.id=pa.category_id','LEFT')
				->join('cities ci','ci.id=pa.city_list','LEFT')
				->join('gallerypost_ads gpa','pa.id=gpa.post_id','LEFT')				
				->where(['tblorders.user_id'=>$userid]);
				
				if(!empty($fromdate) && !empty($todate)){
					$data->where('DATE_FORMAT(FROM_UNIXTIME(tblorders.order_at),"%Y-%m-%d") BETWEEN "'.$fromdate.'" AND "'.$todate.'"');
				}
				$data=$data->orderby('tblorders.id','DESC')
				->groupBy('tblorders.id')
				 ->get()
				->getResultArray();
				
				//echo $this->db->getLastQuery(); die;
		return $data;
	}

    public function get_allordersamt($userid,$fromdate,$todate){	
		
		$data=$this->db->table('tblorders')
				->select('SUM(tblorders.pay_amt) as pay_amt')				
				->where(['tblorders.user_id'=>$userid]);
				
				if(!empty($fromdate) && !empty($todate)){
					$data->where('DATE_FORMAT(FROM_UNIXTIME(tblorders.order_at),"%Y-%m-%d") BETWEEN "'.$fromdate.'" AND "'.$todate.'"');
				}
				$data=$data->orderby('tblorders.id','DESC')
				->groupBy('tblorders.id')
				 ->get()
				->getRowArray();
				

                if(!empty($data) && count($data)){
                    $pay_amt=$data['pay_amt'];
                }else{
                    $pay_amt=0;
                }

				//echo $this->db->getLastQuery(); die;
		return $pay_amt;
	}
	
	
	public function get_ordersbyseller_id($userid,$searchText){
		
		
		$data=$this->db->table('tblorders')
				->select('tblorders.*,pa.title,pa.currency,c.name as category,ci.name as city,gpa.image_name,u.first_name,u.last_name,spc.name as membership')
				->join('post_ads pa','pa.id=tblorders.product_id','LEFT')
				->join('categories c','c.id=pa.category_id','LEFT')
				->join('cities ci','ci.id=pa.city_list','LEFT')
				->join('gallerypost_ads gpa','pa.id=gpa.post_id','LEFT')
				->join('users u','tblorders.user_id=u.id','LEFT')
				->join('subscription_plans spl','spl.id=pa.ad_plan_id','LEFT')
				->join('subscription_category spc','spc.id=spl.plan_id','LEFT')
				->where(['pa.seller_id'=>$userid]);
				
				if(!empty($searchText)){
					$data->where('pa.title LIKE "%'.$searchText.'%"');
				}
				$data=$data->orderby('tblorders.id','DESC')
				->groupBy('tblorders.id')
				 ->get()
				->getResultArray();
				
				//echo $this->db->getLastQuery(); die;
		return $data;
	}
	
	
	public function get_allsellerorders($userid,$fromdate,$todate,$type){	
		
		$data=$this->db->table('tblorders')
				->select('tblorders.*,pa.title,pa.currency,c.name as category,ci.name as city,gpa.image_name,u.first_name,u.last_name,spc.name as membership')
				->join('post_ads pa','pa.id=tblorders.product_id','LEFT')
				->join('categories c','c.id=pa.category_id','LEFT')
				->join('cities ci','ci.id=pa.city_list','LEFT')
				->join('gallerypost_ads gpa','pa.id=gpa.post_id','LEFT')
				->join('users u','tblorders.user_id=u.id','LEFT')
				->join('subscription_plans spl','spl.id=pa.ad_plan_id','LEFT')
				->join('subscription_category spc','spc.id=spl.plan_id','LEFT')
				->where(['pa.seller_id'=>$userid]);
				
				if(!empty($fromdate) && !empty($todate)){
					$data->where('DATE_FORMAT(FROM_UNIXTIME(tblorders.order_at),"%Y-%m-%d") BETWEEN "'.$fromdate.'" AND "'.$todate.'"');
				}
				if(!empty($type)){
					$data->where(['spc.id'=>$type]);
				}
				$data=$data->orderby('tblorders.id','DESC')
				->groupBy('tblorders.id')
				 ->get()
				->getResultArray();
				
				//echo $this->db->getLastQuery(); die;
		return $data;
	}
 
	public function get_allsellerordersamt($userid,$fromdate,$todate,$type){	
		
		$data=$this->db->table('tblorders')
				->select('SUM(tblorders.pay_amt) as pay_amt')	
				->join('post_ads pa','pa.id=tblorders.product_id','LEFT')
				->join('users u','tblorders.user_id=u.id','LEFT')
				->join('subscription_plans spl','spl.id=pa.ad_plan_id','LEFT')
				->join('subscription_category spc','spc.id=spl.plan_id','LEFT')
				->where(['pa.seller_id'=>$userid]);
				
				if(!empty($fromdate) && !empty($todate)){
					$data->where('DATE_FORMAT(FROM_UNIXTIME(tblorders.order_at),"%Y-%m-%d") BETWEEN "'.$fromdate.'" AND "'.$todate.'"');
				}
				if(!empty($type)){
					$data->where(['spc.id'=>$type]);
				}
				$data=$data->orderby('tblorders.id','DESC')
				->groupBy('tblorders.id')
				 ->get()
				->getRowArray();
				

                if(!empty($data) && count($data)){
                    $pay_amt=$data['pay_amt'];
                }else{
                    $pay_amt=0;
                }

				//echo $this->db->getLastQuery(); die;
		return $pay_amt;
	}
}