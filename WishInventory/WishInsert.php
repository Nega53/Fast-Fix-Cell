<?php
include_once("../db_connect.php");

//Form Input
$customer_ID = $conn->real_escape_string($_REQUEST['customer_ID']);
$location = $conn->real_escape_string($_REQUEST['location']);

//Attempt to insert into table
$sql = "INSERT INTO ffc_wish_inventory (customer_ID, location) VALUES
('$customer_ID', '$location')";

if($conn->query($sql) === true){
    echo "<p>Item successfully inserted into database.</p>";
    echo "<p>Insert Another Item?</p>";
    echo '<p><a href="WishInsert.html">Yes</a></p>';
    echo '<p><a href="../index.php">No</a></p>';
} else{
    echo "Unable to execute $sql. " . $conn->error;
}

$conn->close();
?>