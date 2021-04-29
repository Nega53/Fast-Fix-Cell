<?php 
include_once("../db_connect.php");

// //Create json and insert into table
$jsonobj = array("qrcode"=>$items['item_ID'], "name"=>$items['item_name'], "brand"=>$items['brand'],
"model"=>$items['phone_model'], "type"=>$items['accessory_type'], "quantity"=>$items['item_quantity']);

$text = json_encode($jsonobj, JSON_FORCE_OBJECT);
echo "<script>console.log($text);</script>";

$sqlI = "UPDATE ffc_inventory SET qr_code = '".$text."' WHERE item_ID = '".$items['item_ID']."'";

if($conn->query($sqlI) === true){
    echo "<script>console.log('Object Stored');</script>";
} else {
    echo "Unable to execute $sql." . $conn->error;
}

$conn->close();
?>