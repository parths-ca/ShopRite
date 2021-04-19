<?php

include "../class/connection.php";

$con = connect();
$employee_typeresult = mysqli_query($con, " SELECT * FROM `employee_type`    ")or die(mysqli_error($con));

if (mysqli_num_rows($employee_typeresult) > 0) {
    $employee_typeresponse["employee_typedata"] = array();
    while ($employee_typerow = mysqli_fetch_assoc($employee_typeresult)) {
        array_push($employee_typeresponse["employee_typedata"], $employee_typerow);
    }
    $employee_typeresponse["success"] = "1";
} else {
    $employee_typeresponse["success"] = "0";
    $employee_typeresponse["message"] = "No Records Found";
}
echo json_encode($employee_typeresponse);
?>