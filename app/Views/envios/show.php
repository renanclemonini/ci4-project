<?php
/**
 * @var CodeIgniter\View\View $this
*/
?>

<?= $this->extend('master') ?>

<?= $this->section('content') ?>

<?= $this->include('partials/navbar') ?>

<main class="main my-3">
    <div class="container container-sm">
        <?php 
            if($ingresso['detalhe_envio'] != 'Objeto Postado'): 
        ?>
        <h5 class="card-header text-center fw-bold">Atualizando Registro</h5>
        <div class="card-body">
            <form action="<?= route_to('ingressos_update', $ingresso['id']); ?>" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group mb-3">
                    <label for="id" class="mt-1">ID</label>
                    <input type="text" class="form-control" readonly id="id" name="id" placeholder="afafa"
                        value="<?= $ingresso['id'] ?>">
                </div>
                <div class="form-group mb-3">
                    <label for="cep" class="mt-1">CEP</label>
                    <input type="text" class="form-control" id="cep" name="cep" placeholder="Codigo aqui"
                        value="<?= $ingresso['cep'] ?>">
                </div>
                <div class="form-group mb-3">
                    <label for="logradouro" class="mt-1">Logradouro</label>
                    <input type="text" class="form-control" id="logradouro" name="logradouro"
                        placeholder="Somente Nome da Rua" value="<?= $ingresso['logradouro'] ?>">
                </div>
                <div class="form-group mb-3">
                    <label for="complemento" class="mt-1">Complemento</label>
                    <input type="text" class="form-control" id="complemento" name="complemento"
                        placeholder="Codigo aqui" value="<?= $ingresso['complemento'] ?>">
                </div>
                <div class="form-group mb-3">
                    <label for="bairro" class="mt-1">Bairro</label>
                    <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Somente Bairro"
                        value="<?= $ingresso['bairro'] ?>">
                </div>
                <div class="form-group mb-3">
                    <label for="codigo_rastreio" class="mt-1">Codigo Rastreio</label>
                    <input type="text" class="form-control" id="codigo_rastreio" name="codigo_rastreio"
                        placeholder="Só preencher quando souber" value="<?= $ingresso['codigo_rastreio'] ?>">
                </div>
                <button type="submit" class="btn btn-primary w-100 mt-3">Atualizar</button>
            </form>
        </div>
        <?php endif; ?>
    </div>
    <div class="container container-md">
        <h5 class="card-header text-center fw-bold my-3">Dados</h5>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    <?= $ingresso['nome_completo']?>
                </h5>
                <br>
                <p class="card-text">
                    CEP: <?= $ingresso['cep']?> <br>
                    <?= $ingresso['logradouro']?>, <?= $ingresso['complemento']?> <br>
                    <?= $ingresso['bairro']?>, <?= $ingresso['localidade']?> - <?= $ingresso['uf']?> <br>
                </p>
                <p class="card-text">
                    Ingresso em: <?= date('d-m-Y', strtotime($ingresso['data_de_ingresso']))?>
                </p>
                <p class="card-text">
                    Código de Rastreamento:
                    <strong>
                        <?= isset($ingresso['codigo_rastreio']) ? $ingresso['codigo_rastreio'] : "Aguardando Envio" ?>
                    </strong>
                    <br>
                    Status de Envio:
                    <strong>
                        <?php
                            // TESTES COMENTADOS
                            // isset($ingresso['detalhe_envio']) ? $ingresso['detalhe_envio'] : "Aguardando Envio" 
                            // date_default_timezone_set('America/Sao_Paulo');
                            // foreach($historico as $key => $value) {
                                //     // $data = ;
                                //     var_dump($historico[$key]['date']);
                                //     $new = date('d-m-Y H:i:s', strtotime($historico[$key]['date']));
                                //     var_dump($new);
                                //     // date('d-m-Y H:i:s', $data);
                                //     die;
                                // }
                            // var_dump($ingresso['codigo_rastreio']);
                            // $historico = isset($ingresso['codigo_rastreio']) ? $ingresso['codigo_rastreio'] : "Aguardando Envio";
                            // echo $historico;
                            // die;
                            
                            if (empty($ingresso['codigo_rastreio'])) {
                                echo "Aguardando Envio";
                            } else {
                                echo $ingresso['detalhe_envio'];

                                // EXIBIÇÃO DE HISTORICO
                                // $historico = TrackingService::getData($ingresso['codigo_rastreio']);
                                // // var_dump($historico);
                                // // Variável para armazenar o título encontrado
                                
                                // usort($historico, function ($a, $b) {
                                //     $partesDataHoraA = explode(' ', $a['date']);
                                //     // var_dump($partesDataHoraA);
                                //     // die;
                                //     $partesDataHoraB = explode(' ', $b['date']);
    
                                //     // Comparar as datas
                                //     $dataA = $partesDataHoraA[0];
                                //     $dataB = $partesDataHoraB[0];
                                //     if ($dataA != $dataB) {
                                //         return strtotime($dataA) - strtotime($dataB);
                                //     }
    
                                //     // Se as datas forem iguais, comparar os horários
                                //     $horaA = isset($partesDataHoraA[1]) ? $partesDataHoraA[1] : '';
                                //     $horaB = isset($partesDataHoraB[1]) ? $partesDataHoraB[1] : '';
                                //     if ($horaA != $horaB) {
                                //         return strtotime($horaA) - strtotime($horaB);
                                //     }
    
                                //     // Se as datas e horários forem iguais, mantenha a ordem original
                                //     return 0;
                                // });
    
                                // // if(!empty($historico)) {
                                // //     $ultimo = end($historico);
                                // //     echo $ultimo['originalTitle'];
                                // // }
    
                                // foreach($historico as $key => $value) {
                                //     echo "<p>- " . $historico[$key]['date'] . ": " . $historico[$key]['originalTitle'] . "</p>";
                                // }
                            }
                        ?>
                    </strong>
                </p>
                <a href="#" class="card-link">Enviar dados no grupo do WhatsApp</a>
                <!-- <a href="#" class="card-link">Another link</a> -->
            </div>
        </div>
    </div>

</main>

<?= $this->endSection() ?>

<?= $this->include('partials/footer') ?>