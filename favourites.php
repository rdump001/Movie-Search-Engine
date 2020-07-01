<?php 
               session_start();
               require('./connect.php');
              $emailId=$_SESSION['email_id'];

                $userLoginQuery = "SELECT * FROM `history` WHERE `user`= '$emailId' ";

               $result = $conn->query($userLoginQuery);   
              if ($result->num_rows > 0) {
                
                while($row = $result->fetch_assoc()){
                    
                    
                  $movie_title = $row['movie_title'];
               ?> 
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <title>THE FLICKS</title>
  <meta name="description" content="search-results">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>

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
      <script src="styles/js/result.js" type="text/javascript"></script>
      <script src="styles/js/pagination.js" type="text/javascript"></script>
      <script src="styles/js/hilitor.js" type="text/javascript"></script>
      <script src="styles/js/delete.js" type="text/javascript"></script>

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

<body style = "background-color: #4e4e4ee6">
</body>

<br>
<br>


<div class="row" style="text-align: center">
   		  <div class="container initial">
  		    <div class="panel panel-success">
                      <div class="panel-heading" style="background-color : aliceblue;">  
                        <h2 class="panel-title">
                        <a href="<?php echo $row['movie_imdb_link']; ?>" target="_blank"><p><br>
                            <?php echo $movie_title;?></a>
                      </p></h2></div>
                        <br><br>
                          <b>Movie Director</b><p> 
                          <?php echo $row['director_name'];?></p><p></p><br>
                              
                              <b>Actor</b><p> 
                              <?php echo $row['actor_1_name'];?></p><p></p><br>
                              <b>Genres</b><p> 
                              <?php echo $row['genres'];?></p><p></p><br>
                              <b>Rating</b><p> 
                              <?php echo $row['imdb_score'];?></p><p></p><br>
                              <input method= "POST" id="<?php echo $row['id']; ?>" type="submit" class="btn btn-success delete" value="Remove" style="
    background-color: skyblue;">
                              <br>
                              <br>
                <?php }}?>
                <a class="btn btn-lg btn-primary btn-block" href="homePage.php">Back</a>
            </div>
        </div>
    </div>

</body>