<?php
include '../class/connection.php';
$con = connect();
check_admin_login();
if ($_POST) {
    $Old_password = $_POST["Old_password"];
    $New_password = $_POST["New_password"];
    $Confirm_New_password = $_POST["Confirm_New_password"];
    $result = mysqli_query($con, "Select * from admin where Admin_id='{$_SESSION["Admin_id"]}'")or die(mysqli_error($con));
    $row = mysqli_fetch_assoc($result);

    if ($row["Admin_password"] == $Old_password) {
        if ($New_password == $Confirm_New_password) {
            $result = mysqli_query($con, "UPDATE `admin` SET `Admin_password`='{$New_password}' WHERE Admin_id='{$_SESSION["Admin_id"]}'")or die(mysqli_error($con));
            echo "<script>alert('Password Updated')</script>";
        } else {
            echo "<script>alert('New and Confirm New Password donot match')</script>";
        }
    } else {
        echo "<script>alert('Incorrect Old Password')</script>";
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
        <?php include './my-theme/loader.php'; ?>
        <!--/Preloader-->
        <div class="wrapper theme-2-active navbar-top-light horizontal-nav">
            <!-- Top Menu Items -->
            <?php include './my-theme/header.php'; ?>
            <!-- /Top Menu Items -->

            <!-- Left Sidebar Menu -->
            <?php include './my-theme/menu.php'; ?>
            <!-- /Left Sidebar Menu -->
            <!-- Main Content -->
            <div class="page-wrapper">
                <div class="container">
                    <!-- Title -->
                    <div class="row heading-bg">
                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                            <h5 class="txt-dark">Change Password</h5>
                        </div>

                        <!-- Breadcrumb -->
                        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">

                        </div>
                        <!-- /Breadcrumb -->

                    </div>
                    <!-- /Title -->

                    <!-- Row -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default border-panel card-view">
                                <div class="panel-wrapper collapse in">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-wrap">
                                                    <form data-toggle="validator" method="POST" role="form">
                                                        <div class="form-group">
                                                            <label for="inputName" class="control-label mb-10">Old Password</label>
                                                            <input type="password" class="form-control" id="inputName" name="Old_password" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputName" class="control-label mb-10">New Password</label>
                                                            <input type="password" class="form-control" id="inputName" name="New_password" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputName" class="control-label mb-10">Confirm New Password</label>
                                                            <input type="password" class="form-control" id="inputName" name="Confirm_New_password" required>
                                                        </div>
                                                        <div class="form-group mb-0">
                                                            <button type="submit" class="btn btn-success btn-anim"><i class="icon-rocket"></i><span class="btn-text">submit</span></button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Row -->
                </div>

                <!-- Footer -->
                <?php include './my-theme/footer.php'; ?>
                <!-- /Footer -->

            </div>
            <!-- /Main Content -->

        </div>
        <!-- /#wrapper -->

        <!-- JavaScript -->

        <!-- jQuery -->
        <?php include './my-theme/scripts.php'; ?>
    </body>
</html>