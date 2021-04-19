<?php

include '../class/connection.php';
$con = connect();

if (isset($_POST["cart_id"])) {
    $cart_id = $_POST["cart_id"];
    $result = mysqli_query($con, "Delete from cart where cart_id='{$cart_id}'")or die(mysqli_error($con));

    if ($result) {
        $response["success"] = 1;
        $response["message"] = "Product Removed from Cart";
    } else {
        $response["success"] = 0;
        $response["message"] = "Query Error";
    }
} else {
    $response["success"] = 0;
    $response["message"] = "Field Missing";
}

echo json_encode($response);
