<!-- HTML -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

</head>

<body>
    <!--
    FIXME semeble pas utilser à supprimer je pense

    -->
    <div class="container">
        <h2>Admin Panel - Niveau :
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


        <p>Bienvenue dans le panneau d'administration,
            <?php// echo htmlspecialchars($user['pseudo_discord']); ?>!
        </p>

        <!-- Liste des utilisateurs -->
        <h3>Liste des utilisateurs</h3>
        <table>
            <tr>
                <th>ID Discord</th>
                <th>Pseudo Discord</th>
                <th>Email</th>
                <th>Recruteur</th>
                <th>Recruteur CIC</th>
                <th>Recruteur COSSIM</th>
                <th>Recruteur ARM</th>
                <th>Gestionnaire</th>
                <th>Admin</th>
                <th>Bannis</th>
                <?php // if ($current_user_is_admin || $current_user_is_manager): ?>
                    <th>Action</th>
                <?php //  endif; ?>

            </tr>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td>
                        <?php echo htmlspecialchars($user['id_discord']); ?>
                    </td>
                    <td>
                        <?php echo htmlspecialchars($user['pseudo_discord']); ?>
                    </td>
                    <td>
                        <?php if ($current_user_is_admin || $current_user_is_manager): ?>
                            <?php echo htmlspecialchars($user['mail']); ?>
                        <?php else: ?>
                            <span class="censured">Adresse e-mail censurée</span>
                        <?php endif; ?>
                    </td>

                    <td>
                        <?php echo ($user['recruteur'] == 1) ? 'oui' : 'non'; ?>
                    </td>
                    <td>
                        <?php echo ($user['recruteur_cic'] == 1) ? 'oui' : 'non'; ?>
                    </td>
                    <td>
                        <?php echo ($user['recruteur_cossim'] == 1) ? 'oui' : 'non'; ?>
                    </td>
                    <td>
                        <?php echo ($user['recruteur_arm'] == 1) ? 'oui' : 'non'; ?>
                    </td>
                    <td>
                        <?php echo ($user['gestion'] == 1) ? 'oui' : 'non'; ?>
                    </td>
                    <td>
                        <?php echo ($user['admin'] == 1) ? 'oui' : 'non'; ?>
                    </td>
                    <td>
                        <?php echo ($user['ban'] == 1) ? 'oui' : 'non'; ?>
                    </td>
                    <td>
                        <div class="container-button">
                            <!--   Bouton pour supprimer le compte utilisateur-->

                            <?php if ($current_user_is_admin || $current_user_is_manager): ?>

                                <?php if ($user['id_discord'] !== $user_id): ?>

                                    <form action="delete_user.php" method="POST">
                                        <input type="hidden" name="user_id" value="<?php echo $user['id_discord']; ?>">
                                        <input type="submit" class="delete" value="Suppression"
                                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce compte ?');">
                                    </form>

                                <?php else: ?>

                                    <form action="delete_user.php" method="POST">
                                        <input type="hidden" name="user_id" value="<?php echo $user['id_discord']; ?>">
                                        <input type="submit" class="delete" value="Suppression" onclick="return false;" disabled>
                                    </form>
                                <?php endif; ?>
                            <?php endif; ?>

                            <!--   Bouton pour promouvoir/destituer recruteur le compte utilisateur-->
                            <!--                        Recruteur avec jeu-->

                            <?php if ($current_user_is_admin): ?>
                                <?php if (!$user['recruteur']): ?>
                                    <!-- Afficher le bouton "Promouvoir" seulement pour les administrateurs si l'utilisateur n'est pas recruteur -->
                                    <form action="promote_recruteur_user.php" method="POST">
                                        <input type="hidden" name="user_id" value="<?php echo $user['id_discord']; ?>">
                                        <input type="hidden" name="action" value="promote"> <!-- Action pour promouvoir -->
                                        <input type="submit" class="promote" value="✔ Recruteur"
                                            onclick="return confirm('Êtes-vous sûr de vouloir promouvoir ce compte ?');">
                                    </form>
                                <?php else: ?>
                                    <!-- Si l'utilisateur est déjà recruteur, afficher le bouton "Rétrograder" pour les administrateurs -->
                                    <?php if ($user['id_discord'] !== $user_id): ?>
                                        <form action="promote_recruteur_user.php" method="POST">
                                            <input type="hidden" name="user_id" value="<?php echo $user['id_discord']; ?>">
                                            <input type="hidden" name="action" value="demote">
                                            <!-- Action pour rétrograder -->
                                            <input type="submit" class="demote" value="✖ Recruteur"
                                                onclick="return confirm('Êtes-vous sûr de vouloir rétrograder ce compte ?');">
                                        </form>
                                    <?php else: ?>
                                        <!-- Si l'utilisateur est lui-même, afficher le bouton "Rétrograder" désactivé -->
                                        <form action="#" method="POST">
                                            <input type="submit" class="demote" value="✖ Recruteur" onclick="return false;" disabled>
                                        </form>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php elseif ($current_user_is_manager): ?>
                                <!-- Si l'utilisateur est manager, afficher le bouton "Rétrograder" -->
                                <?php if ($user['recruteur'] && $user['id_discord'] !== $user_id): ?>
                                    <!-- Si l'utilisateur est recruteur et différent de l'utilisateur actuel, afficher le bouton "Rétrograder" pour les managers -->
                                    <form action="promote_recruteur_user.php" method="POST">
                                        <input type="hidden" name="user_id" value="<?php echo $user['id_discord']; ?>">
                                        <input type="hidden" name="action" value="demote"> <!-- Action pour rétrograder -->
                                        <input type="submit" class="demote" value="✖ Recruteur"
                                            onclick="return confirm('Êtes-vous sûr de vouloir rétrograder ce compte ?');">
                                    </form>
                                <?php endif; ?>
                            <?php endif; ?>


                            <!--                        Recruteur CIC-->

                            <?php if ($current_user_is_admin): ?>
                                <?php if (!$user['recruteur_cic']): ?>
                                    <!-- Afficher le bouton "Promouvoir" seulement pour les administrateurs si l'utilisateur n'est pas recruteur -->
                                    <form action="promote_recruteur_user_cic.php" method="POST">
                                        <input type="hidden" name="user_id" value="<?php echo $user['id_discord']; ?>">
                                        <input type="hidden" name="action" value="promote"> <!-- Action pour promouvoir -->
                                        <input type="submit" class="promote" value="✔ CIC"
                                            onclick="return confirm('Êtes-vous sûr de vouloir promouvoir ce compte ?');">
                                    </form>
                                <?php else: ?>
                                    <!-- Si l'utilisateur est déjà recruteur, afficher le bouton "Rétrograder" pour les administrateurs -->
                                    <?php if ($user['id_discord'] !== $user_id): ?>
                                        <form action="promote_recruteur_user_cic.php" method="POST">
                                            <input type="hidden" name="user_id" value="<?php echo $user['id_discord']; ?>">
                                            <input type="hidden" name="action" value="demote">
                                            <!-- Action pour rétrograder -->
                                            <input type="submit" class="demote" value="✖  CIC"
                                                onclick="return confirm('Êtes-vous sûr de vouloir rétrograder ce compte ?');">
                                        </form>
                                    <?php else: ?>
                                        <!-- Si l'utilisateur est lui-même, afficher le bouton "Rétrograder" désactivé -->
                                        <form action="#" method="POST">
                                            <input type="submit" class="demote" value="✖ CIC" onclick="return false;" disabled>
                                        </form>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php elseif ($current_user_is_manager): ?>
                                <!-- Si l'utilisateur est manager, afficher le bouton "Rétrograder" -->
                                <?php if ($user['recruteur_cic'] && $user['id_discord'] !== $user_id): ?>
                                    <!-- Si l'utilisateur est recruteur et différent de l'utilisateur actuel, afficher le bouton "Rétrograder" pour les managers -->
                                    <form action="promote_recruteur_user_cic.php" method="POST">
                                        <input type="hidden" name="user_id" value="<?php echo $user['id_discord']; ?>">
                                        <input type="hidden" name="action" value="demote"> <!-- Action pour rétrograder -->
                                        <input type="submit" class="demote" value="✖ CIC"
                                            onclick="return confirm('Êtes-vous sûr de vouloir rétrograder ce compte ?');">
                                    </form>
                                <?php endif; ?>
                            <?php endif; ?>


                            <!--                        Recruteur COSSIM-->

                            <?php if ($current_user_is_admin): ?>
                                <?php if (!$user['recruteur_cossim']): ?>
                                    <!-- Afficher le bouton "Promouvoir" seulement pour les administrateurs si l'utilisateur n'est pas recruteur -->
                                    <form action="promote_recruteur_user_cossim.php" method="POST">
                                        <input type="hidden" name="user_id" value="<?php echo $user['id_discord']; ?>">
                                        <input type="hidden" name="action" value="promote"> <!-- Action pour promouvoir -->
                                        <input type="submit" class="promote" value="✔ COSSIM"
                                            onclick="return confirm('Êtes-vous sûr de vouloir promouvoir ce compte ?');">
                                    </form>
                                <?php else: ?>
                                    <!-- Si l'utilisateur est déjà recruteur, afficher le bouton "Rétrograder" pour les administrateurs -->
                                    <?php if ($user['id_discord'] !== $user_id): ?>
                                        <form action="promote_recruteur_user_cossim.php" method="POST">
                                            <input type="hidden" name="user_id" value="<?php echo $user['id_discord']; ?>">
                                            <input type="hidden" name="action" value="demote">
                                            <!-- Action pour rétrograder -->
                                            <input type="submit" class="demote" value="✖ COSSIM"
                                                onclick="return confirm('Êtes-vous sûr de vouloir rétrograder ce compte ?');">
                                        </form>
                                    <?php else: ?>
                                        <!-- Si l'utilisateur est lui-même, afficher le bouton "Rétrograder" désactivé -->
                                        <form action="#" method="POST">
                                            <input type="submit" class="demote" value="✖ COSSIM" onclick="return false;" disabled>
                                        </form>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php elseif ($current_user_is_manager): ?>
                                <!-- Si l'utilisateur est manager, afficher le bouton "Rétrograder" -->
                                <?php if ($user['recruteur_cic'] && $user['id_discord'] !== $user_id): ?>
                                    <!-- Si l'utilisateur est recruteur et différent de l'utilisateur actuel, afficher le bouton "Rétrograder" pour les managers -->
                                    <form action="promote_recruteur_user_cossim.php" method="POST">
                                        <input type="hidden" name="user_id" value="<?php echo $user['id_discord']; ?>">
                                        <input type="hidden" name="action" value="demote"> <!-- Action pour rétrograder -->
                                        <input type="submit" class="demote" value="✖ COSSIM"
                                            onclick="return confirm('Êtes-vous sûr de vouloir rétrograder ce compte ?');">
                                    </form>
                                <?php endif; ?>
                            <?php endif; ?>


                            <!--                        Recruteur ARM-->

                            <?php if ($current_user_is_admin): ?>
                                <?php if (!$user['recruteur_arm']): ?>
                                    <!-- Afficher le bouton "Promouvoir" seulement pour les administrateurs si l'utilisateur n'est pas recruteur -->
                                    <form action="promote_recruteur_user_arm.php" method="POST">
                                        <input type="hidden" name="user_id" value="<?php echo $user['id_discord']; ?>">
                                        <input type="hidden" name="action" value="promote"> <!-- Action pour promouvoir -->
                                        <input type="submit" class="promote" value="✔ ARM"
                                            onclick="return confirm('Êtes-vous sûr de vouloir promouvoir ce compte ?');">
                                    </form>
                                <?php else: ?>
                                    <!-- Si l'utilisateur est déjà recruteur, afficher le bouton "Rétrograder" pour les administrateurs -->
                                    <?php if ($user['id_discord'] !== $user_id): ?>
                                        <form action="promote_recruteur_user_arm.php" method="POST">
                                            <input type="hidden" name="user_id" value="<?php echo $user['id_discord']; ?>">
                                            <input type="hidden" name="action" value="demote">
                                            <!-- Action pour rétrograder -->
                                            <input type="submit" class="demote" value="✖ ARM"
                                                onclick="return confirm('Êtes-vous sûr de vouloir rétrograder ce compte ?');">
                                        </form>
                                    <?php else: ?>
                                        <!-- Si l'utilisateur est lui-même, afficher le bouton "Rétrograder" désactivé -->
                                        <form action="#" method="POST">
                                            <input type="submit" class="demote" value="✖ ARM" onclick="return false;" disabled>
                                        </form>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php elseif ($current_user_is_manager): ?>
                                <!-- Si l'utilisateur est manager, afficher le bouton "Rétrograder" -->
                                <?php if ($user['recruteur_cic'] && $user['id_discord'] !== $user_id): ?>
                                    <!-- Si l'utilisateur est recruteur et différent de l'utilisateur actuel, afficher le bouton "Rétrograder" pour les managers -->
                                    <form action="promote_recruteur_user_arm.php" method="POST">
                                        <input type="hidden" name="user_id" value="<?php echo $user['id_discord']; ?>">
                                        <input type="hidden" name="action" value="demote"> <!-- Action pour rétrograder -->
                                        <input type="submit" class="demote" value="✖ ARM"
                                            onclick="return confirm('Êtes-vous sûr de vouloir rétrograder ce compte ?');">
                                    </form>
                                <?php endif; ?>
                            <?php endif; ?>


                            <!--   Bouton pour promouvoir/destituer gestionnaire le compte utilisateur-->

                            <?php if ($current_user_is_admin): ?>
                                <?php if (!$user['gestion']): ?>
                                    <!-- Si l'utilisateur n'est pas gestionnaire, afficher le bouton "Promouvoir" -->
                                    <form action="promote_gestion_user.php" method="POST">
                                        <input type="hidden" name="user_id" value="<?php echo $user['id_discord']; ?>">
                                        <input type="hidden" name="action" value="promote"> <!-- Action pour promouvoir -->
                                        <input type="submit" class="promote" value="✔ Gestion"
                                            onclick="return confirm('Êtes-vous sûr de vouloir promouvoir ce compte ?');">
                                    </form>
                                <?php else: ?>
                                    <!-- Si l'utilisateur est gestionnaire, afficher le bouton "Rétrograder" -->
                                    <?php if ($user['id_discord'] !== $user_id): ?>
                                        <form action="promote_gestion_user.php" method="POST">
                                            <input type="hidden" name="user_id" value="<?php echo $user['id_discord']; ?>">
                                            <input type="hidden" name="action" value="demote">
                                            <!-- Action pour rétrograder -->
                                            <input type="submit" class="demote" value="✖ Gestion"
                                                onclick="return confirm('Êtes-vous sûr de vouloir rétrograder ce compte ?');">
                                        </form>
                                    <?php else: ?>
                                        <!-- Si l'utilisateur est l'utilisateur connecté, afficher le bouton "Rétrograder" mais désactivé -->
                                        <form action="#" method="POST">
                                            <input type="submit" class="demote" value="✖ Gestion" onclick="return false;" disabled>
                                        </form>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endif; ?>


                            <!--   Bouton pour promouvoir/destituer admin le compte utilisateur-->

                            <?php if ($current_user_is_admin): ?>
                                <?php if (!$user['admin']): ?>
                                    <!-- Si l'utilisateur n'est pas administrateur, afficher le bouton "Promouvoir" -->
                                    <form action="promote_admin_user.php" method="POST">
                                        <input type="hidden" name="user_id" value="<?php echo $user['id_discord']; ?>">
                                        <input type="hidden" name="action" value="promote">
                                        <input type="submit" class="promote" value="✔ Admin"
                                            onclick="return confirm('Êtes-vous sûr de vouloir promouvoir ce compte ?');">
                                    </form>
                                <?php else: ?>
                                    <!-- Si l'utilisateur est administrateur, afficher le bouton "Rétrograder" -->
                                    <?php if ($user['id_discord'] !== $user_id): ?>
                                        <form action="promote_admin_user.php" method="POST">
                                            <input type="hidden" name="user_id" value="<?php echo $user['id_discord']; ?>">
                                            <input type="hidden" name="action" value="demote">
                                            <input type="submit" class="demote" value="✖ Admin"
                                                onclick="return confirm('Êtes-vous sûr de vouloir rétrograder ce compte ?');">
                                        </form>
                                    <?php else: ?>
                                        <!-- Si l'utilisateur est l'utilisateur connecté, afficher le bouton "Rétrograder" mais désactivé -->
                                        <form action="#" method="POST">
                                            <input type="submit" class="demote" value="✖ Admin" onclick="return false;" disabled>
                                        </form>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endif; ?>


                            <!--  Bouton pour bannir le compte utilisateur-->

                            <?php if ($current_user_is_admin || $current_user_is_manager): ?>
                                <?php if (!$user['ban']): ?>
                                    <!-- Si l'utilisateur n'est pas banni, afficher le bouton "Bannir" -->
                                    <?php if ($user['id_discord'] !== $user_id): ?>
                                        <form action="ban_user.php" method="POST">
                                            <input type="hidden" name="user_id" value="<?php echo $user['id_discord']; ?>">
                                            <input type="hidden" name="action" value="ban"> <!-- Action pour bannir -->
                                            <input type="submit" class="ban" value="Bannir"
                                                onclick="return confirm('Êtes-vous sûr de vouloir bannir cet utilisateur ?');">
                                        </form>
                                    <?php else: ?>
                                        <form action="#" method="POST">
                                            <input type="submit" class="ban" value="Bannir" onclick="return false;" disabled>
                                        </form>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <!-- Si l'utilisateur est banni, afficher le bouton "Débannir" -->
                                    <form action="ban_user.php" method="POST">
                                        <input type="hidden" name="user_id" value="<?php echo $user['id_discord']; ?>">
                                        <input type="hidden" name="action" value="unban"> <!-- Action pour débannir -->
                                        <input type="submit" class="ban" value="Débannir"
                                            onclick="return confirm('Êtes-vous sûr de vouloir débannir cet utilisateur ?');">
                                    </form>
                                <?php endif; ?>
                            <?php endif; ?>


                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>

        </table>

        <br>
        <p><a class="btn" href="logout.php">Se déconnecter</a></p>
    </div>
</body>

</html>