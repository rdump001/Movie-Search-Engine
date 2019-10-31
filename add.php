<?php

require_once 'init.php';


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
   <form action="add.php" method="POST" autocomplete="off">
        <h2 class="form-signin-heading">User Profile</h2>
        <input class="form-control" type="text" id="movie_title" name="movie_title" placeholder="movie_title">
         <input class="form-control" type="text" id="actor_1_name" name="actor_1_name" placeholder="actor_1_name">
         <input class="form-control" type="text" id="actor_2_name" name="actor_2_name" placeholder="actor_2_name">
         <input class="btn btn-lg btn-primary btn-block" type="submit" value="Add" name="submit">
      </form>
    </body>
</html>
