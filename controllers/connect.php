<?php

// Coonection | User | Pasword | Database

$db_host        = 'sql12.freemysqlhosting.net';
$db_user        = 'sql12220763';
$db_pass        = 'ARjQpgyv5a';
$db_database    = 'sql12220763';
$db_port        = '3306';
$con = mysqli_connect($db_host,$db_user ,$db_pass ,$db_database );

// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
