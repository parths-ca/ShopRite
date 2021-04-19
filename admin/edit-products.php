<?php
include '../class/connection.php';
$con = connect();
check_admin_login();


if (isset($_GET["eid"]) && !empty($_GET["eid"])) {
    $eid = $_GET["eid"];
    $result = mysqli_query($con, "Select * from products where Product_id='{$eid}'")or die(mysqli_error($con));
    $row = mysqli_fetch_assoc($result);
} else {
    header("location:view-products.php");
}

if ($_POST) {

    $txtProductName = mysqli_real_escape_string($con, $_POST["txtProductName"]);
    $txtProductDescription = $_POST["txtProductDescription"];
    $txtCategoryId = $_POST["txtCategoryId"];
    $txtProductImage = $_FILES["txtProductImage"]["name"];
    $txtPrice = $_POST["txtPrice"];

    if ($txtProductImage == "") {
        $txtProductImage = $row["Product_image"];
    } else {
        $txtProductImage = "images/product-images/" . time() . ".png";
        move_uploaded_file($_FILES["txtProductImage"]["tmp_name"], "../" . $txtProductImage);
    }

    $result = mysqli_query($con, "UPDATE `products` SET `Product_name`='{$txtProductName}',`Product_description`='{$txtProductDescription}',`Category_id`='{$txtCategoryId}',`Product_image`='{$txtProductImage}',`Price`='{$txtPrice}' WHERE Product_id='{$eid}' ")or die(mysqli_error($con));
    if ($result) {
        header("location:view-products.php");
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
                            <h5 class="txt-dark">Products</h5>
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
                                                    <form enctype="multipart/form-data" data-toggle="validator" method="POST" role="form">

                                                        <div class="form-group">
                                                            <label for="inputName" class="control-label mb-10">Product Name</label>
                                                            <input value="<?php echo $row["Product_name"]; ?>" type="text" class="form-control" id="inputName" name="txtProductName" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputName" class="control-label mb-10">Product Description</label>
                                                            <input value="<?php echo $row["Product_description"]; ?>" type="text" class="form-control" id="inputName" name="txtProductDescription" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputName" class="control-label mb-10">Category Id</label>
                                                            <select class="form-control" id="inputName" name="txtCategoryId" required>
                                                                <option> Select a Category </option>
                                                                <?php
                                                                $caid = mysqli_query($con, "Select * from category")or die(mysqli_error($con));
                                                                while ($data = mysqli_fetch_assoc($caid)) {
                                                                    $selected = $data["Category_id"] == $row["Category_id"]?"selected":"";
                                                                    echo "<option value='{$data["Category_id"]}' {$selected}>{$data["Category_name"]}</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputName" class="control-label mb-10">Product Image</label>
                                                            <input  type="file" class="form-control" id="inputName" name="txtProductImage" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputName" class="control-label mb-10">Price</label>
                                                            <input value="<?php echo $row["Price"]; ?>" type="number" class="form-control" id="inputName" name="txtPrice" required>
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