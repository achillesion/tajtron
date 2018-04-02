<?php
require "controllers/connect.php";
include 'inc/header.php';
include 'inc/sidebar.php';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Free Bootstrap Admin Template : Dream</title>
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet"/>
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet"/>
    <!-- Morris Chart Styles-->

    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet"/>
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'/>
    <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet"/>
</head>
<body>
<div id="wrapper">

    <!-- /. NAV SIDE  -->
    <div id="page-wrapper">
        <div id="page-inner">

            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">
                        Records</small>
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Advanced Tables
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th>Bill ID</th>
                                        <th>Customer Code</th>
                                        <th>Customer Name</th>
                                        <th>LPO Number</th>
                                        <th>LPO Date</th>
                                        <th>Do Number</th>
                                        <th>Do Date</th>
                                        <th>Date</th>
                                        <th>View</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php


                                    $sql = "SELECT * FROM invoices";

                                    if ($result = mysqli_query($con, $sql)) {

                                        // Fetch one and one row
                                        while ($row = mysqli_fetch_array($result)) {
                                            $serial = $row['id'];
                                            ?>

                                            <tr class="odd gradeX">
                                                <td><?php echo $serial; ?></td>
                                                <td><?= $row['code'] ?></td>
                                                <td><?= $row['name'] ?></td>
                                                <td><?= $row['lpo'] ?></td>
                                                <td><?= $row['lpo_date'] ?></td>
                                                <td><?= $row['do'] ?></td>
                                                <td><?= $row['do_date'] ?></td>
                                                <td><?= $row['date'] ?></td>
                                                <td><a href="print2.php?sr=<?php echo $serial; ?>">View</a></td>
                                                <td><a href="Delete.php?sr=<?php echo $serial; ?>"
                                                       onclick="return confirm('Are you sure?')">Delete</a></td>
                                            </tr>
                                        <?php }
                                    } ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
        </div>
    </div>
</div> <!-- JS Scripts-->
<!-- jQuery Js -->
<script src="assets/js/jquery-1.10.2.js"></script>
<!-- Bootstrap Js -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- Metis Menu Js -->
<script src="assets/js/jquery.metisMenu.js"></script>
<!-- DATA TABLE SCRIPTS -->
<script src="assets/js/dataTables/jquery.dataTables.js"></script>
<script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
<script>
    $(document).ready(function () {
        $('#dataTables-example').dataTable();
    });
</script>
<!-- Custom Js -->
<script src="assets/js/custom-scripts.js"></script>


</body>
</html>
