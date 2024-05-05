<link rel="stylesheet" href="/public/css/panel_admin.css">

<div class="container">
    <h2 class="my-4">
        Bienvenue dans le panneau de gestion des URL
    </h2>

    <!-- Liste des utilisateurs -->
    <h3>Liste de vos URLS</h3>
    <table>
        <tr>
            <th>Nom</th>
            <th>Longue URL</th>
            <th>URL Raccourcie</th>
            <th>Date de Création</th>
            <th>QR Code</th>
            <th>Date d'Expiration</th>
            <th>Action</th>
        </tr>
        <?php

        foreach ($bo_urls as $key => $url) {
            // FIXME lol 
            // au lieu de charger toute les urls et de n'afficher que celle de l'utilisateur, on va plutôt aller récuperer en amont que celle de l'utilisateur depuis le SQL
            // if ($url['user_id'] == $_SESSION['user']['id']) {
        ?>
            <tr>
                <td>
                    <?php if (isset($url['url_short'])) {
                        $id = getIdFromShortUrl($url['url_short']);
                        $nameRes = getNameById($id['id']);
                        echo $nameRes['name'];
                    } ?>
                </td>
                <td>
                    <?php echo $url['url_full']; ?>
                </td>
                <td class="d-flex justify-content-between align-items-center">
                    <!-- TODO add copy/paste -->
                    <span><?php echo "https://".$_SERVER['SERVER_NAME'] . '/?page=url&&code=' . $url['url_short']; ?></span>
                    <span><button class="btn btn-primary">📜</button></span>
                </td>
                <td>
                    <?php echo $url['created_at']; ?>
                </td>
                <td>
                    <?php if (isset($url['url_short'])) {
                        $id = getIdFromShortUrl($url['url_short']);
                        $nameRes = getNameById($id['id']);
                        echo '<a href="../public/img/qrcode_generate/' . $nameRes['name'] . '.png"><img src="../public/img/qrcode_generate/' . $nameRes['name'] . '.png" alt="QR Code" class="w-50"></a>';
                    } ?>

                </td>
                <td>
                    <?php if ($url['limit_date'] === null) {
                        echo 'Lien infini';
                    } else {
                        echo $url['limit_date'];
                    }

                    ?>
                </td>
                <td>
                    <form action="?page=delete_url" method="POST">
                        <input type="hidden" name="url_id" value="<?php echo $url['id']; ?>">
                        <input type="submit" class="delete" value="Suppression" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette URL ?');">
                    </form>

                </td>

            </tr>
        <?php
        }
        ?>
    </table>


</div>