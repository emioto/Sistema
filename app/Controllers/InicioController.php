<?php namespace App\Controllers;

use App\Controllers\Padrao\PadraoController;

class Inicio extends PadraoController
{
	public function Index()
	{
		return $this->carregarView();
	}
}
