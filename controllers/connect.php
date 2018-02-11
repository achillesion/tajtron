<?php

// Coonection | User | Pasword | Database

$db_host        = 'https://premium34.web-hosting.com';
$db_user        = 'tajtron';
$db_pass        = 'jaytron69';
$db_database    = 'looptelp_tajtron';
$db_port        = '3306';
$con = mysqli_connect("localhost",$db_user ,$db_pass ,$db_database );

// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
