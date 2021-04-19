<?php

include '../class/connection.php';
$con = connect();

if (isset($_POST["Customer_mobile"])) {
    $Customer_mobile = mysqli_real_escape_string($con, $_POST["Customer_mobile"]);
    $result = mysqli_query($con, "SELECT * FROM `customer` where Customer_mobile='{$Customer_mobile}'")or die(mysqli_error($con));
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if (sendMail($row["Customer_email"], "Password Recovery", "Your Password is :" . $row["Customer_password"])) {
            $response["success"] = "1";
            $response["message"] = "Mail Sent";
        } else {
            $response["success"] = "0";
            $response["message"] = "Mail Sending Error.";
        }
    } else {
        $response["success"] = "0";
        $response["message"] = "Mobile Number not registered with us.";
    }
} else {
    $response["success"] = "0";
    $response["message"] = "Field Missing";
}

echo json_encode($response);
