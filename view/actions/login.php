<?php
// var_dump($password);
if (isset($_POST) && isset($_POST['login']) && isset($_POST['password'])) {

    $login = cleanStr($_POST['login']);
    $password = cleanStr($_POST['password']);

    $user = login_with_hash($login);

    if($user){
        if(password_verify($password, $user['password'])){
            echo "OK";
            $_SESSION['user']['id'] = $user['id'];
            $_SESSION['user']['firstname'] = $user['firstname'];
            $_SESSION['user']['lastname'] = $user['lastname'];
            $_SESSION['user']['email'] = $user['email'];
            $_SESSION['user']['is_admin'] = $user['is_admin'] ? true : false;
            addFlash("success", "Bonjour " . $_SESSION['user']['firstname']);
            header("location:?page=home");
        } else {
            addFlash("danger", "Erreur, vérifiez votre saisie");
            header("location:?page=login");
        }

    } else {
        addFlash("danger", "Erreur, vérifiez votre saisie");
        header("location:?page=login");
    }
    /*
    if ($user_id) {
        try {
            $user = getUserById($user_id);

            $_SESSION['user']['id'] = $user['id'];
            $_SESSION['user']['firstname'] = $user['firstname'];
            $_SESSION['user']['email'] = $user['email'];
            $_SESSION['user']['is_admin'] = $user['is_admin'] ? true : false;

            // var_dump($_SESSION);
            addFlash("success", "Bonjour " . $_SESSION['user']['firstname']);
            header("location:?page=home");
        } catch (\Throwable $th) {
            addFlash("danger", "Erreur, " . $th->getMessage());
            header("location:?page=login");
        }
    } else {
        addFlash("danger", "Erreur, vérifiez votre saisie");
        // header("location:?page=login");
    }//*/
}
