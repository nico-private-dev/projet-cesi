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