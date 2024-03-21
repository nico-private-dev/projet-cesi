<?php

if (isset($_POST['blog_content']) && isset($_POST ['user_id'])) {
    
    $blog_content =cleanStr($_POST ['blog_content']);
    $user_id =cleanStr($_POST ['user_id']);
    addUrl($blog_content,$user_id);

}else {
    //message d'erreur
}