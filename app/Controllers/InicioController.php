<?php namespace App\Controllers;

use App\Controllers\Padrao\PadraoController;

class Inicio extends PadraoController
{
	function __construct()
	{
		$this->nomeDaView = "InicioView";
	}

	public function Index()
	{
		return $this->carregarView();
	}
}
