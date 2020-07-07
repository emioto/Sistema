<?php 
namespace App\Libraries;

abstract class ServicoPadrao
{
    protected $validacao;

    function __construct()
    {
        if(!isset($this->validacao)) { $this->validacao = \Config\Services::validation(); }
    }

    protected abstract function definirRegrasDeValidacao();
    protected function realizarValidacao($viewModel)
    {
        $viewModel->errosDeValidacao = $this->validacao->run($viewModel)->getErrors();
    }
}