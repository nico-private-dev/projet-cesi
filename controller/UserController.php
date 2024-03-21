<?php

function getUsers(){

    $req = "SELECT 
                id, lastname, firstname, email
            FROM 
                users;";
    $res = databaseRead($req);

    return $res;
}