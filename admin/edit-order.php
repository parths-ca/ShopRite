<?php 

include '../class/connection.php';
$con = connect();
check_admin_login();


    if(isset($_GET["eid"]) && !empty($_GET["eid"])){
        $eid = $_GET["eid"];
        $result = mysqli_query($con, "Select * from `order` where Order_id='{$eid}'")or die(mysqli_error($con));
        $row = mysqli_fetch_assoc($result);
    }else{
        header("location:view-order.php");
    }

if($_POST){
    
    $txtOrderDate = $_POST["txtOrderDate"];
    $txtOrderStatus = $_POST["txtOrderStatus"];
    $txtCustomerId = $_POST["txtCustomerId"];
    $txtBranchId = $_POST["txtBranchId"];
    $txtEmployeeId = $_POST["txtEmployeeId"];
    
    $result = mysqli_query($con, "UPDATE `order` SET `Order_date`='{$txtOrderDate}',`Price`='{$txtOrderPrice}',`Customer_id`='{$txtCustomerId}',`Branch_id`='{$txtBranchId}',`Employee_id`='{$txtEmployeeId}',`Order_status`='{$txtOrderStatus}' WHERE  Order_id='{$eid}'")or die(mysqli_error($con));
    if($result){
        header("location:view-order.php");
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
                            <h5 class="txt-dark">Orders</h5>
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
                                                            <label for="inputName" class="control-label mb-10">Order Date</label>
                                                            <input value="<?php echo $row["Order_date"]; ?>" type="date" class="form-control" id="inputName" name="txtOrderDate" required>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label for="inputName" class="control-label mb-10">Order Status</label>
                                                            <input value="<?php echo $row["Order_status"]; ?>" type="text" class="form-control" id="inputName" name="txtOrderStatus" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputName" class="control-label mb-10">Customer Id</label>
                                                            <select class="form-control" id="inputName" name="txtCustomerId" required>
                                                                <option>Select Customer id</option>
                                                                <?php
                                                                    $cid = mysqli_query($con, "Select  * from customer")or die(mysqli_error($con));
                                                                    while ($data = mysqli_fetch_assoc($cid)){
                                                                        echo "<option value='{$data["Customer_id"]}'>{$data["Customer_name"]} {$data["doctor_lname"]}</option>";
                                        }
                                                                ?>
                                                            </select>
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
                                                        <div class="form-group">
                                                            <label for="inputName" class="control-label mb-10">Employee Id</label>
                                                            <select class="form-control" id="inputName" name="txtEmployeeId" required>
                                                                <option>Select Employee Id</option>
                                                                <?php
                                                                    $eid = mysqli_query($con, "Select * from employee")or die(mysqli_error($con));
                                                                    while ($data = mysqli_fetch_assoc($eid)){
                                                                        echo "<option value='{$data["Employee_id"]}'>{$data["Employee_name"]}</option>";
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