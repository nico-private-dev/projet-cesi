<?php 


require_once "./controller/shortController.php";

$longUrl = "https://www.google.com/search?sca_esv=58652087346d5a22&rlz=1C1GCEA_enFR1085FR1085&sxsrf=ACQVn0_VC9DeNSlWu_dJ3qeM4CAlkuhtZw:1710941730059&q=Url+tr%C3%A8s+tres+longue&spell=1&sa=X&ved=2ahUKEwj4srTQ-oKFAxWoVKQEHQzVC2UQBSgAegQICRAC&biw=1920&bih=919&dpr=1#ip=1";
$shortUrl = shortenUrl($longUrl);

echo $shortUrl;

