<?php

include "../class/connection.php";

$con = connect();
$employeeresult = mysqli_query($con, " SELECT
    `employee`.*
    , `employee_type`.`Employee_type_name`
    , `branch`.`Branch_name`
FROM
    `employee_type`
    INNER JOIN `employee` 
        ON (`employee_type`.`Employee_type_id` = `employee`.`Employee_type_id`)
    INNER JOIN `branch` 
        ON (`branch`.`Branch_id` = `employee`.`Branch_id`)   ")or die(mysqli_error($con));

if (mysqli_num_rows($employeeresult) > 0) {
    $employeeresponse["employee_data"] = array();
    while ($employeerow = mysqli_fetch_assoc($employeeresult)) {
        array_push($employeeresponse["employee_data"], $employeerow);
    }
    $employeeresponse["success"] = "1";
} else {
    $employeeresponse["success"] = "0";
    $employeeresponse["message"] = "No Records Found";
}
echo json_encode($employeeresponse);
?>