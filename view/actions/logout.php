<?php 

    $_SESSION['user'] = null;
    
    addFlash('info', "Vous êtes bien deconnecté");

    header("location:?page=home");