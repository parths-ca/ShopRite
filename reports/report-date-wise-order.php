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
            <input type="date" value="<?php echo date('Y-m-d') ?>" name="txtDate"/>
            <input type="submit" value="Show Report"/>
        </form>
    </center>
    <hr>
    <div class="datagrid">
        <?php
        if (isset($_POST["txtDate"])) {
            $txtDate = $_POST["txtDate"];
            ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Order Id</th>
                        <th>Order Date</th>
                        <th>Customer Id</th>
                        <th>Branch Name</th>
                        <th>Employee Name</th>
                        <th>Order Status</th>
                       
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result = mysqli_query($con, "SELECT
    `order`.*
    , `customer`.`Customer_name`
    , `branch`.`Branch_name`
    , `employee`.`Employee_name`
FROM
    `customer`
    INNER JOIN `order` 
        ON (`customer`.`Customer_id` = `order`.`Customer_id`)
    INNER JOIN `branch` 
        ON (`branch`.`Branch_id` = `order`.`Branch_id`)
    INNER JOIN `employee` 
        ON (`employee`.`Employee_id` = `order`.`Employee_id`) where Order_date = '{$txtDate}';")or die(mysqli_error($con));
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>{$row["Order_id"]}</td>";
                        echo "<td>{$row["Order_date"]}</td>";
                        echo "<td>{$row["Customer_name"]}</td>";
                        echo "<td>{$row["Branch_name"]}</td>";
                        echo "<td>{$row["Employee_name"]}</td>";
                        echo "<td>{$row["Order_status"]}</td>";
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
