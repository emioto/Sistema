<?php
namespace App\Controllers\Padrao;

abstract class PadraoAutenticadorController extends PadraoController
{
    /**
	 * Sessão atual ativa para o usuário autenticado
     * se estiver vazia significa que o usuário não foi autenticado.
	 * @var array
	 */
    protected $sessao;

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
