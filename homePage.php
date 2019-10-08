<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Movie Search</title>
      <meta charset="utf-8">
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
   </head>
   <<body class="bg">
      <nav class="navbar navbar-inverse">
         <div class="container-fluid">
            <div class="navbar-header">
               <a class="navbar-brand" href="#">MovieSearch</a>
            </div>
            <ul class="nav navbar-nav">
               <li class="active"><a href="#">Home</a></li>
               <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">Genres<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                     <li><a href="#">Action</a></li>
                     <li><a href="#">Comedy</a></li>
                     <li><a href="#">Horror</a></li>
                     <li><a href="#">Thriller</a></li>
                  </ul>
               </li>
               <li><a href="#">NewReleases</a></li>
               <li><a href="profile.php">My Profile</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
               <li><a class="glyphicon glyphicon-user" data-toggle="modal" href="./index.php" > Logout</a></li>
               <li><a class="glyphicon glyphicon-user" data-toggle="modal" href="javascript:void(0)" onclick="openLoginModal();"> Welcome  
               <?php 
               session_start();
               require('./connect.php');
              $emailId=$_SESSION['email_id'];

                $userLoginQuery = "SELECT * FROM `users` WHERE `emailId`= '$emailId' ";

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
      <div class='col-xs-12 col-sm-12 col-md-4 col-lg-12'>
         <div class="container searchbar">
            <div class="wrap">
               <div class="search">
               <h1 class= "headingStyle"> It's POPCORN TIME !!! </h1>
               <br>
               <br>
               <input type="textarea" class="searchTerm" placeholder="  Search Movies" style="opacity: 0.65;width:50%;font-size:24px;">
               <button type="submit" class="searchButton" style="font-size:24px;opacity: 0.7;">
                  <i class="fa fa-search"></i>
                  </button>
                  </button>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>
