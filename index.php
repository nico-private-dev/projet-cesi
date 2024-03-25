<?php
require_once "./view/_parts/header.php";
require_once "./Database.php";
require_once "./libs/cleanSTR.php";


require_once "./controller/shortController.php";
require_once "./controller/UserController.php";

// $Url_long = getUrls(['url_full']);
// $shortUrl = shortenUrl($Url_long);
// $shortUrl = $redirection;
// $redirection = header("Location:".$url_full);
// echo '<a href="http://qrfim.xyz/?page=url">' . 'http://qrfim.xyz/' . $shortUrl . '</a>';


$page = "home";
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}

switch ($page) {
    case 'home':
        $users = getUsers();
        require_once "./view/home.php";

        break;
    case 'action-add-post':
        require_once "./view/actions/add_post.php";
        break;
    case 'admin':
        require_once "./view/BO/bo_qr.php";
        break;
    case 'qrcode':
        require_once "./controller/qrcodeController.php";
        break;

    case 'create_account':
        require_once "./view/_parts/create_account.php";
        break;
    case 'url':

        $url = getUrlByShortUrl($_GET['code']);
        var_dump($url);
        header('location:' . $url['url_full']);
        require_once "./view/url.php";
        break;

    default:
        http_response_code(404);
        require_once "./view/404.php";

        break;
}
require_once "./view/_parts/footer.php";
