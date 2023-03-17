<?php

namespace App\Models;

use CodeIgniter\Model;

class SubscriptionPlansModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'subscription_plans';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['plan_id', 'duration', 'amount', 'icon','status'];

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



    public function updateStatus($data, $id)
    {
        
        $query = $this->db->table('subscription_plans')->update($data, array('id' => $id));
        
        return $query;
    }
    public function deleteplan($id)
    {
        $query = $this->db->table('subscription_plans')->delete(array('id' => $id));
        
        return $query;
    }
    public function update_plan($data, $id){
        $query = $this->db->table('subscription_plans')->update($data, array('id' => $id));
    }
}
