<?php
// include_once("../db_connect.php");
//Edit variable since its not being passed
$customer_ID = $_REQUEST['customer_ID'];
echo "<p>". $customer_ID ."</p>";

// $sqld = "DELETE FROM ffc_wish_inventory WHERE customer_ID = '".$customer_ID."'";

// if ($conn->query($sqld) === TRUE) {
//     echo "Record deleted successfully";
//     echo '<p><a href="../index.php">Home</a></p>';
//   } else {
//     echo "Error deleting record: " . $conn->error;
//   }
  
// $conn->close();
?>