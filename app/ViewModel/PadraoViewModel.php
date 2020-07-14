<?php 
namespace App\ViewModel;

use App\Enums\MensagemTipoEnum;

abstract class PadraoViewModel
{
    public array $Mensagens;

    public bool $PossuiMensagemAviso = false;
    public bool $PossuiMensagemErro = false;
    public bool $PossuiMensagemComum = false;

    function __construct()
    {
        $this->Mensagens = array();
    }

    function PossuiMensagem($IdMensagemTipo)
    {
        if(count($this->Mensagens) <= 0)
            return false;

        return in_array($IdMensagemTipo, array_column($this->Mensagens, 'IdMensagemTipo'));
    }

    function AtualizarMensagens()
    {
        $this->PossuiMensagemAviso = $this->PossuiMensagem(MensagemTipoEnum::Aviso);
        $this->PossuiMensagemErro = $this->PossuiMensagem(MensagemTipoEnum::Erro);
        $this->PossuiMensagemComum = $this->PossuiMensagem(MensagemTipoEnum::Comum);
    }
}