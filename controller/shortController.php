<?php

function shortenUrl($url)
{

    $shortId = uniqid();


    // $shortUrl = "https://qrfim.xyz/" . $shortId;    
    $shortUrl = $shortId;

    if (strlen($shortUrl) > 50) {

        return "Erreur: L'URL raccourcie dépasse 50 caractères.";
    }

    return $shortUrl;
}


function getUrls()
{

    $req = "SELECT 
                *
            FROM 
                urls;";
    $res = databaseRead($req);

    return $res;


}


function getUrlsByUserID($user_id)
{

    $req = "SELECT
                *
            FROM
                urls
            WHERE
                user_id = :user_id ;";

    $data = [

        "user_id"=> $user_id,
    ];

    $res = databaseRead($req, $data, false);

var_dump($res);
}

function getUrlByShortUrl($shortUrl)
{
    $req = "SELECT 
    url_short,url_full
FROM 
    urls
WHERE
    url_short=:url_short";

    $data = [
        'url_short' => $shortUrl
    ];
    $res = databaseRead($req, $data, true);

    return $res;

}

function addUrls($user_id, $url_full, $url_short, $limit_date)
{

    $date = new DateTime();

    $req = "INSERT INTO urls (user_id, url_full, url_short,limit_date, created_at) VALUES (:user_id, :url_full, :url_short, :limit_date, '" . $date->format("Y-m-d h:i:s") . "');";

    $data = [
        'user_id' => $user_id,
        'url_full' => $url_full,
        'url_short' => $url_short,
        'limit_date' => $limit_date,

    ];

    databaseWrite($req, $data);


}


// function relationUrl($url_short,$url_full){

//     $relation = [];
//     $relation[$url_short] = $url_full;
//     // var_dump($relation);
//     header("Location:". $url_full);

//     return $relation;

// }

function delUrl($url_id)
{


    $req = "DELETE FROM urls WHERE id = :id ";

    $data = [
        'id' => $url_id,
        

    ];

    databaseWrite($req, $data);


}