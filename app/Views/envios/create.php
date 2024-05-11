<?php
/**
 * @var CodeIgniter\View\View $this
*/
?>

<?= $this->extend('master') ?>

<?= $this->section('content') ?>

<?= $this->include('partials/navbar') ?>

<main class="my-3">
    <div class="container my-3">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header fw-bold">Formulário de Ingresso</div>
                    <div class="card-body my-3 p-3">
                        <form action="<?= route_to('ingressos_store'); ?>" method="POST">
                            <div class="form-group mb-3">
                                <label for="nome_completo"><strong>*</strong>Nome Completo:</label>
                                <input type="text" required class="form-control" id="nome_completo" name="nome_completo" placeholder="Nome Completo ajuda aos Correios">
                            </div>
                            <div class="form-group mb-3">
                                <label for="data_de_ingresso"><strong>*</strong>Data de Ingresso:</label>
                                <input type="date" required class="form-control" id="data_de_ingresso" name="data_de_ingresso">
                            </div>
                            <div class="form-group mb-3">
                                <label for="whatsapp">Telefone/WhatsApp:</label>
                                <input type="text" class="form-control" id="whatsapp" name="whatsapp" placeholder="DDD e número">
                            </div>
                            <div class="form-group mb-3">
                                <label for="cep">CEP:</label>
                                <input type="text" class="form-control" id="cep" name="cep" placeholder="Preencher somente números" maxlength="8">
                            </div>
                            <div class="form-group mb-3">
                                <label for="complemento">Complemento:</label>
                                <input type="text" class="form-control" id="complemento" name="complemento" placeholder="Número da casa e Ponto de Refêrencia">
                            </div>
                            <button type="submit" class="btn btn-primary w-100 mt-3">Registrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?= $this->endSection() ?>

<?= $this->include('partials/footer') ?>
