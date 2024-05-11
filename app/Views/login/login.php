<?php
/**
 * @var CodeIgniter\View\View $this
*/
?>

<?= $this->extend('master') ?>

<?php if(session()->has('error')): ?>
    <div class="container mt-3 login">
        <div class="alert alert-danger container-md" role="alert">
            <?php echo session()->getFlashdata('error'); ?>
        </div>
    </div>
<?php endif ?>

<?= $this->section('content') ?>

<main class="container container-md login my-3">
    <div class="border border-black p-3">
        <!-- <a href="<?php //url_to('sca.index') ?>" class="text-black"><i class="bi bi-arrow-return-left"></i></a> -->
        <div class="text-center">
            <!-- <img src="<?php //base_url('/assets/img/logoteste.png')?>" alt="logoteste" style="width: 300px;"> -->
            <?= img(['src' => '/assets/img/quarentena.png', 'class' => 'img-logo']) ?>
        </div>
        <h2 class="my-1">Login</h2>
        <form action="<?= url_to('users_signin') ?>" id="form-cadastro" method="post">
            <div class="formGroup mb-3">
                <input type="text" name="login" id="login" placeholder="Login"
                    class="form-control required" value="rclemon93">
                <span class="text text-danger"><?php echo session()->getFlashdata('errors')['login'] ?? '' ?></span>
            </div>
            <div class="formGroup mb-3">
                <input type="password" value="123" name="senha" id="senha" class="form-control" placeholder="Senha">
            </div>
            <div class="formGroup mb-3">
                <input type="submit" id="iSubmit" value="Entrar" class="btn btn-primary w-100">
            </div>
        </form>

    </div>
    <!-- <h3 class="text-center">IMPLEMENTAR LOGIN GOOGLE</h3> -->
</main>
<?= $this->endSection() ?>