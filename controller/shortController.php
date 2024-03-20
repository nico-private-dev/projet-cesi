<?php 

function shortenUrl($url) {

    $shortId = uniqid();


    $shortUrl = "https://qrfim.xyz/" . $shortId;
    
    if (strlen($shortUrl) > 50) {
       
        return "Erreur: L'URL raccourcie dépasse 50 caractères.";
    }
    
    return $shortUrl;
}


function getUrls(){

    $req = "SELECT 
                content, date_created, alikes, nickname 
            FROM 
                blog
            INNER JOIN
                user
                ON
                user.id = blog.user_id;";
    $res = databaseRead($req);

    return $res;


}

function addUrls($user_id,$url_full,$url_short,$limit_date){

    $date = new DateTime();

    $req = "INSERT INTO urls (user_id, url_full, url_short,limit_date, created_at) VALUES (:user_id, :url_full, :url_short, :limit_date, '". $date->format("Y-m-d h:i:s")."');";

    $data = [
        'user_id' => $user_id,
        'url_full' => $url_full,
        'url_short' => $url_short,
        'limit_date' => $limit_date,

    ];

    databaseWrite($req, $data);


}