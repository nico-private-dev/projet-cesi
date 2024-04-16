<?php
if (isset($_POST['url_full']) && isset($_POST['user_id'])) {
    // FIXME // add some security
    $url_full = cleanStr($_POST['url_full']);
    $user_id = cleanStr($_POST['user_id']);
    $url_short = shortenUrl($url_full);
    $limit_date = cleanStr($_POST['limit_date']);
    $name = $_POST['name'];
    // FIXME change https dynamically
    $url_qr = 'http://' . $_SERVER['SERVER_NAME'] . '?page=url&code=' . $url_short;

    if (!$limit_date) {
        $limit_date = null;
    }

    addUrls($user_id, $url_full, $url_short, $limit_date);
    getQRcode($url_qr, $name);
    addQrCode($url_short, $name);
    var_dump($url_qr);
    header("location:?page=home&code=" . $url_short);
} else {
    // var_dump($url_full);
}
