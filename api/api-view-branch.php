<?php

include "../class/connection.php";

$con = connect();
$branchresult = mysqli_query($con, " SELECT
    * 
    , `area`.`Area_name`
FROM
    `area`
    INNER JOIN `branch` 
        ON (`area`.`Area_id` = `branch`.`Area_id`) ")or die(mysqli_error($con));

if (mysqli_num_rows($branchresult) > 0) {
    $branchresponse["branch_data"] = array();
    while ($branchrow = mysqli_fetch_assoc($branchresult)) {
        array_push($branchresponse["branch_data"], $branchrow);
    }
    $branchresponse["success"] = "1";
} else {
    $branchresponse["success"] = "0";
    $branchresponse["message"] = "No Records Found";
}
echo json_encode($branchresponse);
?>