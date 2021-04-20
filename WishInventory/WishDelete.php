<?php
include_once("../db_connect.php");

$sqld = "DELETE FROM ffc_wish_inventory WHERE customer_ID = '".$customer_ID."'";

if ($conn->query($sqld) === TRUE) {
    echo "Record deleted successfully";
  } else {
    echo "Error deleting record: " . $conn->error;
  }
  
$conn->close();
?>