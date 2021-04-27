<?php
include 'phpqrcode/qrlib.php';

//Text for QR
$text = "Test QR Code";

QRCode::png($text);
?>