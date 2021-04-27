<!DOCTYPE html>
<html>
<head>
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
<!-- FILTERING OPTION FOR EACH COLUMN
    HAVE AN ARRAY OF EACH COLUMN NAMES -->
<?php include_once("../db_connect.php"); ?>
<form action="ffcInventoryList.php" method="post">
    <select name="ffcBrand" id="ffcBrand">
        <option value="" selected="selected">Phone Brand</option>
        <?php
            $sql1 = "SELECT DISTINCT brand FROM ffc_inventory ORDER BY brand";
            $resB = $conn->query($sql1);

            while($itemB = mysqli_fetch_assoc($resB)){
                echo '<option value="'.$itemB['brand'].'">'.$itemB['brand'].'</option>';
            }
        ?>
    </select>
    <select name="ffcPhone" id="ffcPhone">
        <option value="" selected="selected">Phone Model</option>
        <?php
            $sql2 = "SELECT DISTINCT phone_model FROM ffc_inventory ORDER BY phone_model";
            $resP = $conn->query($sql2);

            while($itemP = mysqli_fetch_assoc($resP)){
                echo '<option value="'.$itemP['phone_model'].'">'.$itemP['phone_model'].'</option>';
            }
        ?>
    </select>
    <select name="ffcAcc" id="ffcAcc">
        <option value="" selected="selected">Accessory Type</option>
        <?php
            $sql3 = "SELECT DISTINCT accessory_type FROM ffc_inventory ORDER BY accessory_type";
            $resA = $conn->query($sql3);

            while($itemA = mysqli_fetch_assoc($resA)){
                echo '<option value="'.$itemA['accessory_type'].'">'.$itemA['accessory_type'].'</option>';
            }
        ?>
    </select>
    <input name="filter" type="submit" value="Filter"/>
</form>
<!-- -->
<title>Fast Fix Cell Inventory List</title>
</head>
<body>

<?php
$sql;

//Testing variables
echo '<script>console.log("Brand Value: '.$_REQUEST['ffcBrand'].'")</script>';

//Based on Filters select the appropiate sql command
if(isset($_GET['ffcBrand']) && isset($_GET['ffcPhone']) && isset($_GET['ffcAcc'])){
    $sql = "SELECT * FROM ffc_inventory WHERE brand = ".$_GET['ffcBrand']." ORDER BY brand, phone_model, accessory_type";
}
else{
    $sql = "SELECT item_ID, item_name, brand, phone_model, accessory_type, item_quantity FROM ffc_inventory ORDER BY brand, phone_model, accessory_type";
}
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