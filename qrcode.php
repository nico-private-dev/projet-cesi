<?php


require 'vendor/autoload.php';



use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Writer\ValidationException;

function getQRcode($url, $name){
    $writer = new PngWriter();

    // Create QR code
    $qrCode = QrCode::create($url)
        ->setEncoding(new Encoding('UTF-8'))
        ->setErrorCorrectionLevel(ErrorCorrectionLevel::Low)
        ->setSize(300)
        ->setMargin(10)
        ->setRoundBlockSizeMode(RoundBlockSizeMode::Margin)
        ->setForegroundColor(new Color(0, 0, 0))
        ->setBackgroundColor(new Color(255, 255, 255));

    // Create generic logo
    $logo = Logo::create(__DIR__ . '/public/img/logo-qr-fim.png')
        ->setResizeToWidth(50)
        ->setPunchoutBackground(true)
    ;

    // Create generic label
    $label = Label::create($name)
        ->setTextColor(new Color(255, 0, 0));

    $result = $writer->write($qrCode, $logo, $label);

    // Validate the result
// $writer->validateResult($result, 'Life is too short to be generating QR codes');

    // header('Content-Type: ' . $result->getMimeType());
    // $result->getMimeType();
    // echo $result->getString();

    // Save it to a file
    $result->saveToFile(__DIR__ . '/public/img/qrcode_generate/'.$name.'.png');

    // Generate a data URI to include image data inline (i.e. inside an <img> tag)
    $dataUri = $result->getDataUri();

}