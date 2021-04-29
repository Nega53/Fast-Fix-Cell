<?php
include 'phpqrcode/qrlib.php';

//Iterate through database table and generate a qr code for each one

//Create JSON object
$jsonobj = array("qrcode"=>$items['item_ID'], "name"=>$items['item_name'], 
"brand"=>$items['brand'], "model"=>['phone_model'], "type"=>$items['accessory_type'], "quantity"=>$items['item_quantity']);

//Text for QR
$text = json_encode($jsonobj);

QRCode::png($text);
?>