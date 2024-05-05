<?php

function addFlash($type, $message)
{
    $_SESSION['flashes'][] = [
        "type" => $type,
        "message" => $message
    ];
}

function remFlash()
{
    $_SESSION['flashes'] = [];
};

function cleanStr($str)
{
    return trim(htmlspecialchars(addslashes(strip_tags($str))));
}

/**
 * 
 * Check if user is connected
 */


function checkUser()
{

    if (isset($_SESSION['user'])) {
        $res = ['user_id' => $_SESSION['user']['id'], 'is_connected' => false, 'is_admin' => false];
    } else {
        $res = ['user_id' => null, 'is_connected' => false, 'is_admin' => false];
    }

    if (isset($_SESSION['user'])) {
        $res['is_connected'] = true;

        if ($_SESSION['user']['is_admin']) {
            $res['is_admin'] = true;
        }
    }

    return $res;
}

/**
 * @param 
 */
function addLog($type, $content = "")
{
    $user = checkUser()['is_connected'] ? $_SESSION['user']['email'] : " - ";
    //Something to write to txt log
    $log  = date("Y-m-d, h:i") . " - User: " . $user .  " server: " . $_SERVER['REMOTE_ADDR'] . ' - ' .
        "path: " . $_SERVER['REQUEST_URI'] . PHP_EOL;

    if ($type != "") {
        $log .= $type . ": " . $content . " " . PHP_EOL;
    }

    $log .= "-------------------------" . PHP_EOL;
    //Save string to log, use FILE_APPEND to append.
    file_put_contents('./var/log_' . date("n.Y") . '.log', $log, FILE_APPEND);
}
