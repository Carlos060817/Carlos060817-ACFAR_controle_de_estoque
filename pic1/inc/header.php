<!doctype html>
<html lang="pt-br">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo BASEURL; ?>css/estile.css">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>fonts/css/fontawesome.css">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>node_modules/bootstrap/compiler/bootstrap.css">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>node_modules/fonts/css/fontawesome.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="icon" type="image/jpg" href="<?php echo BASEURL; ?>img/logopic.jpg">
    <title>Cadastrar</title>
    <?php
    if (!isset($_SESSION['tipo_acesso'])) {
        header('Location: ' . BASEURL . 'login');
    }
    ?>


</head>
<body>

<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-gradient-primary">
        <div class="container">
            <a href="<?php echo BASEURL; ?>vendedor" class="navbar-brand logo">
                <img alt="Logo Empresa" title="Home" src="<?php echo BASEURL; ?>img/logopic.jpg">
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">

                    <!-- Aqui vai os menus-->
                  <?php

                    //echo $_SESSION['tipo_acesso'] ;
                    //este valor virá da tla de login quando a pessoa realizar o login
                    //neste caso estou atribuindo 0 para poder testar
                    //$_SESSION['tipo_acesso'] = 0;

                    if ($_SESSION['tipo_acesso'] == 0) {
                        include_once ABSPATH . 'inc/menuAcfar.php';
                    } else
                        if ($_SESSION['tipo_acesso'] == 1) {
                            include_once ABSPATH . 'inc/menuEmpresa.php';
                        } else
                            if ($_SESSION['tipo_acesso'] == 2) {
                                include_once ABSPATH . 'inc/menuVendedor.php';
                            }

                    ?>

                </ul>

                <ul class="navbar-nav flex-row ml-md-auto d-none d-md-flex">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo $_SESSION['usuario'] ?>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?php echo BASEURL; ?>login">Sair</a>
                        </div>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
</header>


