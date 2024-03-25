<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="/public/css/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">QrFim</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">à propos
                        </a>
                    </li>
                </ul>
                <div class="d-flex container-btn-account">
                    <?php if (isset($_SESSION['user'])) { ?>
                        <!-- Connecter -->
                        <span><?= $_SESSION['user']['firstname'] ?></span>
                        <a href="?page=action-logout"><button class="btn btn-outline-secondary text-light">Se déconnecter</button></a>

                    <?php } else { ?>

                        <!-- Deconnecter -->
                        <a href="?page=login"><button class="btn-account btn-login">Se connecter</button></a>
                        <a href="?page=register"><button class="btn-account btn-signin text-light">Créer un compte</button></a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </nav>