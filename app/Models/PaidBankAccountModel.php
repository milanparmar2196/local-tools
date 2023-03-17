<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class PaidBankAccountModel extends Model
{

    protected $DBGroup          = 'default';
    protected $table            = 'paid_bankaccount';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['user_id','accountH','bankN','accountN','ifsc','accountT','city','zipcode'];

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
        
        $query = $this->db->table('paid_bankaccount')->insert($data);
        
        return $query; 
    }

    public function updateAccount($data, $id)
    {
        
        $query = $this->db->table('paid_bankaccount')->update($data, array('id' => $id));
        
        return $query;
    }
    public function deleteAccount($id)
    {
        $query = $this->db->table('paid_bankaccount')->delete(array('id' => $id));
        
        return $query;
    }
	
	public function getAccounts($userid){
		$data=$this->db->table('paid_bankaccount')->where(['user_id'=>$userid])->get()->getResultArray();
		return $data;
		
	}
	
	public function getAccountDetails($id){
		$data=$this->db->table('paid_bankaccount')->where(['id'=>$id])->get()->getRowArray();
		return $data;
		
	}
	
	
	public function getBillingAccounts($userid){
		$data=$this->db->table('billing_cards')->where(['user_id'=>$userid])->get()->getResultArray();
		return $data;
	}
	
    public function saveBillingAccount($data)
    {
        
        $query = $this->db->table('billing_cards')->insert($data);
        
        return $query; 
    }

    public function updateBillingAccount($data, $id)
    {
        
        $query = $this->db->table('billing_cards')->update($data, array('id' => $id));
        
        return $query;
    }
	
	public function getBillingAccountDetails($id){
		$data=$this->db->table('billing_cards')->where(['id'=>$id])->get()->getRowArray();
		return $data;
		
	}
}