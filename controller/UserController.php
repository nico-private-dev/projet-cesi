<?php

function getUsers(){

    $req = "SELECT 
                id, lastname, firstname, email, is_admin
            FROM 
                users;";
    $res = databaseRead($req);

    return $res;
}

function login($login, $pass)
{
    $req = "SELECT id, email, `password` 
        FROM `users` WHERE 
        email = :login AND `password` = :pass;";

    $data = [
        "login" => $login,
        "pass" => $pass
    ];

    $res = databaseRead($req, $data, true);

    // definition user_id = 0
    $user_id = 0;

    // si j'ai un resultat 
    // j'ecrase la valeur 0 par l'id
    if ($res) {
        if (count($res) > 0) {
            // alors exist
            $user_id  = $res['id'];
        }
    }

    // resultat soit 0 soit l'id de l'utilisateur
    return $user_id;
}


function getUserById($id)
{
    $req = "SELECT 
        id, lastname, firstname, email, is_admin
    FROM 
        users
    WHERE
        id=:id
    ;";
    $data = [
        'id' => $id
    ];
    $res = databaseRead($req, $data, true);

    return $res;
}



function delUser($user_id)
{


    $req = "DELETE FROM users WHERE id = :id ";

    $data = [
        'id' => $user_id,
        

    ];

    databaseWrite($req, $data);


}



function updateUser($user_id)
{
    // Préparation de la requête SQL pour mettre à jour le statut de l'utilisateur
    $req = "UPDATE users SET is_admin = :is_admin WHERE id = :id";

    // Définition des données pour la requête
    $data = [
        'id' => $user_id,   
        'is_admin' => '1', // Supposons que 'inactive' est la nouvelle valeur souhaitée
    ];

    // Appel de la fonction databaseWrite pour exécuter la mise à jour
    databaseWrite($req, $data);
}

function addUrls($user_id, $lastname, $firstname, $email, $password)
{

    $date = new DateTime();

    $req = "INSERT INTO urls (user_id, lastname, firstname , email, `password`, created_at) VALUES (:user_id, :url_full, :url_short, :limit_date, '" . $date->format("Y-m-d h:i:s") . "');";

    $data = [
        'user_id' => $user_id,
        'url_full' => $lastname,
        'url_short' => $firstname,
        'limit_date' => $email,
        'password' => $password,

    ];

    databaseWrite($req, $data);


}