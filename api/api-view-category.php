<?php

include "../class/connection.php";

$con = connect();
$categoryresult = mysqli_query($con, " SELECT * FROM `category` ")or die(mysqli_error($con));

if (mysqli_num_rows($categoryresult) > 0) {
    $categoryresponse["category_data"] = array();
    while ($categoryrow = mysqli_fetch_assoc($categoryresult)) {
        array_push($categoryresponse["category_data"], $categoryrow);
    }
    $categoryresponse["success"] = "1";
} else {
    $categoryresponse["success"] = "0";
    $categoryresponse["message"] = "No Records Found";
}
echo json_encode($categoryresponse);
?>