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
            $("#nav-placeholder").load("Wishnavbar.html");
            });
        </script>
    </div>
    <?php include_once("../db_connect.php"); ?>
    <form action="WishList.php" method="post">
        <select name="wishLoc" id="wishLoc">
            <option value="" selected="selected">Wish Item Location</option>
            <?php
                $sql1 = "SELECT DISTINCT location FROM ffc_wish_inventory ORDER BY location";
                $resL = $conn->query($sql1);

                while($itemW = mysqli_fetch_assoc($resL)){
                    echo '<option value="'.$itemW['wishLoc'].'">'.$itemW['wishLoc'].'</option>';
                }
            ?>
        </select>
        <input name="filter" type="submit" value="Filter"/>
    </form>
    <title>Wish Inventory List</title>
</head>
<body>
<?php

$sql;

//Filter Wish Location
//If location is selected
if(!empty($_REQUEST['wishLoc'])){
    $sql = "SELECT * FROM ffc_wish_inventory WHERE location = '".$_REQUEST['wishLoc']."'";
}
else{
    $sql = "SELECT * FROM ffc_wish_inventory";
}
$result = $conn->query($sql);

$conn->close();
?>

<table id="WishTable" class="table table-striped table-bordered table-hover">
    <thead>
        <th>Wish Item ID</th>
        <th>Item Location</th>
    </thead>
    <tbody>
        <?php while($witems = mysqli_fetch_assoc($result)){?>
            <tr id="<?php echo $witems ['id']; ?>">
                <td><?php echo $witems['customer_ID']; ?></td>
                <td><?php echo $witems['location']; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
</body>
</html>