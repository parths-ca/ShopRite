<?php

include "../class/connection.php";

$con = connect();
$customerresult = mysqli_query($con, " SELECT
    `customer`.*
    , `branch`.`Branch_name`
FROM
    `branch`
    INNER JOIN `customer` 
        ON (`branch`.`Branch_id` = `customer`.`Branch_id`)  ")or die(mysqli_error($con));

if (mysqli_num_rows($customerresult) > 0) {
    $customerresponse["customer_data"] = array();
    while ($customerrow = mysqli_fetch_assoc($customerresult)) {
        array_push($customerresponse["customer_data"], $customerrow);
    }
    $customerresponse["success"] = "1";
} else {
    $customerresponse["success"] = "0";
    $customerresponse["message"] = "No Records Found";
}
echo json_encode($customerresponse);
?>