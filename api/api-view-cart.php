<?php

include "../class/connection.php";

$con = connect();
$categoryresult = mysqli_query($con, " SELECT
    `cart`.*
    , `customer`.`Customer_name`
    , `products`.*
FROM
    `customer`
    INNER JOIN `cart` 
        ON (`customer`.`Customer_id` = `cart`.`Customer_id`)
    INNER JOIN `products` 
        ON (`products`.`Product_id` = `cart`.`Product_id`) ")or die(mysqli_error($con));

if (mysqli_num_rows($categoryresult) > 0) {
    $categoryresponse["cart_data"] = array();
    while ($categoryrow = mysqli_fetch_assoc($categoryresult)) {
        array_push($categoryresponse["cart_data"], $categoryrow);
    }
    $categoryresponse["success"] = "1";
} else {
    $categoryresponse["success"] = "0";
    $categoryresponse["message"] = "No Records Found";
}
echo json_encode($categoryresponse);
?>