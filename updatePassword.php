<?php
include 'inc/header.php';
include 'inc/sidebar.php';
?>
<body>

<div id="wrapper">
    <!-- /. NAV SIDE  -->
    <div id="page-wrapper">
        <div id="page-inner">

            <!--Header and Breadcrums Bar-->
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-key"></i> Change Password</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
                        <li><i class="fa fa-key"></i>Change Password</li>
                    </ol>
                </div>
            </div>

            <!--Form for Change Password -->
            <div class="container">

                <div class="row">
                    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
                        <form role="form" action="controllers/updatePassword.php" method="post">
                            <h2>Change Password
                                <small>For a better security</small>
                            </h2>
                            <hr class="colorgraph">
                            <div class="form-group">
                                <input type="email" name="email" id="email" class="form-control input-lg"
                                       placeholder="Email Address" tabindex="1" required>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="password" name="pass" id="password" class="form-control input-lg"
                                               placeholder="Password" tabindex="2" required>
                                    </div>
                                </div>

                            </div>


                            <hr class="colorgraph">
                            <div class="row">
                                <div class="col-xs-12 col-md-6"><input type="submit" value="Change Password"
                                                                       class="btn btn-primary btn-block btn-lg"
                                                                       tabindex="7"></div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="t_and_c_m" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                     aria-hidden="true">
                    <!-- /.modal -->

                </div>        <!-- project team & activity end -->

            </div>
        </div>
    </div>
</div>
<!-- javascripts -->
<?= include 'inc/footer.php' ?>
</body>
</html>
