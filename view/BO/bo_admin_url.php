<link rel="stylesheet" href="/public/css/panel_admin.css">


<div class="container">
<h2>Admin Panel
       
    </h2>


    <p>Bienvenue dans le panneau d'administration des URL</p>

    
        
    </h2>




    <!-- Liste des utilisateurs -->
    <h3>Liste des URLS</h3>
    <table>
        <tr>
            <th>Nom</th>
            <th>Longue URL</th>
            <th>URL Raccourcie</th>
            <th>Date de Création</th>
            <th>Date d'Expiration</th>
            <th>QR CODE</th>
            <th>Action</th>

        </tr>
        <?php
        // foreach ($user_id as $key => $_SESSION['user_id']) {
        


        foreach ($bo_urls as $key => $url) {


            ?>
            <tr>
                <td>
                <?php if (isset ($url['url_short'])) {
                            $id = getIdFromShortUrl($url['url_short']);
                            $nameRes = getNameById($id['id']);
                            echo $nameRes['name'];
                        } ?>
                </td>
                <td>
                    <?php echo $url['url_full']; ?>
                </td>
                <td>
                    <?php echo '/?page=url&&code=' . $url['url_short']; ?>
                </td>
                <td>
                    <?php echo $url['created_at']; ?>
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
                    <?php if (isset ($url['url_short'])) {
                        $id = getIdFromShortUrl($url['url_short']);
                        $nameRes = getNameById($id['id']);
                        echo '<a href="../public/img/qrcode_generate/'. $nameRes['name'] . '.png"><img src="../public/img/qrcode_generate/' . $nameRes['name'] . '.png" alt="QR Code" class="w-50"></a>';
                    } ?>

                </td>
                <td>
                    <form action="?page=delete_url" method="POST">
                        <input type="hidden" name="url_id" value="<?php echo $url['id']; ?>">
                        <input type="submit" class="delete" value="Suppression"
                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette URL ?');">
                    </form>

                </td>

            </tr>
        <?php }


        ?>
    </table>


</div>