<?php
/**
 * @var CodeIgniter\View\View $this
*/
?>

<?= $this->extend('master') ?>


<?= $this->section('content') ?>

<?= $this->include('partials/navbar') ?>

<main class="container">
    <div class="container my-3">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Editando Cadastro <?= $user->id ?></div>
                    <div class="card-body">
                        <!-- Formulário -->
                        <form action="<?= route_to('users_update', $user->id) ?>" method="post">
                            <input type="hidden" name="_method" value="PUT">
                            <!-- Campo Nome -->
                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome</label>
                                <input type="text" value="<?= $user->nome ?>" class="form-control" id="nome"
                                    name="nome" required>
                            </div>
                            <!-- Campo Login -->
                            <div class="mb-3">
                                <label for="login" class="form-label">Login</label>
                                <input type="text" value="<?= $user->login ?>" class="form-control" id="login"
                                    name="login" required>
                            </div>
                            <!-- Campo Senha -->
                            <div class="mb-3">
                                <label for="senha" class="form-label">Senha</label>
                                <input type="password" class="form-control" id="senha" name="senha"
                                    value="<?= $user->senha ?>">
                            </div>
                            <!-- Botão de Envio -->
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </form>
                        <!-- Fim do Formulário -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?= $this->endSection() ?>

<?= $this->include('partials/footer') ?>