<?php

include '../class/connection.php';
$con = connect();
check_admin_login();


if($_POST){

    $txtEmployeeName = $_POST["txtEmployeeName"];
    $txtEmployeeMobile = $_POST["txtEmployeeMobile"];
    $txtEmployeeEmail = $_POST["txtEmployeeEmail"];
    $txtEmployeePassword = $_POST["txtEmployeePassword"];
    $txtEmployeeTypeId = $_POST["txtEmployeeTypeId"];
    $txtBranchId = $_POST["txtBranchId"];
   
    $result = mysqli_query($con, "INSERT INTO `employee`(`Employee_name`, `Employee_email`, `Employee_mobile`, `Employee_password`, `Employee_type_id`, `Branch_id`) VALUES ('{$txtEmployeeName}','{$txtEmployeeEmail}','{$txtEmployeeMobile}','{$txtEmployeePassword}','{$txtEmployeeTypeId}','{$txtBranchId}')")or die(mysqli_error($con));
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
                            <h5 class="txt-dark">Employees</h5>
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
                                                            <input type="text" class="form-control" id="inputName" name="txtEmployeeName" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputName" class="control-label mb-10">Mobile</label>
                                                            <input type="text" class="form-control" id="inputName" name="txtEmployeeMobile" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputName" class="control-label mb-10">Email</label>
                                                            <input type="text" class="form-control" id="inputName" name="txtEmployeeEmail" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputName" class="control-label mb-10"> Password</label>
                                                            <input type="password" class="form-control" id="inputName" name="txtEmployeePassword" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputName" class="control-label mb-10"> Employee Type ID</label>
                                                            <select class="form-control" id="inputName" name="txtEmployeeTypeId" required>
                                                                <option>Select Type of employee</option>
                                                                <?php
                                                                    $bid = mysqli_query($con, "Select * from employee_type")or die(mysqli_error($con));
                                                                    while ($data = mysqli_fetch_assoc($bid)){
                                                                        echo "<option value='{$data["Employee_type_id"]}'>{$data["Employee_type_name"]}</option>";
                                                                    }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputName" class="control-label mb-10"> Branch Id</label>
                                                            <select class="form-control" id="inputName" name="txtBranchId" required>
                                                                <option>Branch Id </option>
                                                                <?php
                                                                    $bid = mysqli_query($con, "Select * from branch")or die(mysqli_error($con));
                                                                    while ($data = mysqli_fetch_assoc($bid)){
                                                                        echo "<option value='{$data["Branch_id"]}'>{$data["Branch_name"]}</option>";
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