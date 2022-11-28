<?php
session_start();

require_once "db_connect.php";
 
$email = $_SESSION['email'];
$destination = $_SESSION['kota_wisata'];
$total = $_SESSION['total_harga'];

$sql = "INSERT INTO `pemesanan`(`email`, `kota_wisata`, `total`) VALUES ('$email', '$destination', '$total')";
mysqli_query($con, $sql);
header("location: success.php");
?>