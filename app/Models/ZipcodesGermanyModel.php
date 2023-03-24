<?php

namespace App\Models;

use CodeIgniter\Model;

class ZipcodesGermanyModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'zipcodes_germany';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name', 'zipcode'];

    // Dates
    protected $useTimestamps = true;
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

    public function getAllZipcodes()
    {
        $result = $this->db->table('zipcodes_germany')->get()->getResultArray();
        return $result;
    }

    public function getZipcode($zipcodeId)
    {
        $result = $this->db->table('zipcodes_germany')->where('id', $zipcodeId)->get()->getRow();
        return $result;
    }

    public function getZipcodesByText($search)
    {
        $builder = $this->db->table('zipcodes_germany');
        $builder->select("id, name, zipcode");
        $builder->orLike('name', $search);
        $builder->orLike('zipcode', $search);

        $result = $builder->get()->getResultArray();
        return $result;
    }
}
