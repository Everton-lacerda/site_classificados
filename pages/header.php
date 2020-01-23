<?php require 'config/database.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Classificados</title>
</head>

<body class="bg-light">
    <div class="wrapper ">

    <nav class="navbar navbar-expand-md bg-white text-dark p-3">
        <button class="navbar-toggler bg-white text-dark ml-auto" type="button" 
        data-toggle="collapse" data-target="#navbarToggler" 
        aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
            MENU
        </button>
        
        <div class="col-xl-12 col-lg-12 col-md-12 ml-auto">
            <div class="row">
                <div class="col-md-2">
                    <a class="navbar-brand text-dark" href="/classificados">MINHA LOGO</a>
                </div>
                <div class="col-md-7">
                    
                </div>
                <div class="col-md-3">
                    <div class="collapse navbar-collapse" id="navbarToggler">
                        <ul class="navbar-nav ml-auto">

                            <?php if(isset($_SESSION['cLogin']) && !empty($_SESSION['cLogin'])): ?>
                                <li class="nav-item">
                                    <a class="nav-link btn btn-navbar" href="meus-anuncios.php">Meus Anúncios </a>
                                </li>
                                <li class="nav-item dropdown ">
                                    <a class="nav-link  dropdown-toggle text-secondary text-profile ml-2" href="#" id="navbarDropdown" role="button" 
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Minha Conta
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#">Meu Perfil</a>
                                        <a class="dropdown-item" href="#">Chat</a>
                                        <a class="dropdown-item" href="sair.php">Sair</a>
                                    </div>
                                </li>
                            <?php else: ?>
                                <li class="nav-item">
                                    <a class="nav-link btn btn-navbar mr-3" href="cadastre-se.php"> Criar Conta </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link btn btn-navbar" href="login.php"> Login </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
