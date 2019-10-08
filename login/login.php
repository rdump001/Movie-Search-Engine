<?php    
  session_start();
  if(isset($_POST['submit'])){
    require('../connect.php');
    $emailId = mysqli_real_escape_string($conn, $_POST['emailId']); 
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $newURL = "./../homePage.php";
    //echo($conn);
    $userLoginQuery = "SELECT * FROM `users` WHERE `emailId`= '$emailId' AND `password`= '$password'";

            $result = $conn->query($userLoginQuery);   
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $username = $row['username'];
                $_SESSION['email_id']=$emailId;
                $_SESSION['username']=$username;
                header('Location: '.$newURL);
             
            }
              else {
                echo "Invalid Password or User does not exist";
            }
             $conn->close();
           
}
?>