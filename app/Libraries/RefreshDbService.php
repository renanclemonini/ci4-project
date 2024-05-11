<?php 

namespace App\Libraries;

use \App\Models\IngressosModel;

class RefreshDbService
{
    protected $ingressosModel;

    public function __construct() 
    {
        $this->ingressosModel = new IngressosModel();
    }

    public function insertDb($data)
    {
        $this->ingressosModel->insert($data);
    }

    public function updateDb($id, $data): void
    {
        $this->ingressosModel->update($id, $data);
    }
}