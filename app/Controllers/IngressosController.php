<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\IngressosModel;
use App\Libraries\CepService;
use App\Libraries\TrackingService;
use CodeIgniter\Events\Events;
use Sdkcorreios\Config\Services;
use Sdkcorreios\Methods\Tracking;
use Exception;

class IngressosController extends BaseController
{
    protected $ingressosModel;

    public function __construct() {
        $this->ingressosModel = new IngressosModel();
    }

    public function index()
    {
        // $ingressos = $this->ingressosModel->orderBy('data_de_ingresso', 'DESC')->paginate(10);
        // usort($ingressos, function ($a, $b) {
        //     $dataA = strtotime($a['data_de_ingresso']);
        //     $dataB = strtotime($b['data_de_ingresso']);
            
        //     if ($dataA == $dataB) {
        //         return 0;
        //     }
        //     return ($dataA < $dataB) ? 1 : -1;
        // });
        // foreach($ingressos as $data){
        //     foreach($data as $key => $value){
        //         echo "<div>" . $key . " - " . $value . "</div>";
        //     }
        // }
        // die;
        $ingresso = new IngressosModel();
        $ingressos = $ingresso->orderBy('data_de_ingresso', 'DESC')->paginate(7);
        $ingresso->pager->links();
        $pager = $ingresso->pager;
        

        return view('envios/index', ['ingressos' => $ingressos, 'pager' => $pager]);
    }
        
    public function create()
    {
        return view('envios/create');
    }

    public function store()
    {
        if ($this->request->getServer('REQUEST_METHOD') == "POST") {

            $cep = CepService::getCep($this->request->getPost('cep'));
            
            $data = [
                'nome_completo' => $this->request->getPost('nome_completo'),
                'data_de_ingresso' => $this->request->getPost('data_de_ingresso'),
                'whatsapp' => $this->request->getPost('whatsapp'),
                'cep' => $this->request->getPost('cep'),
                'logradouro' => $cep['street'],
                'localidade' => $cep['city'],
                'bairro' => $cep['district'],
                'uf' => $cep['state'],
                'complemento' => $this->request->getPost('complemento'),
            ];

            $this->ingressosModel->insert($data);

            return redirect()->route('ingressos_index');
        }
    }

    public function show($id)
    {
        try {
            $ingresso = $this->ingressosModel->find($id);
            
            return view('envios/show', ['ingresso' => $ingresso]);
        } catch (Exception $exception) {
            echo "Erro encontrado: " . $exception->getMessage();
        }
    }

    public function update($id)
    {
        $cep = $_REQUEST['cep'];
        $logradouro = $_REQUEST['logradouro'];
        $complemento = $_REQUEST['complemento'];
        $bairro = $_REQUEST['bairro'];
        $codigo_rastreio = strtoupper($_REQUEST['codigo_rastreio']);
        $ingresso = $this->ingressosModel->find($id);
        
        if (!empty($codigo_rastreio)) {
            if($this->request->getPost('_method') == 'PUT') {
                try {
                    $historico = TrackingService::getData($codigo_rastreio);

                    $tituloEncontrado = "";

                    foreach ($historico as $item) {
                        if ($item['originalTitle'] === "Objeto entregue ao destinatário") {
                            $tituloEncontrado = $item['originalTitle'];
                            break;
                        }
                        if (empty($tituloEncontrado)) {
                            foreach ($historico as $item) {
                                if ($item['originalTitle'] === "Objeto postado") {
                                    $tituloEncontrado = $item['originalTitle'];
                                    break;
                                }
                            }
                        }
                    }

                    $data = [
                        "cep" => $cep,
                        "complemento" => $complemento,
                        "codigo_rastreio" => $codigo_rastreio,
                        'detalhe_envio' => $tituloEncontrado,
                    ];
    
                    $this->ingressosModel->update($ingresso['id'], $data);

                    // EXIBIR HISTORICO DE ENTREGA --verificar se um dia irá precisar
                    // echo "Título encontrado: " . $tituloEncontrado;
                    // die;
                    // var_dump($historico);
                    // die;
                    // usort($historico, function ($a, $b) {
                    //     $partesDataHoraA = explode(' ', $a['date']);
                    //     $partesDataHoraB = explode(' ', $b['date']);
    
                    //     // Comparar as datas
                    //     $dataA = $partesDataHoraA[0];
                    //     $dataB = $partesDataHoraB[0];
                    //     if ($dataA != $dataB) {
                    //         return strtotime($dataA) - strtotime($dataB);
                    //     }
    
                    //     // Se as datas forem iguais, comparar os horários
                    //     $horaA = $partesDataHoraA[1];
                    //     $horaB = $partesDataHoraB[1];
                    //     return strtotime($horaA) - strtotime($horaB);
                    // });
    
                    // if(!empty($historico)) {
                    //     $ultimo = end($historico);
                    //     $detalhe_envio = $ultimo['originalTitle'];
                    // }
                    
                    // $detalhe_envio == $postado ? $detalhe_envio = $postado : $detalhe_envio;
    
                    // var_dump($id);
                    // die;
                    return redirect()->route('ingressos_show', [$ingresso['id']]);
                } catch (Exception $exception) {
                    echo "Erro encontrado: " . $exception->getMessage();
                }
            }
        }

        $data = [
            "cep" => $cep,
            "logradouro" => $logradouro,
            "complemento" => $complemento,
            "bairro" => $bairro,
        ];

        $this->ingressosModel->update($ingresso['id'], $data);

        return redirect()->route('ingressos_show', [$ingresso['id']]);
    }

    public function refresh($id)
    {
        $ingresso = $this->ingressosModel->find($id);
        $codigo_rastreio = $ingresso['codigo_rastreio'];

        if(!empty($codigo_rastreio)) {
            if($this->request->getPost('_method') == 'PUT') {
                try {
                    $historico = TrackingService::getData($codigo_rastreio);
        
                    $tituloEncontrado = "";
        
                    foreach ($historico as $item) {
                        if ($item['originalTitle'] === "Objeto entregue ao destinatário") {
                            $tituloEncontrado = $item['originalTitle'];
                            break;
                        }
                        if (empty($tituloEncontrado)) {
                            foreach ($historico as $item) {
                                if ($item['originalTitle'] === "Objeto postado") {
                                    $tituloEncontrado = $item['originalTitle'];
                                    break;
                                }
                            }
                        }
                    }
        
                    $data = [
                        "detalhe_envio" => $tituloEncontrado
                    ];

        
                    $this->ingressosModel->update($ingresso['id'], $data);
                } catch (Exception $exception) {
                    echo "Erro encontrado: " . $exception->getMessage();
                }
            }
        }

        return redirect()->route('ingressos_index');
    }
}