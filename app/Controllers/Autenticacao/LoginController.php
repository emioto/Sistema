<?php namespace App\Controllers\Autenticacao;

use App\Enums\TipoDaViewEnum;
use App\Libraries\ServicoDeLogin;
use App\ViewModel\LoginViewModel;
use App\Controllers\Padrao\PadraoController;

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
		return $this->carregarView(TipoDaViewEnum::Update);
    }

    public function Login()
    {
        $this->updateViewModel = $this->converterObjetoRequestParaViewModel($this->request->getPost(), LoginViewModel::class);
        $this->servicoDeLogin->validar($this->updateViewModel);

        if(count($this->updateViewModel->Mensagens) > 0)
        { 
            $this->updateViewModel->AtualizarMensagens();
            return $this->carregarView(TipoDaViewEnum::Update);
        }
        else 
        { 
            $usuario = new \stdClass();
            $this->sessao->set('usuario', $usuario);
        }
    }
}