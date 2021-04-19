<?php
include '../class/connection.php';
$con = connect();
check_admin_login();
if ($_POST) {
    $txtCategoryName = $_POST["txtCategoryName"];
    $txtCategoryImage = "images/category-images/" . time() . ".png";

    $result = mysqli_query($con, " INSERT INTO `category`(`Category_name`, `Category_icon_url`) VALUES ('{$txtCategoryName}','{$txtCategoryImage}')")or die(mysqli_error($con));
    if ($result) {
        move_uploaded_file($_FILES["txtCategoryImage"]["tmp_name"], "../" . $txtCategoryImage);
        echo "<script>alert('Data Inserted')</script>";
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
                            <h5 class="txt-dark">Categories</h5>
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
                                                    <form data-toggle="validator" enctype="multipart/form-data" method="POST" role="form">

                                                        <div class="form-group">
                                                            <label for="inputName" class="control-label mb-10">Name</label>
                                                            <input type="text" class="form-control" id="inputName" name="txtCategoryName" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputName" class="control-label mb-10">Image</label>
                                                            <input type="file" class="form-control" id="inputName" name="txtCategoryImage" required>
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