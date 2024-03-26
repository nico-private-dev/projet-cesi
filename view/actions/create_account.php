<?php
if (isset($_POST['email']) && isset($_POST ['password'])) {
    
    $lastname =cleanStr($_POST ['lastname']);
    $firstname =cleanStr($_POST ['firstname']);
    $email = $_POST ['email'];
    $password = $_POST ['password'];
    addUser($lastname, $firstname, $email, $password);
    header("location:?page=login");
}else {
    // var_dump($url_full);
}