![PagueVeloz](https://www.pagueveloz.com.br/Content/Img/logo-pagueveloz-topo_03.png "PagueVeloz")

[![StyleCI](https://styleci.io/repos/27489184/shield)](https://styleci.io/repos/27489184)
[![Build Status](https://travis-ci.org/PagueVeloz/pagueveloz-php.svg)](https://travis-ci.org/PagueVeloz/pagueveloz-php)
[![Coverage Status](https://coveralls.io/repos/github/PagueVeloz/pagueveloz-php/badge.svg?branch=master)](https://coveralls.io/github/PagueVeloz/pagueveloz-php?branch=master)
[![Latest Stable Version](https://poser.pugx.org/pagueveloz/pagueveloz/v/stable)](https://packagist.org/packages/pagueveloz/pagueveloz) 
[![Total Downloads](https://poser.pugx.org/pagueveloz/pagueveloz/downloads)](https://packagist.org/packages/pagueveloz/pagueveloz) 
[![Latest Unstable Version](https://poser.pugx.org/pagueveloz/pagueveloz/v/unstable)](https://packagist.org/packages/pagueveloz/pagueveloz) 
[![License](https://poser.pugx.org/pagueveloz/pagueveloz/license)](https://packagist.org/packages/pagueveloz/pagueveloz)

> Cliente PHP da API do [PagueVeloz](https://www.pagueveloz.com.br), com base nas informações contidas no [help](https://www.pagueveloz.com.br/help) .

**Pré-requisitos**

 * PHP 5.4 ou superior
 * [composer](https://getcomposer.org)

**Instalação via composer:**
```
composer require pagueveloz/pagueveloz
```

## Serviços disponíveis:
|                   	| V1 	| V2 	| V3 	|
|-------------------	|----	|----	|----	|
| Cep               	| x  	|    	|    	|
| Cliente           	| x  	|    	|    	|
| Consultar         	| x  	|    	|    	|
| ConsultarBoleto   	| x  	|    	|    	|
| CreditoSMS        	| x  	|    	|    	|
| DefaultBoleto     	| x  	|    	|    	|
| Extrato           	| x  	|    	|    	|
| MensagemSMS       	| x  	|    	|    	|
| PacoteSMS         	| x  	|    	|    	|
| Ping              	| x  	|    	|    	|
| Saldo             	| x  	|    	|    	|
| Saque             	| x  	|    	|    	|
| Tarifa            	| x  	|    	|    	|
| Transferencia     	| x  	|    	|    	|
| UsuarioCliente    	| x  	|    	|    	|
| Assinar           	|    	| x  	|    	|
| Boleto            	|    	| x  	| x  	|
| ComprarCreditoSMS 	|    	| x  	|    	|
| Consultar         	|    	| x  	|    	|
| ContaBancaria     	|    	| x  	|    	|

# Exemplos:

Assinar (Serviço de assinatura do PagueVeloz)
```php
require_once __DIR__."/vendor/autoload.php";

use PagueVeloz\PagueVeloz;

PagueVeloz::Url('https://www.pagueveloz.com.br/api');

$assinar = PagueVeloz::Assinar();

$assinar->dto
	->setNome('xxxxxxxx')
	->setDocumento('xxxxxxxxxxx')
	->setTipoPessoa(x)
	->setLoginUsuarioDefault('xxxxx@xxxx.xxx.xx')
	->setEmail('xxxxx@xxxx.xxx.xx');

$assinar->Post();
```
Observação : Todo retorno será um objeto do tipo "PagueVeloz\Service\Context\HttpResponse"

### Serviços com autenticação

Serviços que necessitem de autenticação devem enviar o cabeçalho ***"Authentication"*** com o valor ***"Basic valor"***, sendo ***"valor"*** igual ao texto em base64 do e-mail do usuário concatenado com o caracter ":" concatenado com o token do usuário.

### Serviços sem autenticação

Alguns serviços não necessitam de autenticação e podem ser chamados diretamente, veja abaixo alguns:

 * Assinar
 * Cep
