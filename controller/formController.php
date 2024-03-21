<?php

function addUrl($content, $user_id){

    $date = new DateTime();

    $req = "INSERT INTO blog (content, user_id, alikes, date_created) VALUES (:content, :user_id, 0, '". $date->format("Y-m-d h:i:s")."');";

    $data = [
        'content' => $content,
        'user_id' => $user_id
    ];

    databaseWrite($req, $data);


}