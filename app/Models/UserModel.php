<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    // protected $DBGroup = 'default'; 
    // Se houver outro banco configurado em Database.php é só alterar de default para o nome
    protected $table            = 'usuario';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object'; // mudar de array para object
    protected $useSoftDeletes   = false; 
    // quando é true, precisa adicionar a coluna deleted_at no DB, 
    // dessa forma o dado não será excluido do banco e irá aparecer a data em que foi deletado
    protected $protectFields    = true;
    protected $allowedFields    = ['nome', 'login', 'senha'];

    protected bool $allowEmptyInserts = false;

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
    protected $beforeInsert   = ['hashPassword'];
    protected $afterInsert    = [];
    protected $beforeUpdate   = ['hashPassword'];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function hashPassword(array $data)
    {
        $data['data']['senha'] = password_hash($data['data']['senha'], PASSWORD_DEFAULT);
        
        return $data;
    }
}
