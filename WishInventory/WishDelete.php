<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <div id="nav">
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
        <div id="nav-placeholder"></div>
        <script>
            $(function(){
            $("#nav-placeholder").load("Wishnavbar.html");
            });
        </script>
    </div>
  <title>Delete Item</title>
</head>
<body>
<?php
// include_once("../db_connect.php");
include 'WishLookup.php';

echo "$customer_ID";
// $sqld = "DELETE FROM ffc_wish_inventory WHERE customer_ID = '".$customer_ID."'";

// if ($conn->query($sqld) === TRUE) {
//     echo "Record deleted successfully";
//     echo '<p><a href="../index.php">Home</a></p>';
//   } else {
//     echo "Error deleting record: " . $conn->error;
//   }
  
// $conn->close();
?>
</body>
</html>