<?php

include "../class/connection.php";
$con = connect();

if (isset($_POST["Customer_mobile"]) && isset($_POST["Customer_password"])) {

    $Customer_mobile = $_POST["Customer_mobile"];
    $Customer_password = $_POST["Customer_password"];
    $result = mysqli_query($con, "SELECT * FROM `customer` WHERE `Customer_mobile`='{$Customer_mobile}' AND `Customer_password`='{$Customer_password}'")or die(mysqli_error($con));

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $response["customer_data"] = array();
        array_push($response["customer_data"], $row);
        $response["success"] = 1;
    } else {
        $response["success"] = 0;
        $response["message"] = "Invalid Login Details";
    }
} else {
    $response["success"] = 0;
    $response["message"] = "Field Missing";
}
echo json_encode($response);
