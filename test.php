<?php
include 'phpqrcode/qrlib.php';

//Create JSON object
$jsonobj = array("item"=>"A", "number"=>3, "string"=>"test");

//Text for QR
$text = json_encode($jsonobj);

QRCode::png($text);
?>