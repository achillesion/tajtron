<?php

include 'inc/header.php';
include 'inc/sidebar.php';
?>


<body>
<div id="wrapper">

    <!-- /. NAV SIDE  -->
    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">
                        Dashboard
                        <small>Printing Press</small>
                    </h1>
                </div>
            </div>
            <!-- /. ROW  -->

            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-4">
                    <a href="addInvoice.php" class="btn btn-block btn btn-primary btn-lg" style="height: 150px"><br>
                        <span class="glyphicon glyphicon-list-alt"></span>
                        <p style="font-size: 30px">Genrate Bill</p></a>
                </div>

                <div class="col-md-4">
                    <a href="records.php" class="btn btn-block btn btn-primary btn-lg" style="height: 150px"
                       style="font-size: 60px"><br>
                        <span class="glyphicon glyphicon-folder-open"></span>
                        <p style="font-size: 30px">View Records</p></a>
                </div>
                 <div class="col-md-2"></div>

            </div>

            <!-- /. ROW  -->
        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
</div>
<!-- /. WRAPPER  -->
<!-- JS Scripts-->
<!-- jQuery Js -->
<?php require 'inc/footer.php'; ?>

</body>

</html>