<?php 
include '../class/connection.php';
$con = connect();
check_admin_login();


if (isset($_GET["did"])) {
    $did = $_GET["did"];
    $result = mysqli_query($con, "Delete from order_details where Order_details_id ='{$did}'")or die(mysqli_error($con));
    if ($result) {
        header("location:view-order-details.php");
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
                            <h5 class="txt-dark">Order Details</h5>
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
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <td>Order Details  Id</td>
                                                                <td>Order Id</td>
                                                                <td>Order Date</td>
                                                                <td>Product Name</td>
                                                                <td>Quantity</td>
                                                                <td>Price</td>
                                                                
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            
                                                            $result = mysqli_query($con, "SELECT
    `order_details`.*
    , `order`.`Order_date`
    , `products`.`Product_name`
FROM
    `order`
    INNER JOIN `order_details` 
        ON (`order`.`Order_id` = `order_details`.`Order_id`)
    INNER JOIN `products` 
        ON (`products`.`Product_id` = `order_details`.`Product_id`)where `order_details`.`Order_id` = '{$_GET["oid"]}';")or die(mysqli_error($con));
                                                            while ($row = mysqli_fetch_assoc($result)){
                                                                echo "<tr>";
                                                                echo "<td>{$row["Order_details_id"]}</td>";
                                                                echo "<td>{$row["Order_id"]}</td>";
                                                                echo "<td>{$row["Order_date"]}</td>";
                                                                echo "<td>{$row["Product_name"]}</td>";
                                                                echo "<td>{$row["Quantity"]}</td>";
                                                                echo "<td>{$row["Price"]}</td>";
                                                                echo "</tr>";
                                                            }
                                                            
                                                            ?>
                                                        </tbody>
                                                    </table>
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