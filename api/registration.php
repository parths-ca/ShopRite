<?php

include '../class/connection.php';
$con = connect();


if (isset($_POST["Customer_name"]) && isset($_POST["Customer_address"]) && isset($_POST["Customer_mobile"]) && isset($_POST["Customer_email"]) && isset($_POST["Customer_password"]) && isset($_POST["Customer_gender"]) && isset($_POST["Customer_dob"])) {

    $Customer_name = $_POST["Customer_name"];
    $Customer_address = $_POST["Customer_address"];
    $Customer_mobile = $_POST["Customer_mobile"];
    $Customer_email = $_POST["Customer_email"];
    $Customer_password = $_POST["Customer_password"];
    $Customer_gender = $_POST["Customer_gender"];
    $Customer_dob = $_POST["Customer_dob"];



    $result = mysqli_query($con, "INSERT INTO `customer`(`Customer_name`, `Customer_address`, `Customer_mobile`, `Customer_email`, `Customer_password`, `Customer_gender`, `Customer_dob`) VALUES ('{$Customer_name}','{$Customer_address}','{$Customer_mobile}','{$Customer_email}','{$Customer_password}','{$Customer_gender}','{$Customer_dob}')")or die(mysqli_error($con));
    if ($result == 1) {
        $response["success"] = 1;
        $response["message"] = "Registration Successfull";
    } else {
        $response["success"] = 0;
        $response["message"] = "Invalid Registration Details";
    }
} else {
    $response["success"] = 0;
    $response["message"] = "Field Missing";
}
echo json_encode($response);
?>