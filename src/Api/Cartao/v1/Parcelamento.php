<?php

namespace PagueVeloz\Api\Cartao\v1;

/*
 * Parcelamento.php
 *
 *
 * @author Cristian B. dos Santos <cristian.deveng@gmail.com>
 * @copyright 2015
 * @version 1.0v
*/

use PagueVeloz\Api\Cartao\v1\Dto\ParcelamentoDTO;
use PagueVeloz\Api\InterfaceApi;
use PagueVeloz\ServiceProvider;

class Parcelamento extends ServiceProvider implements InterfaceApi
{
    public function __construct(ParcelamentoDTO $dto)
    {
        $this->dto = $dto;
        $this->uri = '/VendaDigitada/v1/Parcelamento';
        $this->isOperationCartao = true;
        parent::__construct();

        return $this;
    }

    public function Get()
    {
        $bandeira = $this->dto->getBandeira();
        $valor = $this->dto->getValor();

        if (empty($bandeira) || empty($valor)) {
            throw new \Exception('Informe a bandeira e o valor que deseja parcelar', 1);
        }

        $this->Authorization();

        $this->url = sprintf('%s?Bandeira=%s&valorServico=%01.2f', $this->url, $bandeira, $valor);
        $this->method = 'GET';
        $this->Authorization();

        return $this->init();
    }

    public function GetById($id)
    {
        return $this->NoContent();
    }

    public function Post()
    {
        return $this->NoContent();
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
