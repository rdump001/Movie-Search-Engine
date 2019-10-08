<?php    
  session_start();
  if(isset($_POST['submit'])){
    require('../connect.php');
    $emailId = mysqli_real_escape_string($conn, $_POST['emailId']); 
    $newURL = "./../index.php";
    //echo($conn);
    $userLoginQuery = "SELECT * FROM `users` WHERE `emailId`= '$emailId'";

            $result = $conn->query($userLoginQuery);   
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "Send email to user with password";
                }
            else{
		        echo "User name does not exist in database";
                header('Location: '.$newURL);
            }
             $conn->close();
           
}
?>