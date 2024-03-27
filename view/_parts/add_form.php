<section class="container">
    <div class="row">
        <div class="col-6">
            <form action="?page=action-add-post" method="post" class="">
                <input type="hidden" name="user_id" value="<?= $_SESSION['user']['id']; ?>" id="">


                <div class="row d-flex justify-content-center">
                    <label for="limit_date">Veuillez saisir la date d'expiration :</label>
                    <input class="col-6 mb-4 form-control col-11" type="date" name="limit_date" id="">
                    <label for="name">Veuillez saisir le nom de votre url :</label>
                    <input class="col-11  mb-4 form-control" type="text" name="name" id="" placeholder="Le nom de votre URL">
                    <label for="name">Veuillez saisir l'url à raccourcir :</label>

                    <div class="input-group mb-3 ">
                        <input type="text" class="form-control" placeholder="Votre lien a raccourcir"
                            aria-label="Votre lien a raccourcir" aria-describedby="button-addon2" name="url_full"
                            id="url-full">
                        <input class="btn btn-primary" type="submit" value="Générer" id="button-addon2">


                    </div>

                </div>
            </form>
            <?php
            if (isset ($_GET['code'])) {
                $url = getUrlByShortUrl($_GET['code']);
                ?>
                <span><strong>Voici votre lien raccourcie :</strong></span> <br>
                <div class="row">
                    <div class="d-grid gap-2 col-10">
                        <a class="btn btn-lg btn-primary" href="?page=url&code=<?= $url['url_short'] ?>"
                            id="texteACopier">/?page=url&code=
                            <?= $url['url_short'] ?>
                        </a>

                    </div>
                    <button class="col-2 btn btn-secondary" id="boutonCopie">Copier le texte</button>
                </div>
            <?php } ?>
        </div>
        <div class="col-6 text-center">
            <h2>QR CODE</h2>

            <img src="../public/img/qrcode_generate/<?php $name ?>.png" alt="">
            <?php
            if (isset ($_GET['code'])) {
                $id = getIdFromShortUrl($_GET['code']);
                $nameRes = getNameById($id['id']);
                echo '<img src="../public/img/qrcode_generate/' . $nameRes['name'] . '.png" alt="QR Code">';
            }
            ?>
        </div>
    </div>
</section>