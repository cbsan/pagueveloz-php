<?php

namespace PagueVeloz\Api\v2;

use PagueVeloz\Api\InterfaceApi;
use PagueVeloz\Api\v2\Dto\TransferenciaDTO;
use PagueVeloz\Service\Context\HttpRequest;
use PagueVeloz\ServiceProvider;

class Transferencia extends ServiceProvider implements InterfaceApi
{
    public function __construct(TransferenciaDTO $dto)
    {
        $this->dto = $dto;
        $this->uri = '/v2/Transferencia';

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
        return $this->NoContent();
    }

    public function GetBySeuNumero($seuNumero)
    {
        $this->method = 'GET';
        $this->Authorization();
        $this->url = sprintf('%s/%s', $this->url, $seuNumero);

        return $this->init();
    }

    public function GetByPeriodo($dtInicial, $dtFinal)
    {
        $_inicio = new \DateTime($dtInicial);
        $_final = new \DateTime($dtFinal);

        $this->method = 'GET';
        $this->Authorization();

        $this->url = sprintf('%s/%s/%s', $this->url, $_inicio->format('Y-m-d'), $_final->format('Y-m-d'));

        return $this->init();
    }

    public function Post()
    {
        if ($this->isEmpty($this->dto->getRequest())) {
            throw new \Exception('Erro ao montar request');
        }

        $this->Authorization();
        $request = new HttpRequest();

        $request->body = $this->dto->getRequest();
        $this->method = 'POST';

        return $this->init($request);
    }

    public function Put($id = null)
    {
        return $this->NoContent();
    }

    public function Delete($id)
    {
        return $this->NoContent();
    }
}
