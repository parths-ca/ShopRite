<?php 
include '../class/connection.php';
$con = connect();
check_admin_login();


if (isset($_GET["did"])) {
    $did = $_GET["did"];
    $result = mysqli_query($con, "Delete from branch where Branch_id='{$did}'")or die(mysqli_error($con));
    if ($result) {
        header("location:view-branch.php");
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
                            <h5 class="txt-dark">Branch</h5>
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
                                                                <td>Id</td>
                                                                <td>Name</td>
                                                                <td>Address</td>
                                                                <td>Mobile</td>
                                                                <td>Email</td>
                                                                <td>Area Name</td>
                                                                <td>Actions</td>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            
                                                            $result = mysqli_query($con, "SELECT
    `branch`.*
    , `area`.`Area_name`
FROM
    `area`
    INNER JOIN `branch` 
        ON (`area`.`Area_id` = `branch`.`Area_id`);")or die(mysqli_error($con));
                                                            while ($row = mysqli_fetch_assoc($result)){
                                                                echo "<tr>";
                                                                echo "<td>{$row["Branch_id"]}</td>";
                                                                echo "<td>{$row["Branch_name"]}</td>";
                                                                echo "<td>{$row["Branch_address"]}</td>";
                                                                echo "<td>{$row["Branch_mobile"]}</td>";
                                                                echo "<td>{$row["Branch_email"]}</td>";
                                                                echo "<td>{$row["Area_name"]}</td>";
                                                                echo "<td><a href='edit-branch.php?eid={$row["Branch_id"]}'>Edit</a> | <a href='?did={$row["Branch_id"]}'>Delete</a></td>";
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