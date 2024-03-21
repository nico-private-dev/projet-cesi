<?php
require_once "./view/_parts/header.php";

require_once "./Database.php";

require_once "./controller/shortController.php";

$Url_long = getUrls(['url_full']);
$shortUrl = shortenUrl($Url_long);
// $shortUrl = $redirection;
// $redirection = header("Location:".$url_full);
// echo '<a href="http://qrfim.xyz/?page=url">' . 'http://qrfim.xyz/' . $shortUrl . '</a>';







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

    case 'create_account':
            require_once "./view/_parts/create_account.php";
            break;
    case 'url':

        $url = getUrlsByID('https://qrfim.xyz/65faf360af0e7');
        require_once "./view/url.php";
        break;

    default:
        http_response_code(404);
        require_once "./view/404.php";

        break;
}
require_once "./view/_parts/footer.php";
