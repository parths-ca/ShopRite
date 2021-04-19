<?php

include "../class/connection.php";

$con = connect();
$feedbackresult = mysqli_query($con, "  SELECT
    `feedback`.*
    , `customer`.`Customer_name`
FROM
    `customer`
    INNER JOIN `feedback` 
        ON (`customer`.`Customer_id` = `feedback`.`Customer_id`)")or die(mysqli_error($con));
if (mysqli_num_rows($feedbackresult) > 0) {
    $feedbackresponse["feedbackdata"] = array();

    while ($feedbackrow = mysqli_fetch_assoc($feedbackresult)) {
        array_push($feedbackresponse["feedbackdata"], $feedbackrow);
    }
    $feedbackresponse["success"] = "1";
} else {
    $feedbackresponse["success"] = "0";
    $feedbackresponse["message"] = "No Records Found";
}
echo json_encode($feedbackresponse);
?>