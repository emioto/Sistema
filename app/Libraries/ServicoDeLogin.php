<?php 
namespace App\Libraries;

class ServicoDeLogin extends ServicoPadrao
{
    protected function definirRegrasDeValidacao()
    {
        throw new Exception("Função não implementada");
        /*$validation->setRules([
            'email' => ['label' => 'E-mail', 'rules' => 'required'],
            'senha' => ['label' => 'Senha', 'rules' => 'required|min_length[6]']
        ]);*/
    }
}