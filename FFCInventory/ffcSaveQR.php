<?php
$file = "../FFCQRCodes/".$_REQUEST['item_ID'].".png"; //file name to write to include location if needed
$current = file_get_contents("http://ffcapp-env.eba-kxjxmifs.us-east-2.elasticbeanstalk.com/FFCInventory/ffcQRCode.php?item_ID=".$_REQUEST['item_ID']."");//read the created file
file_put_contents($file, $current);//write it
?>