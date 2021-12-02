<?php
 
$servername = "lrgs.ftsm.ukm.my";
$username = "a175275";
$password = "";
$dbname = "a175275";
 
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
