<?php 
namespace App\Libraries;

class ServicoDeLogin extends ServicoPadrao
{
    protected function definirRegrasDeValidacao()
    {
        $validation->setRules([
            'email' => ['label' => 'E-mail', 'rules' => 'required'],
            'senha' => ['label' => 'Senha', 'rules' => 'required']
        ]);
    }
}