<?php

include "../class/connection.php";

$con = connect();
$unitresult = mysqli_query($con, " SELECT * FROM `unit` ")or die(mysqli_error($con));
if (mysqli_num_rows($unitresult) > 0) {
    $unitresponse["unitdata"] = array();

    while ($unitrow = mysqli_fetch_assoc($unitresult)) {
        array_push($unitresponse["unitdata"], $unitrow);
    }
    $unitresponse["success"] = "1";
} else {
    $unitresponse["success"] = "0";
    $unitresponse["message"] = "No Records Found";
}
echo json_encode($unitresponse);
?>