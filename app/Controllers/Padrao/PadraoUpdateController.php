<?php
namespace App\Controllers\Padrao;

use App\Enums\TipoDaViewEnum;

abstract class PadraoUpdateController extends PadraoAutenticadorController
{
    protected $nomeGridView;
    protected $gridViewModel;

    function __construct()
    {

    }

    protected abstract function definirRegrasDeValidacao();
    protected function validar()
    {
        $validation->setRules([
            'username' => ['label' => 'Username', 'rules' => 'required'],
            'password' => ['label' => 'Password', 'rules' => 'required|min_length[10]']
        ]);
    }

    protected function carregarView($tipoDaView)
    {
        switch ($tipoDaView)
        {
             default:
             case TipoDaViewEnum::Aviso:
                 return view("AvisoView");
             case TipoDaViewEnum::Erro:
                 return view("ErroView");
             case TipoDaViewEnum::Grid:
                 return view($this->nomeGridView, $this->gridViewModel);
             case TipoDaViewEnum::Update:
                 return view($this->nomeDaView, $this->updateViewModel);
        }
    }
}
