<?php

include "../class/connection.php";

$con = connect();
$product_unitresult = mysqli_query($con, " SELECT * FROM `product_unit` ")or die(mysqli_error($con));
if (mysqli_num_rows($product_unitresult) > 0) {
    $product_unitresponse["product_unitdata"] = array();

    while ($product_unitrow = mysqli_fetch_assoc($product_unitresult)) {
        array_push($product_unitresponse["product_unitdata"], $product_unitrow);
    }
    $product_unitresponse["success"] = "1";
} else {
    $product_unitresponse["success"] = "0";
    $product_unitresponse["message"] = "No Records Found";
}
echo json_encode($product_unitresponse);
?>