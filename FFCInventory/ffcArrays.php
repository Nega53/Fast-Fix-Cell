<?php
include_once("../db_connect.php");

//SQL select queries
$sql1 = "SELECT DISTINCT brand FROM ffc_inventory";
$sql2 = "SELECT DISTINCT phone_model FROM ffc_inventory";
$sql3 = "SELECT DISTINCT accessory_type FROM ffc_inventory";

//Store query searches in result set
//brand
$brand = array();
$resB = $conn->query($sql1);
//phone model
$phoneModel = array();
$resP = $conn->query($sql2);
//accessory type
$accessoryType = array();
$resA = $conn->query($sql3);

//Store each query search in an array
while($itemB = mysqli_fetch_assoc($resB)){
    $brand[] = $itemB['brand'];
}
while($itemP = mysqli_fetch_assoc($resP)){
    $phoneModel[] = $itemP['phone_model'];
}
while($itemA = mysqli_fetch_assoc($resA)){
    $accessoryType[] = $itemA['accessory_type'];
}

$conn->close();
?>