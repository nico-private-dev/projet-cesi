<?php
var_dump($_POST);
if (isset($_POST['url_full']) && isset($_POST ['user_id'])) {
    
    $url_full =cleanStr($_POST ['url_full']);
    $user_id =cleanStr($_POST ['user_id']);
    $url_short = shortenUrl($url_full);
    $limit_date = cleanStr($_POST ['limit_date']);
    if (!$limit_date) {
        $limit_date = null;
    }
    addUrls($user_id, $url_full, $url_short, $limit_date);

}else {
    // var_dump($url_full);
}