<?php 
namespace App\ViewModel;

use App\Enums\MensagemTipoEnum;

abstract class PadraoViewModel
{
    public $ValidacaoView;

    public bool $PossuiMensagemAviso = false;
    public bool $PossuiMensagemErro = false;
    public bool $PossuiMensagemSucesso = false;

    function __construct()
    {
        $this->ValidacaoView = array((object)['IdMensagemTipo' => 1, 'Mensagem' => 'Alerta Tal']);
    }

    function PossuiMensagem($IdMensagemTipo)
    {
        return in_array((int)$IdMensagemTipo, array_column($this->ValidacaoView, 'IdMensagemTipo'));
    }

    function AtualizarMensagens()
    {
        $this->PossuiMensagemAviso = $this->PossuiMensagem(MensagemTipoEnum::Aviso);
        $this->PossuiMensagemErro = $this->PossuiMensagem(MensagemTipoEnum::Erro);
        $this->PossuiMensagemSucesso = $this->PossuiMensagem(MensagemTipoEnum::Sucesso);
    }
}