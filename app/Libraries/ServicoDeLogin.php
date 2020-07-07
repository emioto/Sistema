<?php 
namespace App\Libraries;

use App\Models\UsuarioModel;
use App\Libraries\ServicoPadrao;

class ServicoDeLogin extends ServicoPadrao
{
    private UsuarioModel $repositorioDeUsuario;

    protected function definirRegrasDeValidacao()
    {
        $validation->setRules([
            'email' => ['label' => 'E-mail', 'rules' => 'required'],
            'senha' => ['label' => 'Senha', 'rules' => 'required']
        ]);
    }

    public function ObterParaLogin($viewModel)
    {
        $this->realizarValidacao($viewModel);

        if(count($viewModel->errosDeValidacao) <= 0)
        {
            $usuario = $this->repositorioDeUsuario->ObterPorEmailSenha($viewModel);
        
            if(!isset($usuario)) 
            { 
                array_push($viewModel->errosDeValidacao, ['E-mail e ou Senha' => 'Não foi possível localizar o usuário informado, por favor verifique se seu email e ou senha estão corretos!.']); 
            }
        }

        return $viewModel;
    }
}