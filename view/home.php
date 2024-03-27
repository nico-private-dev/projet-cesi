<div class="container d-flex justify-content-center my-5">
    <h1>Générer votre QR Code</h1>
</div>
<?php if (isset ($_SESSION['user'])) {
    require_once "./view/_parts/add_form.php";

} else { ?>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <h2>Vous n'etes pas connecter</h2>
        </div>
        <div class="row">
            <a href="?page=login"><button class="btn-account btn-login">Se connecter</button></a>
            <div class="col-6"></div>
            <a href="?page=create_account"><button class="btn-account btn-signin text-light">Créer un
                    compte</button></a>
            <div class="col-6"></div>
        </div>

    </div>
<?php } ?>
<?php

// require_once "./view/_parts/add_form.php";

// echo '<a href="?page=url">'.$short_url.'</a>';