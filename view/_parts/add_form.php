<section class="container">
    <div class="row">
        <div class="col-6">
            <form action="?page=action-add-post" method="post" class="">
                <select class="form-select" name="user_id" id="">
                    <option value="" disabled>Selectionnez un user</option>
                    <?php

                    foreach ($users as $key => $user) {
                        echo "<option value='1'>" . $user['user_id'] . "</option>";
                    }

                    ?>
                </select>

                <div class="row d-flex justify-content-center">
                    <label for="limit_date">Veuillez saisir la date d'expiration :</label>
                    <input class="col-6 my-4" type="date" name="limit_date" id="">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Votre lien a raccourcir"
                            aria-label="Votre lien a raccourcir" aria-describedby="button-addon2" name="url_full"
                            id="url-full">
                        <input class="btn btn-primary" type="submit" value="Générer" id="button-addon2">


                    </div>

                </div>
            </form>
            <?php

            if (isset ($_GET['page']) && $_GET['page'] != 'home') {
                $url = getUrlByShortUrl($_GET['code']);
                // $url = getUrlByShortUrl($_GET['code']);
                ?>
                <span><strong>Voici votre lien raccourcie :</strong></span> <br>
                <div class="row">
                    <div class="d-grid gap-2 col-10">
                        <a class="btn btn-lg btn-primary" href="?page=url&code=<?= $url['url_short'] ?>"
                            id="texteACopier">https://qrfim.xyz/?page=url&code=
                            <?= $url['url_short'] ?>
                        </a>

                    </div>
                    <button class="col-2 btn btn-secondary" id="boutonCopie">Copier le texte</button>
                </div>
            <?php } ?>
        </div>
        <div class="col-6"></div>
    </div>
</section>