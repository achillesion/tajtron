<?php

// Coonection | User | Pasword | Database
$con = mysqli_connect("localhost","tajtron","jaytron69","looptelp_tajtron");

// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
