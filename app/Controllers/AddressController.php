<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AddressController extends BaseController
{
    public function index()
    {
        return 
            view('general/header.php').
            view('general/navbar.php').
            view('envios/index.php');
            // view('general/footer.php');
    }
}
