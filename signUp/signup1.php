<?php
//register.php

include('../connect.php');

if(isset($_SESSION['id']))
{
 header("location:index.php");
}

$message = '';

if(isset($_POST["submit"]))
{
$verifyemail = "
 SELECT * FROM users WHERE emailId='$_POST[emailid]'";
 $result=$conn->query($verifyemail);
//  $statement->execute(
//   array(
//    ':emailId' => $_POST['emailId']
//   )
//  );
 //$no_of_row = $statement->rowCount();
 if ($result-> num_rows > 0) {
    echo "<script>alert('Email is already Registered, Please try another')</script>";
   
    header("refresh:1; url=./../index.php");
}
 else
 {
  $activation_code = md5(rand());
  $userQuery= "
  INSERT INTO `users`(`username`, `password`, `emailID`, 'activation_code')
                 VALUES ('$_POST[username]','$_POST[password]','$_POST[emailid]','$activation_code')
  ";
  $statement = $conn->query($userQuery);
//   $statement->execute(
//    array(
//     ':username'   => $_POST['username'],
//     ':emailId'   => $_POST['emailId'],
//     ':activation_code' => $activation_code,
//     ':email_status' => 'not verified'
//    )
//   );
  $result = $statement->fetch_All();
  if(isset($result))
  {
   $base_url = "http://localhost/SearchEngine/email-address-verification-script-using-php/";
   $mail_body = "
   <p>Hi ".$_POST['username'].",</p>
   <p>Thanks for Registration. Your password is ".$_POST['password'].", This password will work only after your email verification.</p>
   <p>Please Open this link to verified your email address - ".$base_url."verification.php?activation_code=".$activation_code."
   <p>Best Regards,<br />MovieSearch</p>
   ";
   require 'class/class.phpmailer.php';
   $mail = new PHPMailer;
   $mail->IsSMTP();        //Sets Mailer to send message using SMTP
   $mail->Host = 'smtpout.secureserver.net';  //Sets the SMTP hosts of your Email hosting, this for Godaddy
   $mail->Port = '80';        //Sets the default SMTP server port
   $mail->SMTPAuth = true;       //Sets SMTP authentication. Utilizes the Username and Password variables
   $mail->Username = 'xxxxxxxx';     //Sets SMTP username
   $mail->Password = 'xxxxxxxx';     //Sets SMTP password
   $mail->SMTPSecure = '';       //Sets connection prefix. Options are "", "ssl" or "tls"
   $mail->From = 'rdump001@odu.edu';   //Sets the From email address for the message
   $mail->FromName = 'MovieSearch';     //Sets the From name of the message
   $mail->AddAddress($_POST['emailId'], $_POST['username']);  //Adds a "To" address   
   $mail->WordWrap = 50;       //Sets word wrapping on the body of the message to a given number of characters
   $mail->IsHTML(true);       //Sets message type to HTML    
   $mail->Subject = 'Email Verification';   //Sets the Subject of the message
   $mail->Body = $mail_body;       //An HTML or plain text message body
   if($mail->Send())        //Send an Email. Return true on success or false on error
   {
    $message = '<label class="text-success">Register Done, Please check your mail.</label>';
   }
  }
 }
}

?>