<?php

include "../class/connection.php";

$con = connect();
$paymentresult = mysqli_query($con, " SELECT
    `payment`.*
    , `order`.`Order_date`
FROM
    `order`
    INNER JOIN `payment` 
        ON (`order`.`Order_id` = `payment`.`Order_id`) ")or die(mysqli_error($con));
if (mysqli_num_rows($paymentresult) > 0) {
    $paymentresponse["paymentdata"] = array();

    while ($paymentrow = mysqli_fetch_assoc($paymentresult)) {
        array_push($paymentresponse["paymentdata"], $paymentrow);
    }
    $paymentresponse["success"] = "1";
} else {
    $paymentresponse["success"] = "0";
    $paymentresponse["message"] = "No Records Found";
}
echo json_encode($paymentresponse);
?>