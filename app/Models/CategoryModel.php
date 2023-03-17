<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class CategoryModel extends Model
{

    protected $DBGroup          = 'default';
    protected $table            = 'categories';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name','parent_id','is_active','german_name','icon'];

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
        
        $query = $this->db->table('categories')->update($data, array('id' => $id));
        
        return $query;
    }
    public function deleteCategory($id)
    {
        $query = $this->db->table('categories')->delete(array('id' => $id));
        
        return $query;
    }
    public function update_category($data, $id){
        $query = $this->db->table('categories')->update($data, array('id' => $id));
    }

}