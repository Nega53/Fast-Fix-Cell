<?php
include_once("../db_connect.php");
$customer_ID = $_REQUEST['customer_ID'];

$sqld = "DELETE FROM ffc_wish_inventory WHERE customer_ID = '".$customer_ID."'";

if ($conn->query($sqld) === TRUE) {
    echo "Record deleted successfully";
    echo '<p><a href="WishLooup.html">Look up Another item?</a></p>';
    echo '<p><a href="../index.php">Home</a></p>';
  } else {
    echo "Error deleting record: " . $conn->error;
  }
  
$conn->close();
?>