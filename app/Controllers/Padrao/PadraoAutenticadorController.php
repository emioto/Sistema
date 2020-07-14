<?php
namespace App\Controllers\Padrao;

abstract class PadraoAutenticadorController extends PadraoController
{
    function __construct()
    {
        if (!isset($this->sessao)) { $this->sessao = \Config\Services::session(); }
    }

    protected function autenticarSessaoUsuario()
    {
        if(!$this->sessao->has('aluno'))
		{
			return $this->redirecionar('Autenticacao/Login');
		}
    }
}
