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
        <a href="<?= route_to('users_create') ?>" class="btn btn-primary">Criar Usuário</a>
    </div>
    <div class="cards">
        <?php foreach($users as $user): ?>
        <div class="card w-100 mx-auto mt-3">
            <div class="card-body">
                <h5 class="card-title"><?= $user->nome ?></h5>
                <p class="card-text">Login: <?= $user->login ?></p>
                <div class="d-flex">
                    <a href="<?= route_to('users_show', $user->id) ?>" class="me-1 btn btn-primary">Editar</a>
                    <form action="<?= route_to('users_delete', $user->id) ?>" method="POST"
                        onsubmit="return confirm('Tem certeza que deseja excluir este usuário?');">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="ms-1 btn btn-danger">Excluir</button>
                    </form>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</main>

<?= $this->endSection() ?>

<?= $this->include('partials/footer') ?>