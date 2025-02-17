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
        $this->table = str_replace("Model", "", get_class($this));
        $this->primaryKey = "Id";

        $this->definirCamposPermitidosAlterar();
        $this->definirRegrasDeValidacao();
    }

    protected abstract function definirCamposPermitidosAlterar();
    protected abstract function definirRegrasDeValidacao();

    public function Obter($id)
    {
        return  $this->db
                     ->table($this->table)
                     ->where($this->primaryKey, $id)
                     ->get()
                     ->getRowObject();
    }
}