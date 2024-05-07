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
    $req = "SELECT id, email, `password`, `is_admin` FROM `users` WHERE email = :login AND `password` = :pass;";

    $data = [
        "login" => $login,
        "pass" => $pass,
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


function login_with_hash($login)
{
    $req = "SELECT id, email, firstname, lastname,  `password`, `is_admin` FROM `users` WHERE email = :login";

    $data = [
        "login" => $login,
        // "pass" => $pass,
    ];

    $res = databaseRead($req, $data, true);

    // definition user_id = 0
    $user_id = 0;

    // si j'ai un resultat 
    // j'ecrase la valeur 0 par l'id
    if ($res) {
        /*if (count($res) > 0) {
            // alors exist
            $user_id  = $res['id'];
        }//*/
    }

    // resultat soit 0 soit l'id de l'utilisateur
    return $res;
}


// function login($login, $pass, $is_admin)
// {
//     $req = "SELECT id, email, `password`, is_admin 
//         FROM `users` WHERE 
//         email = :login , `password` = :pass , is_admin = :is_admin ;";

//     $data = [
//         "login" => $login,
//         "pass" => $pass,
//         "is_admin" => $is_admin
//     ];

//     $res = databaseRead($req, $data, true);

//     // definition user_id = 0
//     $user_id = 0;

//     // si j'ai un resultat 
//     // j'ecrase la valeur 0 par l'id
//     if ($res) {
//         if (count($res) > 0) {
//             // alors exist
//             $user_id  = $res['id'];
//         }
//     }

//     // resultat soit 0 soit l'id de l'utilisateur
//     return $user_id;
// }


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

    // var_dump($res);
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



function updatePromoteUserToAdmin($user_id)
{
    $req = "UPDATE users SET is_admin = :is_admin WHERE id = :id";
    $data = [
        'id' => $user_id,   
        'is_admin' => '1', 
    ];
    databaseWrite($req, $data);
}

function addUser($lastname, $firstname, $email, $password)
{

    $date = new DateTime();

    $req = "INSERT INTO users (lastname, firstname , email, password, created_at) VALUES (:lastname, :firstname , :email, :password, '" . $date->format("Y-m-d h:i:s") . "');";

    $data = [
        'lastname' => $lastname,
        'firstname' => $firstname,
        'email' => $email,
        'password' => $password,

    ];

    databaseWrite($req, $data);


}