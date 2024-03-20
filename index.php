<?php 
require_once "./view/_parts/header.php";

require_once "./Database.php";






require_once "./controller/shortController.php";

$longUrl = "https://github.com/FimCCIFormation/short_url/tree/main";
$shortUrl = shortenUrl($longUrl);

echo $shortUrl;
require_once "./view/_parts/footer.php";

$page = "home";
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}

switch ($page) {
    case 'home':
        require_once "./view/home.php";

        break;
    case 'admin':
        require_once "./view/BO/bo_qr.php";
        break;
    case '':
        require_once "";

        break;

    default:
        http_response_code(404);
        require_once "./view/404.php";

        break;
}
