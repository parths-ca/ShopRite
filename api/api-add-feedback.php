<?php

include '../class/connection.php';
$con = connect();


if (isset($_POST["Feedback_description"]) && isset($_POST["Feedback_ratings"]) && isset($_POST["Customer_id"])) {

    $FeedbackDescription = $_POST["Feedback_description"];
    $FeedbackRatings = $_POST["Feedback_ratings"];
    $CustomerId = $_POST["Customer_id"];


    $result = mysqli_query($con, "INSERT INTO `feedback`(`Feedback_description`, `Feedback_ratings`, `Customer_id`) VALUES ('{$FeedbackDescription}','{$FeedbackRatings}','{$CustomerId}')")or die(mysqli_error($con));
    if ($result == 1) {
        $response["success"] = 1;
        $response["message"] = "Feedback added Successfull";
    } else {
        $response["success"] = 0;
        $response["message"] = "Invalid Details";
    }
} else {
    $response["success"] = 0;
    $response["message"] = "Field Missing";
}
echo json_encode($response);
?>