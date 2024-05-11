<?php
/**
 * @var CodeIgniter\View\View $this
*/
?>
<?= $this->extend('master') ?>

<?= $this->section('footer') ?>

<footer class="text-center py-3" style="border-top: 2px solid black;">
    <h3 class="text-center contato">
        Desenvolvido por Renan Clemonini
        <br>
        <a  target="_blank" 
            href="https://wa.me/message/P5K54XCGJQB3B1" 
            class="text-decoration-none text-decoration-underline-hover"
            style="color: black;">
            <i class="bi bi-whatsapp"></i> +55 71 99633-3313
        </a>
    </h3>
</footer>
<?= $this->endSection() ?>
