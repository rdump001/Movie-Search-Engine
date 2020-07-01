<?php

require_once 'init.php';

?> 

<!doctype html>
<html>
    <head>
    	<meta charset="utf-8">
    	<title>THE FLICKS</title>

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
               <a class="navbar-brand" href="#">FLICKS</a>
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
            </ul>
            <ul class="nav navbar-nav navbar-right">
               <li><a class="glyphicon glyphicon-user" data-toggle="modal" href="javascript:void(0)" onclick="openRegisterModal();"> Register</a></li>
               <li><a class="glyphicon glyphicon-log-in" data-toggle="modal" href="javascript:void(0)" onclick="openLoginModal();"> Login</a></li>
            </ul>
         </div>
      </nav>
      <div class="modal fade login" id="loginModal">
         <div class="modal-dialog login animated">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title">Login with</h4>
               </div>
               <div class="modal-body">
                  <div class="box">
                     <div class="content">
                        <div class="social">
                           <a id="google_login" class="circle google" href="#">
                           <i class="fa fa-google-plus fa-fw"></i>
                           </a>
                        </div>
                        <div class="division">
                           <div class="line l"></div>
                           <span>or</span>
                           <div class="line r"></div>
                        </div>
                        <div class="error"></div>
                        <div class="form loginBox">
                           <form method="POST" action="./login/login.php" accept-charset="UTF-8">
                              <input type="text" id="emailId" name="emailId" placeholder="Email ID" required title="somthing@someserver.com">
                              <input type="password" id="pass" name="password" placeholder="Password" required title="Password">
                              <input type="submit" value="Login" class="form-control" name="submit">
                           </form>
                        </div>
                     </div>
                  </div>
                  <div class="box">
                     <div class="content registerBox" style="display:none;">
                        <div class="form">
                           <form method="POST" action="./signUp/signUp.php" accept-charset="UTF-8">
                              <input class="form-control" type="text" id="user" name="username" placeholder="Username">
                              <input class="form-control" type="text" id="email" name="email" placeholder="Email" pattern="^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$" required title="somthing@someserver.com">
                              <input class="form-control" type="password" id="pass" name="password" placeholder="Password" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"   required title="Password (UpperCase, LowerCase, Number/SpecialChar and min 8 Chars)">
                              <input class="form-control" type="submit" value="Sign Up" name="submit">
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="modal-footer">
                  <div class="forgot login-footer">
                     <span>Looking to
                     <a href="javascript: showRegisterForm();">create an account</a>
                     <br>
                     <a href="ChangePassword.php">Forgot Password ?</a>
                     </span>
                  </div>
                  <div class="forgot register-footer" style="display:none">
                     <span>Already have an account?</span>
                     <a href="javascript: showLoginForm();">Login</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      </div>
   
<br>
<div class="row vertical-center-row">
    <div class="col-lg-4 col-lg-offset-4">
        <div class="input-group">
            <h1> </h1><p>
        </div>
    </div>
</div>


<br>
<form action="adv_result.php" method="get" autocomplete="off">
<div class="col-lg-4 col-lg-offset-4">
        <div class="input-group">
        	<span class="input-group-addon" id="sizing-addon2">Director</span>
          <input type="text" name="director_name" class="form-control" placeholder="Director Name" aria-describedby="sizing-addon2" style="
    background-color: transparent;
    color: white;
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
		<input type="text" name="movie_title" class="form-control" placeholder="Movie Title" aria-describedby="sizing-addon2" style="
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
    		<br><input type="submit" class="btn btn-success" value="Search" style="
    background-color: skyblue;
">
                <a class="btn btn-danger" style="width:72px" href="index.php">Back</a>
                </center>
      </div>
      </form>
    </div>
  </div>
  
  </body>
</html>