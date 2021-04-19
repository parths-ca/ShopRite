<?php

include "../class/connection.php";

$con = connect();
$adminresult = mysqli_query($con, "SELECT * FROM `admin` ")or die(mysqli_error($con));
if (mysqli_num_rows($adminresult) > 0) {
    $adminresponse["admin_data"] = array();
    while ($adminrow = mysqli_fetch_assoc($adminresult)) {
        array_push($adminresponse["admin_data"], $adminrow);
    }
    $adminresponse["success"] = "1";
} else {
    $adminresponse["success"] = "0";
    $adminresponse["message"] = "No Records Found";
}
echo json_encode($adminresponse);
?>  