<?php
namespace App\Controllers\Padrao;

use App\Enums\TipoDaViewEnum;

abstract class PadraoUpdateController extends PadraoAutenticadorController
{
    function __construct()
    {
        parent::__construct();
    }
}
