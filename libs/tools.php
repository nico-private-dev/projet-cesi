<?php 

function addFlash($type, $message){
    $_SESSION['flashes'][] = [
        "type" => $type, 
        "message" => $message
    ];
}

function remFlash(){
    $_SESSION['flashes'] = [];
};

function cleanStr($str) {
    return trim(htmlspecialchars(addslashes(strip_tags($str))));
}

/**
 * 
 * Check if user is connected
 */


function checkUser(){

    $res = ['is_connected' => false, 'is_admin' => false];

    if(isset($_SESSION['user'])){
        $res['is_connected'] = true;

        if($_SESSION['user']['is_admin']){
            $res['is_admin'] = true;
        }
        
    }

    
    

    return $res;

}