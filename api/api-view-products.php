<?php

include "../class/connection.php";
$con = connect();
if (isset($_POST["Category_id"])) {
    $Category_id = $_POST["Category_id"];
    $productsresult = mysqli_query($con, " SELECT
    `products`.*
    , `category`.`Category_name`
FROM
    `category`
    INNER JOIN `products` 
        ON (`category`.`Category_id` = `products`.`Category_id`) where `products`.Category_id='{$Category_id}' ")or die(mysqli_error($con));
    if (mysqli_num_rows($productsresult) > 0) {
        $response["productsdata"] = array();
        while ($productsrow = mysqli_fetch_assoc($productsresult)) {
            array_push($response["productsdata"], $productsrow);
        }
        $response["success"] = "1";
    } else {
        $response["success"] = "0";
        $response["message"] = "No Records Found";
    }
} else {
    $response["success"] = "0";
    $response["message"] = "Field Missing";
}
echo json_encode($response);
