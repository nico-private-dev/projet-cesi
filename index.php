<?php 
require_once "./view/_parts/header.php";

require_once "./Database.php";

require_once "./controller/shortController.php";

$url_full = getUrls(['url_full']);
$shortUrl = shortenUrl($url_full);
// $shortUrl = $redirection;
// $redirection = header("Location:".$url_full);
echo '<a href="http://qrfim.xyz/?page=url">'.'http://qrfim.xyz/'.$shortUrl.'</a>';


 




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
    case 'url':
        
        var_dump($url_full,$shortUrl);
        $url_full = getUrls(['url_full']);
        relationUrl($shortUrl,$url_full);
        break;

    default:
        http_response_code(404);
        require_once "./view/404.php";

        break;
}
require_once "./view/_parts/footer.php";