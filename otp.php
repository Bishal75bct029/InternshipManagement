<?php 
  require_once 'core/init.php';  
  require 'PHPMailerAutoload.php';
//   echo "hi";
if($_SERVER['REQUEST_METHOD'] == "POST"){

    $email = $_POST['email'];
    $sql = "Select email from customers where email = '$email'";
    $execute = $db->query($sql);
    $execute = mysqli_num_rows($execute);
    if($execute==1){
        $rand = rand(0000,9999);
        $updateOtpQuery = "Update customers set otp = '$rand' where email = '$email'";
        $result = $db->query($updateOtpQuery);
        
        echo "yes";
    }
    
}
$phpmailer = new PHPMailer();
$phpmailer->isSMTP();
$phpmailer->Host = 'smtp.mailtrap.io';
$phpmailer->SMTPAuth = true;
$phpmailer->Port = 2525;
$phpmailer->Username = '5b42aeef229f18';
$phpmailer->Password = '08cd8b3b2977b9';
// $phpmailer->addReplyTo('075bct029.bishal@pcampus.edu.np');
$phpmailer->isHTML(true);
$phpmailer->addAddress('lamichhanebishal50@gmail.com');
$phpmailer->Subject = "Password Reset";
$phpmailer->Body = "hi i am bishal lamichhane";
$phpmailer->AltBody = 'This is the body in plain text for non-HTML mail clients';
if(!$phpmailer->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $phpmailer->ErrorInfo;
} else {
    echo 'Message has been sent';
}