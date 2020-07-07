<?php 
namespace App\Models;

use CodeIgniter\Model;

abstract class PadraoModel extends Model
{
    protected $table;
    protected $primaryKey;
    protected $allowedFields;
    protected $validationRules;
    protected $returnType;

    protected $useSoftDeletes = true;
    protected $validationMessages = [];
    protected $skipValidation = false;

    function __construct()
    {
        $this->table = str_replace("Model", "", $this::class);
        $this->primaryKey = "Id";

        $this->definirCamposPermitidosAlterar();
        $this->definirRegrasDeValidacao();
    }

    protected abstract function definirCamposPermitidosAlterar();
    protected abstract function definirRegrasDeValidacao();
}