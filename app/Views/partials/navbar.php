<header>
    <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
        <div class="container-sm">
            <!-- <img src="#" alt="logo"> -->
            <nav class="navbar navbar-light">
                <a class="navbar-brand" href="<?= url_to('ingressos_index') ?>">
                    <!-- <img src="/assets/img/quarentena.png" width="30" height="30" alt=""> -->
                    Envios
                </a>
            </nav>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="<?= route_to('ingressos_index') ?>">Envios</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?= route_to('users_index') ?>">Usuários</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= url_to('users_login') ?>">Sair</a>
                    </li>
                </ul>
                <span class="navbar-text">
                    Grupo QuarenteNA
                </span>
            </div>
        </div>
    </nav>
</header>