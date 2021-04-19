<?php

include '../class/connection.php';
$con=connect();


if (isset($_POST["Admin_email"])) {
    $Admin_name = mysqli_real_escape_string($con, $_POST["Admin_email"]);
    $result = mysqli_query($con, "SELECT * FROM `admin` where Admin_email='{$Admin_name}'")or die(mysqli_error($con));
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if (sendMail($row["Admin_email"], "Password Recovery", "Your Password is :" . $row["Admin_password"])) {
            echo "<script>alert('Mail Sent')</script>";
        } else {
            echo "<script>alert('Mail Sending Error.')</script>";
        }
    } else {
        echo "<script>alert('Name  not registered with us.')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include './my-theme/header-scripts.php'; ?>
    </head>
    <body>
        <!--Preloader-->
        <div class="preloader-it">
            <div class="la-anim-1"></div>
        </div>
        <!--/Preloader-->

        <div class="wrapper  pa-0">
            <header class="sp-header">
                <div class="sp-logo-wrap pull-left">
                    <a href="index.php">
                        <img class="brand-img mr-10" height="100px" width="150px" src="my-theme/img/shoprite_logo.png" alt="brand"/>
                        <span class="brand-text"><img height="100px" width="150px"  src="my-theme/img/shoprite_logo.png" alt="brand"/></span>
                    </a>
                </div>
                <div class="clearfix"></div>
            </header>

            <!-- Main Content -->
            <div class="page-wrapper pa-0 ma-0 auth-page">
                <div class="container">
                    <!-- Row -->
                    <div class="table-struct full-width full-height">
                        <div class="table-cell vertical-align-middle auth-form-wrap">
                            <div class="auth-form  ml-auto mr-auto no-float card-view pt-30 pb-30">
                                <div class="row">
                                    <div class="col-sm-12 col-xs-12">
                                        <div class="mb-30">
                                            <h3 class="text-center txt-dark mb-10">Sign in to ShopRite</h3>
                                            <h6 class="text-center nonecase-font txt-grey">Enter your details below</h6>
                                        </div>	
                                        <div class="form-wrap">
                                            <form method="POST">
                                                <div class="form-group">
                                                    <label class="control-label mb-10" for="exampleInputEmail_2">Email address</label>
                                                    <input type="email" name="Admin_email" class="form-control" required="" id="exampleInputEmail_2" placeholder="Enter email">
                                                </div>
                                               
                                                <div class="form-group text-center">
                                                    <button type="submit" class="btn btn-orange btn-rounded">sign in</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>	
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Row -->	
                </div>

            </div>
            <!-- /Main Content -->

        </div>
        <!-- /#wrapper -->

        <!-- JavaScript -->

        <!-- jQuery -->
        <?php include './my-theme/scripts.php'; ?>
    </body>
</html>