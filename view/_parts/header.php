<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="/public/css/style.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="?page=home">QrFim</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01"
                aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">à propos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="?page=bo_url">Mes URLS
                        </a>
                    </li>
                    <?php
                    // var_dump($_SESSION);
                    // if ($_SESSION['user']['is_admin'] == 1) {    ?>
                        
                   
                    <!-- <li class="nav-item">
                        <a class="nav-link active" href="#">Panel Admin
                        </a>
                    </li> -->
                    <?php // } ?>
                </ul>
                <div class="d-flex container-btn-account">
                    <?php if (isset ($_SESSION['user'])) { ?>
                        <!-- Connecter -->
                        <span>
                            <?= $_SESSION['user']['firstname'] ?>
                        </span>
                        <a href="?page=action-logout"><button class="btn btn-outline-secondary text-light">Se
                                déconnecter</button></a>

                    <?php } else { ?>

                        <!-- Deconnecter -->
                        <a href="?page=login"><button class="btn-account btn-login">Se connecter</button></a>
                        <a href="?page=register"><button class="btn-account btn-signin text-light">Créer un compte</button></a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </nav>
    <?php
    if (isset ($_SESSION['flashes']) && $_SESSION['flashes'] != null) {


        for ($i = 0; $i < count($_SESSION['flashes']); $i++) {
            echo
                '
  <div class="alert alert-dismissible alert-' . $_SESSION['flashes'][$i]['type'] . '">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    
    <p class="mb-0">' . $_SESSION['flashes'][$i]['message'] . '</p>
  </div>
  
  ';

            remFlash();
        }
    }
    ?>