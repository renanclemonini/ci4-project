<?php
/**
 * @var CodeIgniter\View\View $this
*/
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>QuarenteNA Project</title>
    <style>
    body {
        box-sizing: border-box;
    }

    main {
        padding-bottom: 0px;
    }

    .contato>a:hover {
        text-decoration: underline;
    }

    .img-logo {
        width: 300px;
    }

    .logo {
        width: 100px;
    }

    .coluna {
        display: none;
    }

    @media only screen and (min-width: 767px) {
        .login {
            width: 500px;
            margin: auto;
        }

        .main {
            width: 767px;
            margin: auto;
            /* border: 1px solid black; */
        }

        .coluna {
            display: block;
        }
    }
    </style>
</head>

<body>
    <?= $this->renderSection('content') ?>

    <?= $this->renderSection('footer') ?>
</body>

</html>