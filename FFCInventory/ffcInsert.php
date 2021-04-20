<?php
include_once("db_connect.php");

//Form Input
$item_ID = $conn->real_escape_string($_REQUEST['item_ID']);
$item_name = $conn->real_escape_string($_REQUEST['item_name']);
$brand = $conn->real_escape_string($_REQUEST['brand']);
$phone_model = $conn->real_escape_string($_REQUEST['phone_model']);
$accessory_type = $conn->real_escape_string($_REQUEST['accessory_type']);
$item_quantity = $conn->real_escape_string($_REQUEST['item_quantity']);

//Attempt to insert into table
$sql = "INSERT INTO ffc_inventory (item_ID, item_name, brand, phone_model, accessory_type, item_quantity) VALUES
('$item_ID', '$item_name', '$brand', '$phone_model', '$accessory_type', '$item_quantity')";

if($conn->query($sql) === true){
    echo "<p>Item successfully inserted into database.</p>";
    echo "<p>Insert Another Item?</p>";
    echo '<p><a href="ffcInsert.html">Yes</a></p>';
    echo '<p><a href="index.html">No</a></p>';
} else{
    echo "Unable to execute $sql." . $conn->error;
}

$conn->close();
?>