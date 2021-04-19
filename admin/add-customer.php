<?php 

include '../class/connection.php';
$con = connect();
check_admin_login();


if($_POST){
    $txtCustomerName = $_POST["txtCustomerName"];
    $txtCustomerAddress = $_POST["txtCustomerAddress"];
    $txtCustomerMobile = $_POST["txtCustomerMobile"];
    $txtCustomerEmail = $_POST["txtCustomerEmail"];
    $txtCustomerPassword = $_POST["txtCustomerPassword"];
    $txtCustomerGender = $_POST["txtCustomerGender"];
    $txtCustomerDOB = $_POST["txtCustomerDOB"];
    $txtBranchId = $_POST["txtBranchId"];
    
    $result = mysqli_query($con, "INSERT INTO `customer`(`Customer_name`, `Customer_address`, `Customer_mobile`, `Customer_email`, `Customer_password`, `Customer_gender`, `Customer_dob`, `Branch_id`) VALUES ('{$txtCustomerName}','{$txtCustomerAddress}','{$txtCustomerMobile}','{$txtCustomerEmail}','{$txtCustomerPassword}','{$txtCustomerGender}','{$txtCustomerDOB}','{$txtBranchId}')")or die(mysqli_error($con));
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
                            <h5 class="txt-dark">Customer</h5>
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
                                                            <input type="text" class="form-control" id="inputName" name="txtCustomerName" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputName" class="control-label mb-10">Address</label>
                                                            <input type="text" class="form-control" id="inputName" name="txtCustomerAddress" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputName" class="control-label mb-10">Mobile</label>
                                                            <input type="number" class="form-control" id="inputName" name="txtCustomerMobile" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputName" class="control-label mb-10">Email</label>
                                                            <input type="text" class="form-control" id="inputName" name="txtCustomerEmail" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputName" class="control-label mb-10"> Password</label>
                                                            <input type="password" class="form-control" id="inputName" name="txtCustomerPassword" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputName" class="control-label mb-10">Gender</label>
                                                            <input type="text" class="form-control" id="inputName" name="txtCustomerGender" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputName" class="control-label mb-10">DOB</label>
                                                            <input type="date" class="form-control" id="inputName" name="txtCustomerDOB" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputName" class="control-label mb-10">Branch Id</label>
                                                            
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