<?php 
  $sitekey = "6LcBBsIUAAAAAHESniQ8DbsKwGzX2bpLn7OPZglO";
  $secretKey = "6LcBBsIUAAAAAIbw7A9nqRV1yw40w1qZUhI15bsR";
  $url = "https://www.google.com/recaptcha/api/siteverify";   
  session_start();
  if(isset($_POST['submit'])){
    require('../connect.php');
    $emailId = mysqli_real_escape_string($conn, $_POST['emailId']); 
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $newURL = "./../homePage.php";
    //echo($conn);
    $response_key = $_POST['g-recaptcha-response'];
    $response = file_get_contents($url.'?secret='.$secretKey.'&response='.$response_key.'&remoteip='.$_SERVER['REMOTE_ADDR']);
    $response = json_decode($response);
  if($response->success == 1)
    {    


    $userLoginQuery = "SELECT * FROM `user` WHERE `emailId`= '$emailId' AND `password`= '$password'";

            $result = $conn->query($userLoginQuery);   
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $username = $row['username'];
                $_SESSION['email_id']=$emailId;
                $_SESSION['username']=$username;
                header('Location: '.$newURL);
             
            }
              else {
                echo "<script>alert (\"Invalid Password or Username\")</script>";

                header("refresh:1; url=./../index.php");
            }
          }
          else{
            echo "<script>alert (\"Robots Are Not Allowed\")</script>";

                header("refresh:1; url=./../index.php");
        
          }  
            
             $conn->close();
           
}
?>