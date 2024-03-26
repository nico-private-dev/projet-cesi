<link rel="stylesheet" href="/public/css/panel_admin.css">


<div class="container">
    <h2 class="my-4">Bienvenue dans le panneau de gestion des URL
        <?php
        // if ($current_user_is_admin) {
        //     echo "<span class='admin'> Admin </span>";
        // } elseif ($current_user_is_manager) {
        //     echo "<span class='manager'> Gestionnaire </span>";
        // } else {
        //     echo "<span class='recruteur'> Recruteur </span>";
        // }
        ?>
    </h2>


   

    <!-- Liste des utilisateurs -->
    <h3>Liste de vos URLS</h3>
    <table>
        <tr>
            <th>ID</th>
            <th>Longue URL</th>
            <th>URL Raccourcie</th>
            <th>Date de Création</th>
            <th>Date d'Expiration</th>
            <th>Action</th>

        </tr>
        <?php
        // foreach ($user_id as $key => $_SESSION['user_id']) {
        


        foreach ($bo_urls as $key => $url) {
           

                ?>
                <tr>
                    <td>
                        <?php echo $url['id']; ?>
                    </td>
                    <td>
                        <?php echo $url['url_full']; ?>
                    </td>
                    <td>
                        <?php echo 'http://qrfim.xyz/?page=url&&code=' . $url['url_short']; ?>
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