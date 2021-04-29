<?php
include_once("../db_connect.php");
include_once("../phpqrcode/qrlib.php");

$item_ID = $_REQUEST['item_ID'];

$sqlF = "SELECT * FROM ffc_inventory WHERE item_ID = '".$item_ID."'";
$res = $conn->query($sqlF);

while($items = mysqli_fetch_assoc($res)){
    $jsonobj = array("qrcode"=>$items['item_ID'], "name"=>$items['item_name'], "brand"=>$items['brand'],
                "model"=>$items['phone_model'], "type"=>$items['accessory_type'], "quantity"=>$items['item_quantity']);
    $text = json_encode($jsonobj, JSON_FORCE_OBJECT);

    QRCode::png($text);
}
?>