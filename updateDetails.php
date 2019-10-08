
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
   <form action="./updateDetailsinDB.php" class="form-signin" method="POST">
        <h2 class="form-signin-heading">User Profile</h2>
        <input class="form-control" type="text" id="gender" name="gender" placeholder="Gender">
         <input class="form-control" type="text" id="age" name="age" placeholder="Age">
         <input class="form-control" type="text" id="country" name="country" placeholder="Country">
         <input class="btn btn-lg btn-primary btn-block" type="submit" value="Update Information" name="submit">
      </form>
    </body>
</html>
