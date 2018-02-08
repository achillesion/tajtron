

<?php
require 'connect.php';
if($_SERVER["REQUEST_METHOD"] == "POST") {
   // $pid = $_GET['pid'];
    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $email = $_POST['email'];
    $username = $_POST['user_name'];
    $pass = $_POST['pass'];
    //$soldqty = $_POST['soldqty'];

    $sql = "SELECT * FROM users WHERE username='$username'" ;
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

    $count = mysqli_num_rows($result);

    // If count equal 1 than user already registered by that email
    if($count >= 1){

        header('location:  ../addUser.php');
        session_start();
         $_SESSION['login_error_msg'] = "We are Sorry, that user name  is already taken";
    }

    else if(count==0){
        $sql = "INSERT INTO `users`( `fname`, `lname`, `email`, `username`, `password`) VALUES ('".$fname."','".$lname."','".$email."','".$username."','".$pass."') ";

        if ($result = mysqli_query($con, $sql)) {
            // Fetch one and one row
            header('location:  ../index.php');
        }

    }



}
?>

