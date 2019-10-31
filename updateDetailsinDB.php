<?php    
  session_start();
  if(isset($_POST['submit'])){
    require('connect.php');
    $emailId=$_SESSION['email_id'];
    $age = mysqli_real_escape_string($conn, $_POST['age']); 
    $gender = mysqli_real_escape_string($conn, $_POST['gender']); 
    $country = mysqli_real_escape_string($conn, $_POST['country']); 
    //echo($conn);
    $userLoginQuery = "UPDATE `user` SET `age`='$age',`country`='$country',`gender`='$gender' WHERE `emailId` = '$emailId'";
            if ($conn->query($userLoginQuery) === TRUE) {
                echo "<script>alert (\"Successful update\")</script>";
                header("refresh:1; url=./homePage.php");
            } else {
                echo "<script>alert (\"Successful update\")</script>" . $conn->error;
                header("refresh:1; url=./homePage.php");

            }
             $conn->close();
           
}
?>