<?php 
namespace App\Models;

abstract class UsuarioModel extends PadraoModel
{
    protected $returnType = 'App\Entities\Usuario';

    function __construct()
    {
        parent::__construct();
    }

    protected function definirCamposPermitidosAlterar()
    {
        $this->allowedFields = 
        [
            'Email', 
            'Senha', 
            'Administrador'
        ];
    }

    protected function definirRegrasDeValidacao()
    {
        $this->validationRules = 
        [ 
            'Email' => 'required|valid_email|is_unique[Usuario.Email]', 
            'Senha' => 'required|min_length[8]',
            'Administrador' => 'required'
        ];
    }

    public function ObterPorEmailSenha($viewModel)
    {
        return  $this->db
                     ->table($this->table)
                     ->where("Email", $viewModel->Email)
                     ->where("Senha", $viewModel->Senha)
                     ->get()
                     ->getRowObject();
    }
}