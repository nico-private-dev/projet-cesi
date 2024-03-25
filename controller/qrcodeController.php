<?php

require_once 'vendor/autoload.php';

use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;

// Configurez les options du QR Code
$options = new QROptions([
    'version'    => 5,
    'outputType' => QRCode::OUTPUT_IMAGE_PNG,
    'eccLevel'   => QRCode::ECC_L,
]);

// Créez une nouvelle instance de QRCode avec les options
$qrcode = new QRCode($options);

// Générez le QR Code
$qrImage = $qrcode->render('Votre texte ici');

// Affichez le QR Code
header('Content-Type: image/png');
echo $qrImage;

?>


