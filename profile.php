<?php 
               session_start();
               require('./connect.php');
              $emailId=$_SESSION['email_id'];

                $userLoginQuery = "SELECT * FROM `user` WHERE `emailId`= '$emailId' ";

               $result = $conn->query($userLoginQuery);   
              if ($result->num_rows > 0) {
                  $row = $result->fetch_assoc();
                  $username = $row['username'];
                  $emailId = $row['emailId'];
                  $age = $row['age'];
                  $gender = $row['gender'];
                  $country = $row['country'];
              }
              ?>
<!DOCTYPE html>
<html lang="en">
   <head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >

<link rel="stylesheet" href="styles.css" >
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="styles/css/index.css" rel="stylesheet" />
   </head>
   <body class="bg">
   <form action="./updateDetails.php" class="form-signin" method="POST" style="color: aliceblue">
        <h2 class="form-signin-heading">User Profile</h2>
        <p><b> Name: </b><?php echo  $username; ?></p>
        <p><b> Email Id: </b> <?php echo  $emailId; ?></p>
        <p><b> Gender: </b><?php echo  $gender; ?></p>
        <p><b> Age: </b> <?php echo  $age; ?></p>
        <p><b> Country </b> <?php echo  $country; ?></p>
        <input class="btn btn-lg btn-primary btn-block" type="submit" value="Update Information" name="submit">
        <a class="btn btn-lg btn-primary btn-block" href="homePage.php">Back</a>
      </form>
    </body>
</html>
