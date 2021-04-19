<?php

include "../class/connection.php";

$con = connect();
$arearesult = mysqli_query($con, "SELECT * FROM `area` ")or die(mysqli_error($con));
if (mysqli_num_rows($arearesult) > 0) {
    $arearesponse["area_data"] = array();
    while ($arearow = mysqli_fetch_assoc($arearesult)) {
        array_push($arearesponse["area_data"], $arearow);
    }
    $arearesponse["success"] = "1";
} else {
    $arearesponse["success"] = "0";
    $arearesponse["message"] = "No Records Found";
}
echo json_encode($arearesponse);
?>