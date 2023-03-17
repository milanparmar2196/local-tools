<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class NotificationModel extends Model
{

    protected $DBGroup          = 'default';
    protected $table            = 'payment_notifications';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['user_id','activity','cron'];

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


	public function saveAccount($data)
    {
        
        $query = $this->db->table('payment_notifications')->insert($data);
        
        return $query; 
    }

    public function updateAccount($data, $id)
    {
        
        $query = $this->db->table('payment_notifications')->update($data, array('id' => $id));
        
        return $query;
    }
    public function deleteAccount($id)
    {
        $query = $this->db->table('payment_notifications')->delete(array('id' => $id));
        
        return $query;
    }
	
	public function getdetails($userid){
		$data=$this->db->table('payment_notifications')->where(['user_id'=>$userid])->get()->getRowArray();
		return $data;
		
	}
	
	public function getAccountDetails($id){
		$data=$this->db->table('paid_bankaccount')->where(['id'=>$id])->get()->getRowArray();
		return $data;
		
	}
	
	public function homenotifications($userid){
		$data=$this->db->table('tblhomenotifications')->where(['user_id'=>$userid,'is_delete'=>0])->get()->getResultArray();
		return $data;
	}
	
	
	public function deletehomenotifications($id){
		$data=$this->db->table('tblhomenotifications')->update(['is_delete'=>1],['id'=>$id]);
		return $data;
	}
}