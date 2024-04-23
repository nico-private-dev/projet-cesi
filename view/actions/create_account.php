<?php
if (isset($_POST['email']) && isset($_POST['password'])) {


    $lastname = cleanStr($_POST['lastname']);
    $firstname = cleanStr($_POST['firstname']);
    $email = $_POST['email'];
    $password = $_POST['password'];
    try {
        addUser($lastname, $firstname, $email, $password);
        addFlash("info", "Compte créé, veuillez vous connecter");
        header("location:?page=login");
    } catch (\Throwable $th) {
        switch ($th->getCode()) {
            case '23000':
                addFlash("danger", "Une erreur est survenue : l'adresse mail est déjà dans la base de données, veuillez vous connecter");
                break;

            default:
                addFlash("danger", "Une erreur est survenue : " . $th->getCode() . " " . $th->getMessage() . "<br> Veuillez retenter ultérieurement");

                break;
        }

        header("location:?page=create_account");
    }
} else {
    addFlash("danger", "Une erreur est survenue : Vérifiez vos informations");
    header("location:?page=create_account");
}
