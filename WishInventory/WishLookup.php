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
            $("#nav-placeholder").load("navbar.html");
            });
        </script>
    </div>
    <title>Wish Item Lookup</title>
</head>
<body>
<?php
include_once("../db_connect.php");

//Form Input
$customer_ID = $conn->real_escape_string($_REQUEST['customer_ID']);

//Attempt to fetch data from table
$sql = "SELECT * FROM ffc_wish_inventory WHERE customer_ID = '".$customer_ID."'";
$result = $conn->query($sql);
?>

<table id="WishInventoryTable" class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>Barcode/QR Code</th>
            <th>Item Location</th>
        </tr>
    </thead>
    <tbody>
        <?php while($items = mysqli_fetch_assoc($result)){?>
            <tr id="<?php echo $items ['id']; ?>">
                <td><?php echo $items['customer_ID']; ?></td>
                <td><?php echo $items['location']; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<?php
$conn->close();
echo '<p>PLACEHOLDER FOR DELETE OPTION</p>';
echo '<p><a href="WishLookup.html">Look up another item</a></p>';
echo '<p><a href="../index.php">Home</a></p>';
?>
</body>
</html>