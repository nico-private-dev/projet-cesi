<?php

function getUsers(){

    $req = "SELECT 
                id, lastname, firstname, email
            FROM 
                users;";
    $res = databaseRead($req);

    return $res;
}

function login($login, $pass)
{
    $req = "SELECT id, email, `password` 
        FROM `user` WHERE 
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
        id, nickname, email, profile_pic
    FROM 
        user
    WHERE
        id=:id
    ;";
    $data = [
        'id' => $id
    ];
    $res = databaseRead($req, $data, true);

    return $res;
}
