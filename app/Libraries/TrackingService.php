<?php 

namespace App\Libraries;

use Exception;
use Sdkcorreios\Config\Services;
use Sdkcorreios\Methods\Tracking;
use App\Models\IngressosModel;

class TrackingService
{

    public static function getResponseAPI(string $codigo_rastreio)
    {
        Services::setServiceTracking('MelhorRastreio');
        Services::setDebug(true);

        $tracking = new Tracking();
        $tracking->setCode($codigo_rastreio);

        $response = $tracking->get();
        
        return $response->result[0]['data'];
    }

    public static function getRastreio(string $codigo_rastreio): array
    {
        Services::setServiceTracking('MelhorRastreio');
        Services::setDebug(true);

        $tracking = new Tracking();
        $tracking->setCode($codigo_rastreio);

        $response = $tracking->get();

        $arrayData = $response->result[0]['data'];

        if(count($arrayData) == 1) {
            $detalhe = $response->result[0]['data'][0]['originalTitle'];
        } else {
            $detalhe = $response->result[0]['data'][1]['originalTitle'];
        }

        $data = [
            'codigo_rastreio' => $response->result[0]['code'],
            'detalhe_envio' => $response->result[0]['data'][0]['originalTitle']
        ];

        return $data;
    }
    
    public static function getCodigo(string $codigo_rastreio): string
    {
        Services::setServiceTracking('MelhorRastreio');
        Services::setDebug(true);

        $tracking = new Tracking();
        $tracking->setCode($codigo_rastreio);

        $response = $tracking->get();

        return $response->result[0]['code'];
    }

    public static function getDetalhe(string $codigo_rastreio): string
    {
        Services::setServiceTracking('MelhorRastreio');
        Services::setDebug(true);

        $tracking = new Tracking();
        $tracking->setCode($codigo_rastreio);

        $response = $tracking->get();

        $arrayData = $response->result[0]['data'];

        return $response->result[0]['data'][0]['originalTitle'];
    }
    
    public static function getData(string $codigo_rastreio): array
    {
        Services::setServiceTracking('MelhorRastreio');
        Services::setDebug(true);

        $tracking = new Tracking();
        $tracking->setCode($codigo_rastreio);

        $response = $tracking->get();

        $arrayData = $response->result[0]['data'];

        return $response->result[0]['data'];
    }
}