<?php 

function shortenUrl($url) {

    $shortId = uniqid();


    $shortUrl = "https://qrfim.xyz/" . $shortId;
    
    if (strlen($shortUrl) > 50) {
       
        return "Erreur: L'URL raccourcie dépasse 50 caractères.";
    }
    
    return $shortUrl;
}

function addUrls($url_full, $user_id){

    $date = new DateTime();

    $req = "INSERT INTO urls (url_full, user_id, alikes, date_created) VALUES (:url_full, :user_id, 0, '". $date->format("Y-m-d h:i:s")."');";

    $data = [
        'url_full' => $url_full,
        'user_id' => $user_id
    ];

    databaseWrite($req, $data);


}