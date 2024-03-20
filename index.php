<?php 
require_once "./view/_parts/header.php";

require_once "./Database.php";






require_once "./controller/shortController.php";

$longUrl = "https://github.com/FimCCIFormation/short_url/tree/main";
$shortUrl = shortenUrl($longUrl);

echo $shortUrl;
require_once "./view/_parts/footer.php";

