<?php 

include '../class/connection.php';
$con = connect();
check_admin_login();






if(isset($_GET["eid"]) && !empty($_GET["eid"])){
    $eid = $_GET["eid"];
    $result = mysqli_query($con, "Select * from admin where Admin_id='{$eid}'")or die(mysqli_error($con));
    $row = mysqli_fetch_assoc($result);
}else{
    header("location:view-admin.php");
}






if($_POST){
    $txtAdminName = $_POST["txtAdminName"];
    $txtAdminEmail= $_POST["txtAdminEmail"];
    $txtAdminPassword = $_POST["txtAdminPassword"];
    $txtAdminContact = $_POST["txtAdminContact"];
            
    
    
    $result = mysqli_query($con, "UPDATE `admin` SET `Admin_name`= '{$txtAdminName}',`Admin_email`= '{$txtAdminEmail}',`Contact_no`= '{$txtAdminContact}' WHERE Admin_id='{$eid}' ")or die(mysqli_error($con));
    if($result){
        header("location:view-admin.php");
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
                            <h5 class="txt-dark">Admin</h5>
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
                                                            <input value="<?php echo $row["Admin_name"]; ?>" type="text" class="form-control" id="inputName" name="txtAdminName" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputName" class="control-label mb-10">Email</label>
                                                            <input value="<?php echo $row["Admin_email"]; ?>" type="text" class="form-control" id="inputName" name="txtAdminEmail" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputName" class="control-label mb-10">Contact</label>
                                                            <input value="<?php echo $row["Contact_no"]; ?>" type="number" class="form-control" id="inputName" name="txtAdminContact" required>
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