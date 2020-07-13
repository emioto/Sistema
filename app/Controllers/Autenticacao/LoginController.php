<?php namespace App\Controllers\Autenticacao;

use App\Enums\TipoDaViewEnum;
use App\Controllers\Padrao\PadraoController;

class LoginController extends PadraoController
{
    function __construct()
    {
        $this->nomeDaView = 'autenticacao/LoginView';
    }

	public function Index()
	{
		return $this->carregarView(TipoDaViewEnum::Comum);
    }
}