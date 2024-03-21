<?php 

function shortenUrl($url) {

    $shortId = uniqid();


    // $shortUrl = "https://qrfim.xyz/" . $shortId;    
    $shortUrl = $shortId;
    
    if (strlen($shortUrl) > 50) {
       
        return "Erreur: L'URL raccourcie dépasse 50 caractères.";
    }   
    
    return $shortUrl;
}


function getUrls(){

    $req = "SELECT 
                user_id, url_short,url_full
            FROM 
                urls;";
    $res = databaseRead($req);

    return $res;


}

function getUrlsByID($id){

    $req = "SELECT 
                url_short,url_full
            FROM 
                urls;
            WHERE
                url_short=:url_short";
    $data = [
        'url_short' => $id
    ];
    $res = databaseRead($req, $data, true);

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


function relationUrl($url_short,$url_full){

    $relation = [];
    $relation[$url_short] = $url_full;
    // var_dump($relation);
    header("Location:". $url_full);

    return $relation;

}

