<?php
if (isset($_POST) && isset($_POST['login']) && isset($_POST['password'])) {

    $login = cleanStr($_POST['login']);
    $password = cleanStr($_POST['password']);

    $user_id = login($login, $password);

    // var_dump($_POST);
    if ($user_id) {
        try {
            $user = getUserById($user_id);

            
            $_SESSION['user']['firstname'] = $user['firstname'];
            $_SESSION['user']['id'] = $user['id'];
            $_SESSION['user']['is_admin'] = $user['is_admin']?true:false;

            // var_dump($_SESSION);
            addFlash("success", "Bonjour " . $_SESSION['user']['firstname']);
            header("location:?page=home");
        } catch (\Throwable $th) {
            addFlash("danger", "Erreur, " . $th->getMessage());
            header("location:?page=login");
        }

    } else {
        addFlash("danger", "Erreur, vérifiez votre saisie");
        header("location:?page=login");    
    }

}