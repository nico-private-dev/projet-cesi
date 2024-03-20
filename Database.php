<?php

function databaseConnect() {
    $server = "localhost";
    $login = "root";
    $password = "";
    $port = "3306";
    $dbname = "webd2_short_url_v1";

    $pdo = new PDO("mysql:host=" . $server.";port=" . $port . ";dbname=" . $dbname, $login, $password);

    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $pdo->exec("set names utf8");

    return $pdo;
}

function databaseRead($req) {
    $pdo = databaseConnect();

    $stmt = $pdo->prepare($req);

    $stmt->execute();
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

    databaseConnectionClose($pdo);
    return $row;
}

function databaseWrite($req, $data) {

    $pdo = databaseConnect();
    $stmt = $pdo->prepare($req);

    $stmt->execute($data);
    databaseConnectionClose($pdo);
}

function databaseConnectionClose($pdo) {

    $pdo = null;

}