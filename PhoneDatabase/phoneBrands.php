<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <?php include_once("../db_connect.php"); ?>
    <div id="nav">
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
        <div id="nav-placeholder"></div>
        <script>
            $(function(){
            $("#nav-placeholder").load("phonedbnavbar.html");
            });
        </script>
    </div>
    <style>
        dt, dd {
            text-align: center;
        }
    </style>
    <title>Phone Brand Listing</title>
</head>
<body>
<?php
    $sql = "SELECT Brand, COUNT(Brand) AS Brand_Total FROM mobile_phones_database_by_teoalida GROUP BY Brand";
    $result = $conn->query($sql);
    $conn->close();
?>
    <?php while($pitems = mysqli_fetch_assoc($result)){ ?>
        <d1>
            <dt><?php echo $pitems['Brand']; ?></dt>
            <dd><?php echo $pitems['Brand_Total']; ?></dd>
        </d1>
    <?php } ?>
</body>
</html>