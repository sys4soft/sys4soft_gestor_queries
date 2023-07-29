<?php

namespace App\Models;

use CodeIgniter\Model;

class QueriesModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'queries';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_user', 'query_name', 'query_tags', 'project', 'query'];

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

    public function insert_query($data)
    {
        $params = [
            $data['id_user'],
            $data['query_name'],
            $data['query_tags'],
            $data['project'],
            $data['query']
        ];

        $this->db->query("
            INSERT INTO queries 
            (id_user, query_name, query_tags, project, query)
            VALUES 
            (
                ?, 
                ?, 
                ?, 
                ?, 
                AES_ENCRYPT(?,'" . MYSQL_AES_KEY . "')
            )
        ", $params);
    }
}
