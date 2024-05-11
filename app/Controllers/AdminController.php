<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Sdkcorreios\Config\Services;
use Sdkcorreios\Methods\Tracking;
use App\Controllers\TrackingController;
use CodeIgniter\HTTP\ResponseInterface;

class AdminController extends BaseController
{
    public function index()
    {
        return 
            view('general/header.php').
            view('rastreamento/general/header.php').
            view('rastreamento/index.php').
            view('general/footer.php');
        }
        
        public function show()
        {
            // $codigo = $_POST['codigo'];
            
            // Services::setServiceTracking('MelhorRastreio');
            // Services::setDebug(true);
            
            // $tracking = new Tracking();
            // $tracking->setCode($codigo);
            
            // if(Services::$success) {
            //     return json_encode($tracking->get());
            // } else {
            //     return json_encode(Services::getMessageError());
            // }
                    
            return 
                view('general/header.php').
                view('rastreamento/general/header.php').
                view('rastreamento/show.php').
                view('general/footer.php');
            
    }
}