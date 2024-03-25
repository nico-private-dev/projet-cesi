<?php 

// Je controle que tpout les champs sont rempli et qte c'est bien une requete de type POST
if(isset($_POST) && isset($_POST['login']) && isset($_POST['password'])) {

    $login = cleanStr($_POST['login']);
    $password = cleanStr($_POST['password']);

    $user_id = login($login, $password);

    if($user_id) {
        $user = getUserById($user_id);
        $_SESSION['user']['firstname'] = $user['firstname'];
        addFlash("success", "Bon retour par minou (😺) " . $_SESSION['user']['firstname']);
        header("location:?page=home");
    } else {
        // user = 0
        // donc message compte inexistant
        addFlash("danger", "Erreur, utilisateur inconnu");
        header("location:?page=login");
    }  
}