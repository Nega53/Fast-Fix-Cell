<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <div id="nav">
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
        <div id="nav-placeholder"></div>
        <script>
            $(function(){
            $("#nav-placeholder").load("ffcnavbar.html");
            });
        </script>
    </div>
    <title>Item Lookup</title>
</head>
<body>
<?php
include_once("../db_connect.php");

//Form Input
$item_ID = $conn->real_escape_string($_REQUEST['item_ID']);

//Attempt to fetch data from table
$sql = "SELECT * FROM ffc_inventory WHERE item_ID = '".$item_ID."'";
$result = $conn->query($sql);
?>
<div>
<table id="InventoryTable" class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>Barcode</th>
            <th>Item Name</th>
            <th>Phone Brand</th>
            <th>Phone Model</th>
            <th>Accessory Type</th>
            <th>Item Quantity</th>
            <th>QR Code</th>
        </tr>
    </thead>
    <tbody>
        <?php while($items = mysqli_fetch_assoc($result)){?>
            <tr id="<?php echo $items ['id']; ?>">
                <td><?php echo $items['item_ID']; ?></td>
                <td><?php echo $items['item_name']; ?></td>
                <td><?php echo $items['brand']; ?></td>
                <td><?php echo $items['phone_model']; ?></td>
                <td><?php echo $items['accessory_type']; ?></td>
                <td><?php echo $items['item_quantity']; ?></td>
                <td><?php echo '<img src="ffcQRCode.php?item_ID='.$items['item_ID'].'">' ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
</div>
<?php
$conn->close();
echo '<p><a href="ffcLookup.html">Look up another item</a></p>';
echo '<p><a href="../index.php">Home</a></p>';
?>
</body>
</html>