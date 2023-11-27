<?php

namespace App\Models;

use App\Entities\Gastos;
use CodeIgniter\Model;

class DespesasModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'despesas';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $returnType       = Gastos::class;
    protected $allowedFields    = ['user_id', 'categoria_id', 'valor', 'data', 'descricao'];


    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules = [
        'valor' => 'required',
        'data' => 'required',
        'descricao' => 'required|min_length[5]|max_length[100]'
    ];
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
}
