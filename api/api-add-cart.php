<?php

include '../class/connection.php';
$con = connect();

if (isset($_POST["Customer_id"]) && isset($_POST["Product_id"]) && isset($_POST["Quantity"]) && isset($_POST["Price"])) {
    $user_id = $_POST["Customer_id"];
    $product_id = $_POST["Product_id"];
    $qty = $_POST["Quantity"];
    $price = $_POST["Price"];

    $result = mysqli_query($con, "Select * from cart where Customer_id='{$user_id}' and Product_id='{$product_id}'")or die(mysqli_error($con));
    if (mysqli_num_rows($result) == 1) {
        $result1 = mysqli_query($con, "Update `cart` set `Quantity`=Quantity + {$qty} where Customer_id='{$user_id}' and Product_id='{$product_id}'")or die(mysqli_error($con));
    } else {
        $result1 = mysqli_query($con, "INSERT INTO `cart`( `Customer_id`, `Product_id`, `Quantity`, `Price`) VALUES ('{$user_id}','{$product_id}','{$qty}','{$price}')")or die(mysqli_error($con));
    }
    if ($result1) {
        $response["success"] = 1;
        $response["message"] = "Product Added to Cart";
    } else {
        $response["success"] = 0;
        $response["message"] = "Query Error";
    }
} else {
    $response["success"] = 0;
    $response["message"] = "Field Missing";
}

echo json_encode($response);
