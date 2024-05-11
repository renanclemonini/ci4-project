<?php 

// require '../vendor/autoload.php';

namespace App\Libraries;

use Claudsonm\CepPromise\CepPromise;


class CepService
{
    public static function getCep($cep) 
    {
        $endereço = CepPromise::fetch($cep)->toArray();

        return $endereço;
    }
}