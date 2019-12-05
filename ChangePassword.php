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
      <form action="./reset-password.php" class="form-signin" method="POST">
         <h2 class="form-signin-heading">Forgot Password</h2>
         <input class="form-control" type="text" id="emailId" name="emailId"  placeholder="Email" pattern="^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$" required title="somthing@someserver.com">
         <input type="password" class="form-control" id="pass" name="password" placeholder="New Password" required title="Password">
         <input type="password" class="form-control" id="conpass" name="password" placeholder="Confirm Password" required title="Password"> 
         <input class="btn btn-lg btn-primary btn-block" type="submit" value="submit" name="submit">
         <a class="btn btn-lg btn-primary btn-block" href="index.php">Login</a>
      </form>
      <script>
         var password = document.getElementById("pass")
         , confirm_password = document.getElementById("conpass");
         
         function validatePassword(){
         if(password.value != confirm_password.value) {
         confirm_password.setCustomValidity("Passwords Don't Match");
         } else {
         confirm_password.setCustomValidity('');
         }
         }
         
         password.onchange = validatePassword;
         confirm_password.onkeyup = validatePassword;
      </script>
   </body>
</html>