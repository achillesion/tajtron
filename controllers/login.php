<?php

require "connect.php";
 //starting the session for user profile page


if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form

    $myusername = mysqli_real_escape_string($con,$_POST['username']);
    $mypassword = mysqli_real_escape_string($con,$_POST['password']);

    $sql = "SELECT * FROM users WHERE username = '$myusername' and password = '$mypassword'";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
   // $active = $row['active'];

    $count = mysqli_num_rows($result);

    // If result matched $myusername and $mypassword, table row must be 1 row

    if($count == 1) {
        session_start();
        $_SESSION['login_user'] = $myusername;
        $_SESSION['login'] = true;
        $_SESSION['username']=$row['username'];
        $_SESSION['uid']=$row['uid'];
        $_SESSION['fname']=$row['fname'];
        //echo $_SESSION['fname'],  $_SESSION['uid'], $_SESSION['username'],$_SESSION['login_user'],  $_SESSION['login'] ;

          header('location:  ../index.php');

    }else {
        header('location:  ../index.html');
    }
}
?>
