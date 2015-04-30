<?php

namespace PagueVeloz\Api\v1;

/**
 * MensagemSMS.php
 * 
 * 
 * @author Cristian B. dos Santos <cristian.deveng@gmail.com>
 * @copyright 2015
 * @version 1.0v
*/

use \PagueVeloz\ServiceProvider;
use \PagueVeloz\Api\InterfaceApi;
use \PagueVeloz\Service\Context\HttpRequest;
use \PagueVeloz\Api\Common\Auth;
use \PagueVeloz\Api\v1\Dto\MensagemSMSDTO;

class MensagemSMS extends ServiceProvider implements InterfaceApi
{
	public function __construct(MensagemSMSDTO $dto)
	{
		$this->dto = $dto;
		$this->uri = '/v1/MensagemSMS';

		parent::__construct();

		return $this;
	}

	public function Get()
	{
		$this->method = 'GET';
		$this->Authorization();
		
		return $this->init();
	}
	
	public function GetById($id)
	{
		
		$this->method = 'GET';
		$this->Authorization();
		$this->url = sprintf('%s/%s', $this->url, $id);

		return $this->init();	
		
	}

	public function GetByPeriodo($status,$dtInicial, $dtFinal)
	{

		$_inicio = new \DateTime($dtInicial);
		$_final  = new \DateTime($dtFinal);

		$this->method = 'GET';
		$this->Authorization();

		$this->url = sprintf('%?status=%s&dataInicial%s&dataFinal=%s', $this->url, $status, $_inicio->format('Y-m-d'), $_final->format('Y-m-d'));
		
		return $this->init();
	}
	
	public function Post()
	{
		if ($this->isEmpty($this->dto->getRequest()))
			throw new \Exception("Erro ao montar request", 1);
		
		$request = new HttpRequest;

		$request->body = $this->dto->getRequest();
		$this->method = 'POST';
		$this->Authorization();
		
		return $this->init($request);
	}
	
	public function Put()
	{
		return $this->NoContent();
	}
	
	public function Delete($id)
	{
		return $this->NoContent();
	}
	
}
