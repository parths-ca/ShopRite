
<?php

include "../class/connection.php";

$con = connect();
$order_detailsresult = mysqli_query($con, " SELECT
    `order_details`.*
    , `products`.`Product_name`
FROM
    `products`
    INNER JOIN `order_details` 
        ON (`products`.`Product_id` = `order_details`.`Product_id`) ")or die(mysqli_error($con));
if (mysqli_num_rows($order_detailsresult) > 0) {
    $order_detailsresponse["order_detailsdata"] = array();

    while ($order_detailsrow = mysqli_fetch_assoc($order_detailsresult)) {
        array_push($order_detailsresponse["order_detailsdata"], $order_detailsrow);
    }
    $order_detailsresponse["success"] = "1";
} else {
    $order_detailsresponse["success"] = "0";
    $order_detailsresponse["message"] = "No Records Found";
}
echo json_encode($order_detailsresponse);
?>