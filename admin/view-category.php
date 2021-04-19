<?php 
include '../class/connection.php';
$con = connect();check_admin_login();




if (isset($_GET["did"])) {
    $did = $_GET["did"];
    $result = mysqli_query($con, "Delete from category where Category_id='{$did}'")or die(mysqli_error($con));
    if ($result) {
        header("location:view-category.php");
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
                            <h5 class="txt-dark">Category</h5>
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
                                                                <td> Images </td>
                                                                <td>Actions</td>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            
                                                            $result = mysqli_query($con, "Select * from category")or die(mysqli_error($con));
                                                            while ($row = mysqli_fetch_assoc($result)){
                                                                echo "<tr>";
                                                                echo "<td>{$row["Category_id"]}</td>";
                                                                echo "<td>{$row["Category_name"]}</td>";
                                                                echo "<td>{$row["Category_icon_url"]}</td>";
                                                                
                                                                echo "<td><a href='edit-category.php?eid={$row["Category_id"]}'>Edit</a> | <a href='?did={$row["Category_id"]}'>Delete</a></td>";
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