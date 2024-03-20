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
