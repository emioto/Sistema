<?php 
namespace App\Entities;

class Usuario extends PadraoEntidade
{
    function _construct()
    {
        parent::__construct();
        array_push($this->attributes, 'IdPessoa', 'Email', 'Senha', 'Administrador');
        array_push($this->casts , ['IdPessoa' => 'integer'], ['Email' => 'string'], ['Senha' => 'string'], ['Administrador' => 'boolean']);
    }

    public function setSenha(string $senha)
    {
        $this->attributes['Senha'] = password_hash($senha, PASSWORD_BCRYPT);
        return $this;
    }
}