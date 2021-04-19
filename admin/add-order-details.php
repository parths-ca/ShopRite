<?php

include '../class/connection.php';
$con = connect();
check_admin_login();



if($_POST){
    
    $txtOrderId = $_POST["txtOrderId"];
    $txtProductId = $_POST["txtProductId"];
    $txtQuantity = $_POST["txtQuantity"];
    $txtOrderPrice = $_POST["txtOrderPrice"];

    
    $result = mysqli_query($con, "INSERT INTO `order_details`( `Order_id`, `Product_id`, `Quantity`, `Price`) VALUES ('{$txtOrderId}','{$txtProductId}','{$txtQuantity}','{$txtOrderPrice}')")or die(mysqli_error($con));
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
                                                            <label for="inputName" class="control-label mb-10">Order id</label>
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
                                                        <div class="form-group">
                                                            <label for="inputName" class="control-label mb-10">Product Id</label>
                                                            <select class="form-control" id="inputName" name="txtProductId" required>
                                                                <option>Select Product Id</option>
                                                                <?php
                                                                       $pid = mysqli_query($con, "Select * from products")or die(mysqli_error($con));
                                                                       while ($data = mysqli_fetch_assoc($pid)){
                                                                           echo "<option value='{$data["Product_id"]}'>{$data["Product_name"]}</option>";
                                                                       }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputName" class="control-label mb-10">Quantity</label>
                                                            <input type="number" class="form-control" id="inputName" name="txtQuantity" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputName" class="control-label mb-10">Order Price</label>
                                                            <input type="number" class="form-control" id="inputName" name="txtOrderPrice" required>
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