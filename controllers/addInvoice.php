<?php
include "connect.php";
$date = date('Y-m-d', strtotime(mysqli_real_escape_string($con, $_POST['date'])));
$name = mysqli_real_escape_string($con, $_POST['name']);
$code = mysqli_real_escape_string($con, $_POST['code']);
$lpo = mysqli_real_escape_string($con, $_POST['lpo']);
$lpodate = date('Y-m-d', strtotime(mysqli_real_escape_string($con, $_POST['lpodate'])));

$do = mysqli_real_escape_string($con, $_POST['do']);
$dodate = date('Y-m-d', strtotime(mysqli_real_escape_string($con, $_POST['dodate'])));
$item_name = $_POST['item_name'];
$item_quantity = $_POST['item_quantity'];
$item_cost = $_POST['item_cost'];
$item_fils = $_POST['CostFils'];

$sql = "INSERT INTO invoices (code, name, date, lpo, lpo_date, do, do_date) VALUES ('$code', '$name', '$date', '$lpo', '$lpodate', '$do', '$dodate')";


if (mysqli_query($con, $sql)) {
    // echo "New record created successfully";
} else {
    // echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

$nid = mysqli_insert_id($con);
$totalitems = count($item_cost);

for ($i = 0; $i < $totalitems; $i++) {
    $des = $item_name[$i];
    $costing = $item_cost[$i] . '.' . $item_fils[$i];
    $quantity = $item_quantity[$i];
    $subquery = "INSERT INTO `items`( `id`, `name`, `cost`, `quantity`) VALUES 
	($nid,'$des',$costing, $quantity)";

    if (mysqli_query($con, $subquery)) {
        // echo "New record created successfully";
    } else {
        //echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }

}

mysqli_close($con);
header('Location: ../print2.php?sr=' . $nid . '');
?>
