<?php

include '../class/connection.php';
$con = connect();

if (isset($_POST["Customer_id"])) {
    $Customer_id = $_POST["Customer_id"];
    $d = date('Y-m-d');
    $branch_id = '1';
    $order_status = "In Process";

    $result = mysqli_query($con, "INSERT INTO `order`( `Order_date`, `Customer_id`, `Branch_id`,  `Order_status`) VALUES ('{$d}','{$Customer_id}','{$branch_id}','{$order_status}')")or die(mysqli_error($con));
    if ($result) {
        $oid = mysqli_insert_id($con);
        $cartresult = mysqli_query($con, "Select * from cart where Customer_id='{$Customer_id}'")or die(mysqli_error($con));
        while ($row = mysqli_fetch_assoc($cartresult)) {
            $result = mysqli_query($con, "INSERT INTO `order_details`(`Order_id`, `Product_id`, `Quantity`, `Price`) VALUES ('{$oid}','{$row["Product_id"]}','{$row["Quantity"]}','{$row["Price"]}')")or die(mysqli_error($con));
        }
        $result = mysqli_query($con, "Delete from cart where Customer_id='{$Customer_id}'")or die(mysqli_error($con));
        $response["success"] = 1;
        $response["message"] = "Order Placed Successfully";
    } else {
        $response["success"] = 0;
        $response["message"] = "Query Error";
    }
} else {
    $response["success"] = 0;
    $response["message"] = "Field Missing";
}

echo json_encode($response);
