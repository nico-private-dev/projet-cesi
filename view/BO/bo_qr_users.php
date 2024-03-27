<link rel="stylesheet" href="/public/css/panel_admin.css">


<div class="container">
    <h2>Admin Panel
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


    <p>Bienvenue dans le panneau d'administration</p>

    <!-- Liste des utilisateurs -->
    <h3>Liste des utilisateurs</h3>
    <table>
        <tr>
            <th>Nom de Famille</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Admin</th>
            <th>Action</th>

        </tr>
        <?php foreach ($users as $key => $user) {
            ?>
            <tr>
                <td>
                    <?php echo $user['lastname']; ?>
                </td>
                <td>
                    <?php echo $user['firstname']; ?>
                </td>
                <td>
                    <?php echo $user['email']; ?>
                </td>
                <td>
                    <?php if ($user['is_admin'] === null) {
                        echo 'NON';
                    } else {
                        echo 'OUI';
                    }

                    ?>
                </td>
                <td>
                    <form action="?page=delete_user" method="POST">
                        <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                        <input type="submit" class="delete" value="Suppression"
                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce compte ?');">
                    </form>
                    <form action="?page=promote_admin" method="POST">
                        <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                        <input type="submit" class=" btn btn-success" value="Promouvoir Admin"
                            onclick="return confirm('Êtes-vous sûr de vouloir promouvoir ce compte ?');">
                    </form>
                </td>

            </tr>
        <?php }
        ?>
    </table>


</div>