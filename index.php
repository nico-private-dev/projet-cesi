<?php

session_start();

require_once "./view/_parts/header.php";
require_once "./Database.php";
require_once "./libs/cleanSTR.php";
require_once "./libs/tools.php";


require_once "./controller/shortController.php";
require_once "./controller/UserController.php";


$page = "home";
if (isset ($_GET['page'])) {
    $page = $_GET['page'];
}

switch ($page) {
    case 'home':
        $users = getUsers();
        if (isset ($_GET['code'])) {
            $url = getUrlByShortUrl($_GET['code']);
        }
        require_once "./view/home.php";

        break;

    case 'create_account':
        require_once "./view/_parts/create_account.php";
        break;

    case 'admin':
        $users = getUsers();
        require_once "./view/BO/bo_qr_users.php";
        break;
    case 'bo_url':
        $bo_urls = getUrls();
        // $user_id = getUrlsByUserID($_SESSION['user_id']);
        require_once "./view/BO/bo_url.php";
        break;
    case 'bo_url_admin':
        $bo_urls = getUrls();
        // $user_id = getUrlsByUserID($_SESSION['user_id']);
        require_once "./view/BO/bo_admin_url.php";
        break;

    case 'delete_user':
        delUser($_POST['user_id']);
        header('location:?page=admin');
        // require_once "./view/delete_user.php";
        break;
    case 'delete_url':
        delUrl($_POST['url_id']);
        header('location:?page=bo_url');
        // require_once "./view/delete_user.php";
        break;
    case 'promote_admin':
        updateUser($_POST['user_id']);
        header('location:?page=admin');
        // require_once "./view/delete_user.php";
        break;
    case 'login':
        require_once "./view/login.php";
        break;

    case 'action-add-post':
        require_once "./view/actions/add_post.php";
        break;
    case 'action-create_account':
        require_once "./view/actions/create_account.php";
        break;

    case 'action-login':
        require_once "./view/actions/login.php";
        break;

    case 'action-logout':
        require_once "./view/actions/logout.php";
        break;

    case 'qrcode':
        require_once "./controller/qrcodeController.php";
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
