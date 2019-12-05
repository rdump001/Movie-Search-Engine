<?php

require_once 'init.php';

if (!empty($_POST)) {
	if(isset($_POST['director_name'], $_POST['actor_1_name'], $_POST['movie_title'])) {

		$director_name = $_POST['director_name'];
		$actor_1_name = $_POST['actor_1_name'];
		$movie_title =  $_POST['movie_title'];

		$indexed = $es->index([
			'index' => 'movies',
			'type' => '_doc',
			'body' => [
				'director_name' => $director_name,
				'actor_1_name' => $actor_1_name,
				'movie_title' => $movie_title
				]
			]);

			if($indexed) {
                echo "<script>alert (\"Movie Added\")</script>";
                header("refresh:1; url=upload.php");

				//print_r($indexed);
			}
	}
}

?>

<!doctype html>
<html>
    <head>
    	<meta charset="utf-8">
    	<title>Upload to ES</title>

      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
      <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
      <link href="styles/css/bootstrap.css" rel="stylesheet" />
      <link href="styles/css/index.css" rel="stylesheet" />
      <link href="styles/css/login-register.css" rel="stylesheet" />
      <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="/styles/style.css">
      <script src="styles/js/jquery-1.10.2.js" type="text/javascript"></script>
      <script src="styles/js/bootstrap.js" type="text/javascript"></script>
      <script src="styles/js/login-register.js" type="text/javascript"></script>


  <style>
      h1 {
        font-family: 'Pattaya', sans-serif;
        font-size: 59px;
        position: relative;
        right: -10px;
      }

      h3 {
        font-family: 'Pattaya', sans-serif;
        font-size: 20px;
        position: relative;
        right: -90px;
      }

      h4 {
        font-family: 'Slabo', sans-serif;
        font-size: 30px;
      }


    </style>

    </head>
    <body class="bg">
      <nav class="navbar navbar-inverse">
         <div class="container-fluid">
            <div class="navbar-header">
               <a class="navbar-brand" href="homePage.php">MovieSearch</a>
            </div>
            <ul class="nav navbar-nav">
               <li class="active"><a href="homePage.php">Home</a></li>
               <!-- <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">Genres<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                     <li><a href="#">Action</a></li>
                     <li><a href="#">Comedy</a></li>
                     <li><a href="#">Horror</a></li>
                     <li><a href="#">Thriller</a></li>
                  </ul>
               </li> -->
               <li><a href="profile.php">My Profile</a></li>
               <li><a href="favourites.php">My Favorites</a></li>
               <li><a href="locator.php">Theaters Locator</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
               <li><a class="glyphicon glyphicon-user" data-toggle="modal" href="./index.php" > Logout
               </a></li>
               <li><a class="glyphicon glyphicon-user" data-toggle="modal" href="javascript:void(0)" onclick="openLoginModal();"> Welcome  
               <?php 
               session_start();
               require('./connect.php');
              $emailId=$_SESSION['email_id'];

                $userLoginQuery = "SELECT * FROM `user` WHERE `emailId`= '$emailId' ";

               $result = $conn->query($userLoginQuery);   
              if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                  $username = $row['username'];
                  echo $username;
               
              }
               ?>
            
            
            </a></li>
            </ul>
         </div>
      </nav>
   
<br>
<div class="row vertical-center-row">
    <div class="col-lg-4 col-lg-offset-4">
        <div class="input-group">
            <h1> </h1><p>
        </div>
    </div>
</div>


<br>
<form action="upload.php" method="post" autocomplete="off">
<div class="col-lg-4 col-lg-offset-4">
        <div class="input-group">
        	<span class="input-group-addon" id="sizing-addon2">Director</span>
            <input type="text" name="director_name" class="form-control" placeholder="Director Name" aria-describedby="sizing-addon2" style="
    background-color: transparent; color: white;
"><p>
		<p>
 	</div>
</div>

  <div class="container">
    <div class="row">
    </div>
  </div>

<p>
<br>
<div class="col-lg-4 col-lg-offset-4">
	<div class="input-group">
                <span class="input-group-addon" id="sizing-addon2">Lead Actor</span>
                <input type="text" name="actor_1_name" class="form-control" placeholder="Actor Name" aria-describedby="sizing-addon2" style="
    background-color: transparent; color: white;
">
        </div>
</div>
  <div class="container">
    <div class="row">
    </div>
  </div>

<p>
<br>

<div class="col-lg-4 col-lg-offset-4">
        <div class="input-group">

		<span class="input-group-addon" id="sizing-addon2">Movie</span>
		<input type="text"  color="white" name="movie_title" class="form-control" placeholder="Movie Title" aria-describedby="sizing-addon2" style="
    background-color: transparent; color: white;
">

       </div>
    </div>
</div>

  <div class="container">
    <div class="row">
    </div>
  </div>

<p>
<br>

<div class="row vertical-center-row">
    <div class="col-lg-4 col-lg-offset-4">
        <div class="center-block">
		<center
    		<br><input type="submit" class="btn btn-success" value="Upload" style="
    background-color: skyblue;">
    	</form>
                <a class="btn btn-danger" style="width:72px" href="homePage.php">Back </a>
                </center>
      </div>
    </div>
  </div>

  </body>
</html>