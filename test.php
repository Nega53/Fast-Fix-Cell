<?php
include 'phpqrcode/qrlib.php';

//Create JSON object
$jsonobj = array("qrcode"=>"A-IPPRO-C", "name"=>"iPad Pro (9.7 in) Incipio Folio Case", 
        "brand"=>"Apple", "model"=>"iPad Pro (9.7 in)", "type"=>"Case", "quantity"=>19);

//Text for QR
$text = json_encode($jsonobj);

QRCode::png($text);
?>