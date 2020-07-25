<?php namespace App\Controllers\Autenticacao;

use App\Enums\TipoDaViewEnum;
use App\Libraries\ServicoDeLogin;
use App\ViewModel\LoginViewModel;
use App\Controllers\Padrao\PadraoController;
use App\ViewModel\UsuarioAutenticadoViewModel;

class LoginController extends PadraoController
{
    private ServicoDeLogin $servicoDeLogin;

    function __construct()
    {
        $this->nomeDaView = 'autenticacao/LoginView';
        $this->servicoDeLogin = new ServicoDeLogin();
    }

	public function Index()
	{
        $this->updateViewModel = new LoginViewModel();
		return $this->carregarView(TipoDaViewEnum::Autenticacao);
    }

    public function Login()
    {
        $this->updateViewModel = $this->converterObjetoRequestParaViewModel($this->request->getPost(), LoginViewModel::class);
        $this->servicoDeLogin->validar($this->updateViewModel);

        if(count($this->updateViewModel->Mensagens) > 0)
        { 
            $this->updateViewModel->AtualizarMensagens();
            return $this->carregarView(TipoDaViewEnum::Autenticacao);
        }
        else 
        { 
            $usuario = new UsuarioAutenticadoViewModel();
            $this->sessao->set('usuario', $usuario);
        }

        return $this->redirecionar('painel/inicio');
    }
}