<?php

include '../class/connection.php';
$con = connect();

if (isset($_POST["Customer_id"]) && (isset($_POST["Customer_password"])) && (isset($_POST["new_password"])) && (isset($_POST["confirm_password"]))) {
    $Customer_id = mysqli_real_escape_string($con, $_POST["Customer_id"]);
    $old_password = mysqli_real_escape_string($con, $_POST["Customer_password"]);
    $new_password = mysqli_real_escape_string($con, $_POST["new_password"]);
    $confirm_password = mysqli_real_escape_string($con, $_POST["confirm_password"]);

    $result = mysqli_query($con, "Select * from `customer` where `Customer_id`='{$Customer_id}'")or die(mysqli_error($con));
    $row = mysqli_fetch_assoc($result);

    if ($row["Customer_password"] == $old_password) {
        if ($new_password == $confirm_password) {
            $result = mysqli_query($con, "UPDATE `customer` SET Customer_password='{$new_password}' WHERE `Customer_id`='{$Customer_id}'")or die(mysqli_error($con));
            $response["success"] = "1";
            $response["message"] = "Password Upadated";
        } else {
            $response["success"] = "0";
            $response["message"] = "New And Confirm Password Does Not Match";
        }
    } else {
        $response["success"] = "0";
        $response["message"] = "Incorrect Old Password ";
    }
} else {
    $response["success"] = "0";
    $response["message"] = "Field Missing";
}
echo json_encode($response);
