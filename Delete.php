<?php
include 'controllers/connect.php';
$Sr = $_GET['sr'];
mysqli_query($con, "DELETE FROM `invoices` WHERE `id` ='$Sr'");
mysqli_query($con, "DELETE FROM `items` WHERE `id` ='$Sr'");
header('Location: Records.php');
?>