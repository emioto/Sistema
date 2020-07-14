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
	 * Sessão atual ativa para o usuário autenticado
     * se estiver vazia significa que o usuário não foi autenticado.
	 * @var array
	 */
	protected $sessao;
	
	/**
	 * Constructor.
	 */
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		parent::initController($request, $response, $logger);
		
		$this->sessao = \Config\Services::session();
    }
	
    protected function redirecionar($rota) 
	{
		return redirect()->route($rota);
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
				$this->updateViewModel->AtualizarMensagens();
                return view($this->nomeDaView, (array)$this->updateViewModel);
             case TipoDaViewEnum::Comum:
                return view($this->nomeDaView);
        }
	}
	
	protected function converterObjetoRequestParaViewModel($origem, $destino)
	{
		if (is_array($origem)) { $origem = (object)$origem; }
		if (is_string($destino)) { $destino = new $destino(); }

		$sourceReflection = new \ReflectionObject($origem);
		$destinationReflection = new \ReflectionObject($destino);
		$sourceProperties = $sourceReflection->getProperties();
		
		foreach ($sourceProperties as $sourceProperty) 
		{
			$sourceProperty->setAccessible(true);
			$name = $sourceProperty->getName();
			$value = $sourceProperty->getValue($origem);
			if ($destinationReflection->hasProperty($name)) 
			{
				$propDest = $destinationReflection->getProperty($name);
				$propDest->setAccessible(true);
				$propDest->setValue($destino, $value);
			} 
			else { $destino->$name = $value; }
		}
		
		return $destino;
	}
}
