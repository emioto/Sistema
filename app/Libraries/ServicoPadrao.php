<?php 
namespace App\Libraries;

abstract class ServicoPadrao
{
    protected $validacao;

    function __construct()
    {
        if(!isset($this->validacao)) { $this->validacao = \Config\Services::validation(); }

        $this->definirRegrasDeValidacao();
    }

    protected abstract function definirRegrasDeValidacao();
    
    protected function realizarValidacao(&$viewModel)
    {
        $viewModel->Mensagens = $this->validacao->run($viewModel)->getErrors();
    }
}