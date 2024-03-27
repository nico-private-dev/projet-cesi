<?php

function getUrlIdJoinQrCode($id) {

    $req = "SELECT * FROM `urls` INNER JOIN `qr_codes` ON urls.id = qr_codes.url_id WHERE urls.id = ".$id.";";

    databaseRead($req);
}

function addQrCode($url,$name)
{
    $urlId = getIdFromShortUrl($url); // Suppose que cette fonction retourne l'ID ou null si non trouvé

    // Si l'URL n'existe pas, insérez-la d'abord dans `urls` et obtenez le nouvel ID
 

    $date = new DateTime();

    $req = "INSERT INTO qr_codes (url_id, name, created_at) VALUES (:url_id,:name, '" . $date->format("Y-m-d h:i:s") . "');";

    $data = [
        'url_id' => $urlId['id'] ,
        'name' => $name

    ];

    databaseWrite($req, $data);


}

function getNameById($id) {
    // La requête SQL pour récupérer le champ `name` à partir de l'ID. 
    // Assurez-vous de remplacer `table2` par le nom réel de votre table et `name` par le nom réel du champ que vous souhaitez récupérer.
    // Adaptez également `table1` et `table2` pour qu'elles correspondent à vos noms de tables réels et la condition de jointure selon vos besoins.
    $req = "SELECT name FROM qr_codes WHERE url_id = :id";

    $data = [
        ':id' => $id

    ];
    // Appel à la fonction databaseRead avec la requête, les données (dans ce cas, l'ID), et indiquez que vous souhaitez un résultat unique.
    $res = databaseRead($req, $data, true);

    // Si un résultat est trouvé, retournez le champ `name`, sinon retournez null.
    return $res;
}