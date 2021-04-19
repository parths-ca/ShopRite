<?php
function connect(){
$con = mysqli_connect("localhost", "root", "", "shoprite");
return $con;
}

function check_admin_login(){
    session_start();
    if(!isset($_SESSION["Admin_id"])){
        header("location:admin-login.php");
    }
}

function sendMail($to, $subject, $body) {
    require '../vendor/autoload.php';

    $mail = new \PHPMailer\PHPMailer\PHPMailer(true);                              // Passing `true` enables exceptions
    try {
        //Server settings
        $mail->SMTPDebug = 0;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'shoprite.shreenath@gmail.com';                 // SMTP username
        $mail->Password = 'shopshreenath.2018';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to
        //Recipients
        $mail->setFrom('shoprite.shreenath@gmail.com', 'Shreenath');
        $mail->addAddress($to, $to);     // Add a recipient
        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AltBody = $body;

        $mail->send();
        return 1;
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        return 0;
    }
}