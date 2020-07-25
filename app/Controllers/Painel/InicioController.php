<?php namespace App\Controllers\Painel;

use App\Enums\TipoDaViewEnum;
use App\Controllers\Padrao\PadraoController;

class InicioController extends PadraoController
{
	function __construct()
	{
		$this->nomeDaView = "painel/InicioView";
	}

	public function Index()
	{
		return $this->carregarView(TipoDaViewEnum::Comum);
	}
}
