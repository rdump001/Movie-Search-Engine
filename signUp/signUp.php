<?php
if(isset($_POST['submit']))
{
    require('../connect.php');
    $userQuery = "INSERT INTO `users`(`username`, `password`, `emailID`)
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
    
    $conn->close();
}
?>