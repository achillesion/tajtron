<?php
include 'inc/header.php';
include 'inc/sidebar.php';

session_start();
?>

<div id="wrapper">

    <!-- /. NAV SIDE  -->
    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-user"></i> Add User</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
                        <li><i class="fa fa-key"></i>Change Password</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
                    <form role="form" action="controllers/addUser.php" method="post">

                        <h5><?php if (!empty($_SESSION['login_error_msg'])) {

                                print_r($_SESSION['login_error_msg']);

                                unset($_SESSION['login_error_msg']);
                            }
                            ?>
                        </h5>



                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="first_name" id="first_name" class="form-control input-lg"
                                           placeholder="First Name" tabindex="1" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="last_name" id="last_name" class="form-control input-lg"
                                           placeholder="Last Name" tabindex="2" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" id="email" class="form-control input-lg"
                                   placeholder="Email Address" tabindex="4" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="user_name" id="user_name" class="form-control input-lg"
                                   placeholder="User Name" tabindex="3" required>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="password" pattern=".{5,10} " name="pass" id="password"
                                           class="form-control input-lg"
                                           placeholder="Password" tabindex="5"
                                           title="Please enter from 5 to 10 characters" required>
                                </div>
                            </div>

                        </div>


                        <hr class="colorgraph">
                        <div class="row">
                            <div class="col-xs-12 col-md-6"><input type="submit" value="Add user"
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
<?= include 'inc/footer.php' ?>
</body>
</html>
