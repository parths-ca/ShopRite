<?php

include '../class/connection.php';
$con = connect();
check_admin_login();


    if(isset($_GET["eid"]) && !empty($_GET["eid"])){
        $eid = $_GET["eid"];
        $result = mysqli_query($con, "Select * from payment where Payment_id='{$eid}'")or die(mysqli_error($con));
        $row = mysqli_fetch_assoc($result);
    }else{
        header("location:view-payment.php");
    }

if($_POST){
    $txtPaymentDate = $_POST["txtPaymentDate"];
    $txtPaymentAmt = $_POST["txtPaymentAmt"];
    $txtPaymentMode = $_POST["txtPaymentMode"];
    $txtPaymentStatus = $_POST["txtPaymentStatus"];
    $txtOrderId = $_POST["txtOrderId"];
    
    $result = mysqli_query($con, "UPDATE `payment` SET `Payment_date`='{$txtPaymentDate}',`Payment_amt`='{$txtPaymentAmt}',`Payment_mode`='{$txtPaymentMode}',`Payment_status`='{$txtPaymentStatus}',`Order_id`='{$txtOrderId}' WHERE Payment_id='{$eid}' ")or die(mysqli_error($con));
    if($result){
        header("location:view-payment.php");
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
                            <h5 class="txt-dark">Payments</h5>
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
                                                            <label for="inputName" class="control-label mb-10">Payment Date</label>
                                                            <input type="date" value="<?php echo $row["Payment_date"]; ?>" class="form-control" id="inputName" name="txtPaymentDate" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputName" class="control-label mb-10">Payment Amt</label>
                                                            <input type="number" value="<?php echo $row["Payment_amt"]; ?>" class="form-control" id="inputName" name="txtPaymentAmt" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputName" class="control-label mb-10">Payment Mode</label>
                                                            <input type="text" value="<?php echo $row["Payment_mode"]; ?>" class="form-control" id="inputName" name="txtPaymentMode" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputName" class="control-label mb-10">Payment Status</label>
                                                            <input type="text" value="<?php echo $row["Payment_status"]; ?>" class="form-control" id="inputName" name="txtPaymentStatus" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputName" class="control-label mb-10">Order Id</label>
                                                            <select class="form-control" id="inputName" name="txtOrderId" required>
                                                                <option>Select Order Id</option>
                                                                <?php
                                                                    $orid = mysqli_query($con, "Select * from `order`")or die(mysqli_error($con));
                                                                    while ($data = mysqli_fetch_assoc($orid)){
                                                                        echo "<option value='{$data["Order_id"]}'>{$data["Price"]}</option>";
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