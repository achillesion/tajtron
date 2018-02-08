
<body>
<?php
session_start();

$uid=$_SESSION['uid'];


require 'connect.php';
if($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    //$username = $_POST['user_name'];
    $pass = $_POST['pass'];


    $sql = "UPDATE `users` SET `email`='".$email."',`password`='".$pass."' WHERE uid=$uid ";

    if ($result = mysqli_query($con, $sql)) {
        // Fetch one and one row
        header('location:  ../index.php');
    }

}
?>


</body>
</html>
