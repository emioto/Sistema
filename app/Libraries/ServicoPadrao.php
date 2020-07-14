<?php 
namespace App\Libraries;

use App\Enums\MensagemTipoEnum;

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
        $this->validacao->run((array)$viewModel);

        foreach($this->validacao->getErrors() as $erro)
        {
            array_push($viewModel->Mensagens, (object)['IdMensagemTipo' => MensagemTipoEnum::Erro, 'Mensagem' => $erro]);
        }
    }
}