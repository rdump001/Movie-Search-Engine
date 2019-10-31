<!DOCTYPE html>
<html lang="en">
<html lang="en" style="opacity = 0.6;" >
   <head>
   <meta charset="utf-8">
  <title>Movie Search</title>
  <meta name="description" content="search-results">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="//fonts.googleapis.com/css?family=Pattaya|Slabo+27px|Raleway:400,300,600" rel="stylesheet" type="text/css">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" type="image/png" href="images/favicon.png">

  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.min.js"></script>
  
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
               <li><a href="upload.php">Add Movie</a></li>
               <li><a href="profile.php">My Profile</a></li>
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
      <div class='col-xs-12 col-sm-12 col-md-4 col-lg-12' style="opacity = 0.8;">
      <div class="row">
    <div class="col-lg-4 col-lg-offset-4">
        <div class="input-group" style= "margin-top: 175px;">
        <span class="input-group-btn">
        <form action="results.php" method="get" autocomplete="off" style="display:inline-block">
        <input type="text" name="q" placeholder="Search..." class="form-control" style="
               background-color: #ffffffe0;
               width: 550px;">
               
               <button type="submit" value="Search" class="searchButton" style="font-size:20.5px;opacity: 0.7;">
               
                  <i class="fa fa-search"></i>
                  </button>
                  </form>
                  
               </div>
               </span>
               <br>
               <a href="advance.php" type="button" style="font-size: medium;color: white;margin-left: 233px;"> Advance Search </a>
            </div>
         </div>
      </div>
      <div class="footer">
  <p>Copyright &copy 2019</p>
</div>
   </body>
</html>
