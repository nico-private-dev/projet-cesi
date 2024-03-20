function shortenUrl($url) {
    // Génère un identifiant unique et court pour l'URL
    $shortId = uniqid();

    // Ici, dans une application réelle, vous stockeriez $shortId et $url dans une base de données
    // pour pouvoir retrouver l'URL à partir de $shortId
    
    // Construit une URL courte en utilisant $shortId (exemplatif)
    $shortUrl = "https://ex.co/" . $shortId;
    
    // Assurez-vous que la longueur ne dépasse pas 50 caractères
    if (strlen($shortUrl) > 50) {
        // Traitez l'erreur ou ajustez $shortId pour réduire la longueur
        return "Erreur: L'URL raccourcie dépasse 50 caractères.";
    }
    
    return $shortUrl;
}

// Exemple d'utilisation
$longUrl = "https://example.com/param=x&param=x&param=x&param=x&param=x&param=x&param=x&param=x&param=x&param=x&param=x&param=x&param=x&param=x&param=x&param=x&param=x&param=x&param=x&param=x&longparam=xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx";
$shortUrl = shortenUrl($longUrl);
echo $shortUrl;


https://www.google.com/search?sca_esv=58652087346d5a22&rlz=1C1GCEA_enFR1085FR1085&sxsrf=ACQVn0_VC9DeNSlWu_dJ3qeM4CAlkuhtZw:1710941730059&q=Url+tr%C3%A8s+tres+longue&spell=1&sa=X&ved=2ahUKEwj4srTQ-oKFAxWoVKQEHQzVC2UQBSgAegQICRAC&biw=1920&bih=919&dpr=1#ip=1


header("Location:".$url_full);