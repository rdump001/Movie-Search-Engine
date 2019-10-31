<?php
//<!--Start session-->
session_start();
include('../connect.php');

use PHPMailer\PHPMailer\PHPMailer;
require '/Applications/XAMPP/vendor/autoload.php';

require '/Applications/XAMPP/xamppfiles/htdocs/SearchEngine/includes/PHPMailer/src/PHPMailer.php';
require '/Applications/XAMPP/xamppfiles/htdocs/SearchEngine/includes/PHPMailer/src/SMTP.php';

//<!--Check user inputs-->
//    <!--Define error messages-->
$missingUsername = '<p><strong>Please enter a username!</strong></p>';
 $missingEmail = '<p><strong>Please enter your email address!</strong></p>';
$invalidEmail = '<p><strong>Please enter a valid email address!</strong></p>';
$missingPassword = '<p><strong>Please enter a Password!</strong></p>';
$invalidPassword = '<p><strong>Your password should be at least 6 characters long and inlcude one capital letter and one number!</strong></p>';
$differentPassword = '<p><strong>Passwords don\'t match!</strong></p>';
$missingPassword2 = '<p><strong>Please confirm your password</strong></p>';
$errors='';
//Get username
if(empty($_POST["username"])){
  $errors .= $missingUsername;
}else{
    $username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
}
//Get email
if(empty($_POST["email"])){
    $errors .= $missingEmail;
}else{
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors .= $invalidEmail;
    }
}
//Get passwords
if(empty($_POST["password"])){
    $errors .= $missingPassword;
}else if(!(strlen($_POST["password"])>6
         and preg_match('/[A-Z]/',$_POST["password"])
         and preg_match('/[0-9]/',$_POST["password"])
        )
       ){
    $errors .= $invalidPassword;
}
//If there are any errors print error
if($errors){
    $resultMessage = '<div class="alert alert-danger">' . $errors .'</div>';
    echo $resultMessage;
    exit;
}
//no errors

//Prepare variables for the queries
$username = mysqli_real_escape_string($conn, $username);
$email = mysqli_real_escape_string($conn, $email);
//$password = mysqli_real_escape_string($conn, $password);

$password = mysqli_real_escape_string($conn, $_POST['password']);

//$password = md5($password);
//$password = hash('sha256', $password);

//If username exists in the user table print error
$sql = "SELECT * FROM user WHERE username = '$username'";
$result = mysqli_query($conn, $sql);
if(!$result){
    echo '<div class="alert alert-danger">Error running the query!</div>';
//    echo '<div class="alert alert-danger">' . mysqli_error($conn) . '</div>';
    exit;
}
$results = mysqli_num_rows($result);
if($results){
    #echo '<div class="alert alert-danger">That username is already registered. Do you want to log in?</div>';  exit;
    echo "<script>alert (\"Username already Exists\")</script>";

                header("refresh:1; url=./../index.php");
}

//If email exists in the user table print error
$sql = "SELECT * FROM user WHERE emailId = '$email'";
$result = mysqli_query($conn, $sql);
if(!$result){
    #echo '<div class="alert alert-danger">Error running the query!</div>'; exit;
    echo "<script>alert (\"Error running the query!\")</script>";

                header("refresh:1; url=./../index.php");
    
}
$results = mysqli_num_rows($result);
if($results){
    #echo '<div class="alert alert-danger">That email is already registered. Do you want to log in?</div>';  exit;

    echo "<script>alert (\"Email is already registered\")</script>";

                header("refresh:1; url=./../index.php");
}


//Create a unique  activation code
$activationKey = bin2hex(openssl_random_pseudo_bytes(16));
   

//Insert user details and activation code in the user table

$sql = "INSERT INTO user (`username`, `emailId`, `password`, `activation`) VALUES ('$username', '$email', '$password', '$activationKey')";
$result = mysqli_query($conn, $sql);
if(!$result){
    echo '<div class="alert alert-danger">There was an error inserting the user details in the database!</div>';
    exit;
}

//Send the user an email with a link to activate.php with their email and activation code
$message = "Please click on this link to activate your account:\n\n";
$message = "http://localhost/SearchEngine//activate.php?email=" . urlencode($email) . "&key=$activationKey";
//$email_sender ="rahul.thecool23@gmail.com";
// if(mail($email, 'Confirm your Registration', $message, 'From:'.'rahul.thecool23@gmail.com')){
//        //echo "mail($email, 'Confirm your Registration', $message, 'From:'.'rahul.thecool23@gmail.com'))";
//        echo "<div class='alert alert-success'>Thank for your registring! A confirmation email has been sent to $email. Please click on the activation link to activate your account.</div>";

//        #echo "<script>alert (\"Thank for your registring! A confirmation email has been sent to $email. Please click on the activation link to activate your account\")</script>";

//                 #header("refresh:1; url=./../index.php");
// }

$mail = new PHPMailer;
$mail->isMail();

$mail->SMTPSecure = 'tls';
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;

$mail->Host = 'tls://smtp.gmail.com:587';
$mail->Host = 'smtp.gmail.com';

$mail->Port = 587;

$mail->SMTPAuth = true;

$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

$mail->Username = "rahul.thecool23@gmail.com";
$mail->Password = "sungod4b741";
$mail->setFrom('rahul.thecool23@odu.edu', 'Rahul Dumpala');
$mail->addAddress($email);

$mail->Subject = 'Activation Link';

$mail->Body    = 'http://localhost/SearchEngine//activate.php?email=" . urlencode($email) . "&key=$activationKey"';

//$mail->AltBody = 'http://localhost/SearchEngine//activate.php?email=" . urlencode($email) . "&key=$activationKey';

if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
    //Section 2: IMAP
    //Uncomment these to save your message in the 'Sent Mail' folder.
    #if (save_mail($mail)) {
    #    echo "Message saved!";
    #}
}


?>