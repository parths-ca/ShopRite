<?php

include '../class/connection.php';
$con = connect();
check_admin_login();


if($_POST){
    $txtBranchName = $_POST["txtBranchName"];
    $txtBranchEmail = $_POST["txtBranchEmail"];        
    $txtBranchAddress = $_POST["txtBranchAddress"];
    $txtBranchMobile = $_POST["txtBranchMobile"];
    $txtAreaId = $_POST["txtAreaId"];
    
    $result = mysqli_query($con, "INSERT INTO `branch`( `Branch_name`, `Branch_address`, `Branch_mobile`, `Branch_email`, `Area_id`) VALUES ('{$txtBranchName}','{$txtBranchAddress}','{$txtBranchMobile}','{$txtBranchEmail}','{$txtAreaId}')")or die(mysqli_error($con));
    if($result){
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
                            <h5 class="txt-dark">Branches</h5>
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
                                                            <label for="inputName" class="control-label mb-10">Name</label>
                                                            <input type="text" class="form-control" id="inputName" name="txtBranchName" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputName" class="control-label mb-10">Email</label>
                                                            <input type="text" class="form-control" id="inputName" name="txtBranchEmail" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputName" class="control-label mb-10">Address</label>
                                                            <input type="text" class="form-control" id="inputName" name="txtBranchAddress" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputName" class="control-label mb-10">Mobile</label>
                                                            <input type="number" class="form-control" id="inputName" name="txtBranchMobile" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputName" class="control-label mb-10">Area ID</label>
                                                            <select class="form-control" id="inputName" name="txtAreaId" required>
                                                                <option>Select Area Id</option>
                                                                <?php
                                                                    $aid = mysqli_query($con, "Select  * from area")or die(mysqli_error($con));
                                                                    while ($data = mysqli_fetch_assoc($aid)){
                                                                        echo "<option value='{$data["Area_id"]}'>{$data["Area_name"]}</option>";
                                                                    }
                                                                ?>
                                                            </select>
                                                            
                                                            
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