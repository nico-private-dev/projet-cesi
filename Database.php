<?php

function databaseConnect()
{
    $server = "localhost";
    $login = "root";
    $password = "";
    $port = "3306";
    $dbname = "short_url_qr_fim";

    $pdo = new PDO("mysql:host=" . $server . ";port=" . $port . ";dbname=" . $dbname, $login, $password);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $pdo->exec("set names utf8");

    return $pdo;
}

function databaseRead($req, $data = [], $isUnique = false)
{
    $pdo = databaseConnect();

    $stmt = $pdo->prepare($req);

    $stmt->execute($data);

    // $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($isUnique) {
        $row = $stmt->fetch();
    } else {
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    databaseConnectionClose($pdo);
    return $row;
}

function databaseWrite($req, $data)
{

    $pdo = databaseConnect();
    $stmt = $pdo->prepare($req);

    $stmt->execute($data);
    databaseConnectionClose($pdo);
}

function databaseConnectionClose($pdo)
{

    $pdo = null;
}
