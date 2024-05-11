<?php
/**
 * @var CodeIgniter\View\View $this
*/
?>

<?= $this->extend('master') ?>


<?= $this->section('content') ?>

<?= $this->include('partials/navbar') ?>

<main class="main container container-sm pb-5">
    <div class="m-1 p-1 text-start">

    </div>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <a href="<?= route_to('ingressos_create') ?>" class="btn btn-primary">Registrar Novo Envio</a>
            <h5>Envios</h5>
        </div>
        <?php 
            foreach($ingressos as $key => $value): 
        ?>
        <div class="card-body my-1">
            <h5 class="card-title">
                <strong class="me-1">
                    Nome:
                </strong>
                <?= $ingressos[$key]['nome_completo'] ?>
            </h5>
            <p class="card-text">
                Data de Ingresso:
                <strong><?= date('d/m/Y',strtotime($ingressos[$key]['data_de_ingresso'])) ?></strong>
            </p>
            <p class="card-text">
                Rastreamento:
                <strong>
                    <?php 
                            echo isset($ingressos[$key]['codigo_rastreio']) ? 
                                $ingressos[$key]['codigo_rastreio']
                                : 'A Enviar';
                        ?>
                </strong>
            </p>
            <p class="card-text">
                Status:
                <strong>
                    <?php 
                            echo isset($ingressos[$key]['detalhe_envio']) ? 
                                $ingressos[$key]['detalhe_envio'] 
                                : 'S/N';

                        ?>
                </strong>
            </p>
            <p class="card-text">
                Detino:
                <strong><?= isset($ingressos[$key]['localidade']) ? $ingressos[$key]['localidade'] : "Cidade" ?></strong>
                -
                <strong><?= isset($ingressos[$key]['uf']) ? $ingressos[$key]['uf'] : 'UF' ?></strong>
            </p>
            <div class="d-flex">
                <a href="<?= route_to('ingressos_show', $ingressos[$key]['id']) ?>" class="btn btn-primary me-3">Ver
                    detalhes</a>
                <form action="<?= url_to('ingressos_refresh', $ingressos[$key]['id']) ?>" method="post">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="codigo_rastreio" value="<?= $ingressos[$key]['codigo_rastreio'] ?>">
                    <input type="submit" value="Atualizar" class="btn btn-primary">
                </form>
            </div>
        </div>
        <?php endforeach; ?>

    </div>
</div>
<?php echo $pager->links('default', 'personalize_full'); ?>
</main>

<?= $this->endSection() ?>

<?= $this->include('partials/footer') ?>