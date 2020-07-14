<?php namespace App\Controllers\Autenticacao;

use App\Enums\TipoDaViewEnum;
use App\ViewModel\LoginViewModel;
use App\Controllers\Padrao\PadraoController;

class LoginController extends PadraoController
{
    function __construct()
    {
        $this->nomeDaView = 'autenticacao/LoginView';
    }

	public function Index()
	{
        $this->updateViewModel = new LoginViewModel();
		return $this->carregarView(TipoDaViewEnum::Update);
    }

    public function AutenticarUsuario()
    {
        $viewModel = $this->converterObjetoRequestParaViewModel($this->request->getPost(), LoginViewModel::class);
    }
}