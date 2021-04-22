<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="ffcArrays.php"></script>
<div id="nav">
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
        <div id="nav-placeholder"></div>
        <script>
            $(function(){
            $("#nav-placeholder").load("ffcnavbar.html");
            });
        </script>
</div>
<!-- FILTERING OPTION FOR EACH COLUMN
    HAVE AN ARRAY OF EACH COLUMN NAMES -->
<form action="ffcInventoryList.php">
    <select name="ffcBrand" id="ffcBrand">
        <option value="" selected="selected">Phone Brand</option>
        <?php
        foreach($brand as $item){
            echo '<option value="'.$item.'">'.$item.'</option>';
        }
        ?>
    </select>
</form>
<!-- -->
<title>Fast Fix Cell Inventory List</title>
</head>
<body>

<?php
include_once("../db_connect.php");

$sql = "SELECT item_ID, item_name, brand, phone_model, accessory_type, item_quantity FROM ffc_inventory";
$result = $conn->query($sql);

$conn->close();
?>

<table id="InventoryTable" class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>Barcode/QR Code</th>
            <th>Item Name</th>
            <th>Phone Brand</th>
            <th>Phone Model</th>
            <th>Accessory Type</th>
            <th>Item Quantity</th>
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
            </tr>
        <?php } ?>
    </tbody>
</table>
</body>
</html>