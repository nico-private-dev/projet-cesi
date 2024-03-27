<?php 
if(isset($_POST) && isset($_POST['login']) && isset($_POST['password'])) {

    $login = cleanStr($_POST['login']);
    $password = cleanStr($_POST['password']);
    

    $user_id = login($login, $password, );

    if($user_id) {
        $user = getUserById($user_id);
        $_SESSION['user']['firstname'] = $user['firstname'];
        $_SESSION['user']['id'] = $user['id'];
        $_SESSION['user']['is_admin'] = $user['is_admin'];
        addFlash("success", "Bon retour par minou (😺) " . $_SESSION['user']['firstname']);
        header("location:?page=home");
    } else {
        addFlash("danger", "Erreur, utilisateur inconnu");
        header("location:?page=login");
    }  
}