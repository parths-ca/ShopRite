<?php
include '../class/connection.php';
$con = connect();
?>


<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
    <center>
        <h2>Category Wise Product Report</h2>
        <form method="POST">
            <select class="form-control" id="inputName" name="txtCategoryId" required>
                <option> Select a Category </option>
                <?php
                $caid = mysqli_query($con, "Select * from category")or die(mysqli_error($con));
                while ($data = mysqli_fetch_assoc($caid)) {
                    echo "<option value='{$data["Category_id"]}'>{$data["Category_name"]}</option>";
                }
                ?>
            </select>
            <input type="submit" value="Show Report"/>
        </form>
    </center>
    <hr>
    <div class="datagrid">
        <?php
        if (isset($_POST["txtCategoryId"])) {
            $txtCategoryId = $_POST["txtCategoryId"];
            ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Product Id</th>
                        <th>Product Name</th>
                        <th>Product Description</th>
                        <th>Category Id</th>
                        <th>Price</th>
                        <th>Product Image</th>


                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result = mysqli_query($con, "SELECT
    `products`.*
FROM
    `products` 
      where Category_id='{$txtCategoryId}'")or die(mysqli_error($con));
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>{$row["Product_id"]}</td>";
                        echo "<td>{$row["Product_name"]}</td>";
                        echo "<td>{$row["Product_description"]}</td>";
                        echo "<td>{$row["Category_id"]}</td>";
                        echo "<td>{$row["Price"]}</td>";
                        echo "<td><img src='../{$row["Product_image"]}' height=100 width=100/></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
            <?php
        }
        ?>
    </div>
</body>
</html>
