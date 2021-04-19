<?php

include "../class/connection.php";

$con = connect();
$product_branchresult = mysqli_query($con, " SELECT
    `product_branch`.*
    , `branch`.`Branch_name`
    , `products`.`Product_name`
FROM
    `products`
    INNER JOIN `product_branch` 
        ON (`products`.`Product_id` = `product_branch`.`Product_id`)
    INNER JOIN `branch` 
        ON (`branch`.`Branch_id` = `product_branch`.`Branch_id`) ")or die(mysqli_error($con));
if (mysqli_num_rows($product_branchresult) > 0) {
    $product_branchresponse["product_branchdata"] = array();

    while ($product_branchrow = mysqli_fetch_assoc($product_branchresult)) {
        array_push($product_branchresponse["product_branchdata"], $product_branchrow);
    }
    $product_branchresponse["success"] = "1";
} else {
    $product_branchresponse["success"] = "0";
    $product_branchresponse["message"] = "No Records Found";
}
echo json_encode($product_branchresponse);
?>