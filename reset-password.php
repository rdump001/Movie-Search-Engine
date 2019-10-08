<?php    
  session_start();
  
  if(isset($_POST['submit'])){
    $newURL = "./index.php";
    require('./connect.php');
  $emailId = mysqli_real_escape_string($conn, $_POST['emailId']); 
  $password = mysqli_real_escape_string($conn, $_POST['password']);

    //echo($conn);
    $userLoginQuery = "SELECT * FROM `users` WHERE `emailId`= '$emailId'";

            $result = $conn->query($userLoginQuery);   
            if ($result->num_rows > 0) {
                $userLoginQuery = "UPDATE `users` SET `password` = '$password' WHERE `emailId` = '$emailId'";
                if ($conn->query($userLoginQuery) === TRUE) {
                    echo "<script>alert (\"Successful update\")</script>";
                    header("refresh:1; url=./index.php");
                } else {
                    echo "<script>alert (\"Successful update\")</script>" . $conn->error;
                    header("refresh:1; url=./index.php");

                }
                
            }
              else {
                echo "User does not exist";
            }
           
}

?>