<?php 


use App\Models\IngressosModel;
use Sdkcorreios\Config\Services;
use Sdkcorreios\Methods\Tracking;
use App\Libraries\CepService;
use App\Libraries\TrackingService;

function getRastreio(string $codigo_rastreio)
{
    Services::setServiceTracking('MelhorRastreio');
    Services::setDebug(true);

    $tracking = new Tracking();
    $tracking->setCode($codigo_rastreio);

    $response = $tracking->get();

    $arrayData = $response->result[0]['data'];

    if(count($arrayData) == 1) {
        return $response->result[0]['data'][0]['originalTitle'];
    } else {
        return $response->result[0]['data'][1]['originalTitle'];
    }
}
function getCodigo(string $codigo_rastreio): string
{
    Services::setServiceTracking('MelhorRastreio');
    Services::setDebug(true);

    $tracking = new Tracking();
    $tracking->setCode($codigo_rastreio);

    $response = $tracking->get();

    return $response->result[0]['code'];
}

function getDetalhe(string $codigo_rastreio): string
{
    Services::setServiceTracking('MelhorRastreio');
    Services::setDebug(true);

    $tracking = new Tracking();
    $tracking->setCode($codigo_rastreio);

    $response = $tracking->get();

    $arrayData = $response->result[0]['data'];

    if(count($arrayData) == 1) {
        return $response->result[0]['data'][0]['originalTitle'];
    } else {
        return $response->result[0]['data'][1]['originalTitle'];
    }
}