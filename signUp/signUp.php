<?php
if(isset($_POST['submit']))
{
    $sitekey = "6LcBBsIUAAAAAHESniQ8DbsKwGzX2bpLn7OPZglO";
    $secretKey = "6LcBBsIUAAAAAIbw7A9nqRV1yw40w1qZUhI15bsR";
    $url = "https://www.google.com/recaptcha/api/siteverify"; 

    require('../connect.php');

    $response_key = $_POST['g-recaptcha-response'];
    $response = file_get_contents($url.'?secret='.$secretKey.'&response='.$response_key.'&remoteip='.$_SERVER['REMOTE_ADDR']);
    $response = json_decode($response);
    if($response->success == 1)
    {  
 
    $userQuery = "INSERT INTO `user`(`username`, `password`, `emailID`)
                 VALUES ('$_POST[username]','$_POST[password]','$_POST[emailid]')";
    
    $verifyemail="SELECT * FROM users WHERE emailId='$_POST[emailid]'";
    $result=$conn->query($verifyemail);
    //$newURL = "./../index.php";
    
    if ($result-> num_rows > 0) {
        echo "<script>alert('Email is already Registered, Please try another')</script>";
       
        header("refresh:1; url=./../index.php");
    }
     else if ($conn->query($userQuery) == TRUE ) {
        echo "<script>alert (\"User signed up successfully\")</script>";
        header("refresh:1; url=./../index.php");
        
        //  $verifyemail="SELECT id FROM users WHERE emailId='$_POST[emailid]'";
        //  $result=$conn->query($verifyemail);
        //     if($result-> num_rows > 0) {
        //     while($row = $result->fetch_assoc()) {
        //          $res = $row['id'];
    }
    else 
    {
        echo "Error in adding the user to DB";
    }
    }
    else{
        echo "<script>alert (\"Robots Are Not Allowed\")</script>";

            header("refresh:1; url=./../index.php");
    
      } 
    
    $conn->close();
}
?>