<?php

include "../class/connection.php";

$con = connect();
$orderresult = mysqli_query($con, " SELECT
    `order`.*
    , `customer`.`Customer_name`
    , `branch`.`Branch_name`
    , `employee`.`Employee_name`
FROM
    `branch`
    INNER JOIN `order` 
        ON (`branch`.`Branch_id` = `order`.`Branch_id`)
    INNER JOIN `employee` 
        ON (`employee`.`Employee_id` = `order`.`Employee_id`)
    INNER JOIN `customer` 
        ON (`customer`.`Customer_id` = `order`.`Customer_id`)")or die(mysqli_error($con));
if (mysqli_num_rows($orderresult) > 0) {
    $orderresponse["orderdata"] = array();

    while ($orderrow = mysqli_fetch_assoc($orderresult)) {
        array_push($orderresponse["orderdata"], $orderrow);
    }
    $orderresponse["success"] = "1";
} else {
    $orderresponse["success"] = "0";
    $orderresponse["message"] = "No Records Found";
}
echo json_encode($orderresponse);
?>