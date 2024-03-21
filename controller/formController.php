<?php

function addUrl($url_full, $url_short){

    $date = new DateTime();

    $req = "INSERT INTO urls (url_full, url_short, limit_date, created_at, updated_at) VALUES (:url_full, :url_short, null, '". $date->format("Y-m-d h:i:s")."', null);";

    $data = [
        'url_full' => $url_full,
        'url_short' => $url_short
    ];

    databaseWrite($req, $data);


}