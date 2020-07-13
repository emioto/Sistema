<?php
namespace App\Controllers\Padrao;

use CodeIgniter\Controller;
use App\Enums\TipoDaViewEnum;

abstract class PadraoController extends Controller
{
    /**
	 * Nome da view a ser exibida ao usuario
	 * @var string
	 */
    protected $nomeDaView;

	/**
	 * Representa os dados a serem exibidos para usuário na tela
     * que poderão ser manipulados
	 * @var array
	 */
	protected $updateViewModel;
	
	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend PadraoController.
	 *
	 * @var array
	 */
    protected $helpers = []; 

	/**
	 * Constructor.
	 */
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
        parent::initController($request, $response, $logger);
    }
	
    protected function redirecionar($rota) 
	{
		return redirect(base_url($rota));
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
             case TipoDaViewEnum::Update:
                 return view($this->nomeDaView, $this->updateViewModel);
             case TipoDaViewEnum::Comum:
                 return view($this->nomeDaView);
        }
    }
}
