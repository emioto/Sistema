<?php 
namespace App\Libraries;

use App\Models\UsuarioModel;
use App\Enums\MensagemTipoEnum;

class ServicoDeLogin extends ServicoPadrao
{
    private UsuarioModel $repositorioDeUsuario;

    protected function definirRegrasDeValidacao()
    {
        $this->repositorioDeUsuario = new UsuarioModel();
        $this->validacao->setRules([
            'Email' => ['label' => 'E-mail', 'rules' => 'required'],
            'Senha' => ['label' => 'Senha', 'rules' => 'required']
        ]);
    }

    public function validar($viewModel)
    {
        $this->realizarValidacao($viewModel);

        if(count($viewModel->Mensagens) <= 0)
        {
            //$usuario = $this->repositorioDeUsuario->ObterPorEmailSenha($viewModel);
        
            $usuario = 'testre';
        
            if(!isset($usuario)) 
            { 
                $viewModel->AdicionarMensagem
                (
                    MensagemTipoEnum::Erro,
                    "Não foi possível localizar o usuário informado, por favor verifique se seu email e ou senha estão corretos!"
                ); 
            }
        }

        return $viewModel;
    }
}