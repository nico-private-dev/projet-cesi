<?php

require_once './vendor/autoload.php';

use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\GdImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;

// Créer un rendu d'image avec GD
$renderer = new ImageRenderer(
    new RendererStyle(400),
    new GdImageBackEnd()
);

// Créer un objet Writer
$writer = new Writer($renderer);

// Générer le QR code avec du texte
$writer->writeFile('Hello World!', 'qrcode.png');

echo "QR code généré avec succès !";

?>


