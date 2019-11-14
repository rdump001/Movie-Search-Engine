<?php    
  session_start();
  require('connect.php');
  require_once 'init.php';
    $record_per_page = 10;
    $page = '';
  if(isset($_GET['movie_details'])){

    $data = $_GET['movie_details'];
    $page_num = $data['page_num'];
    $movie_title = $data['movie_title'];
    $from = ($page_num-1) *10;
    
    $query = $es->search([
		'index'=> 'movies',
      'type' => '_doc',
      'from' => $from,
      'size' =>'10',
      'body' => [
         'query' => [
                  'match'  => ['movie_title' => $movie_title],
                  //'match' => ['director_name' => $q]
         ]
      
      ]
            
   ]);

   if($query['hits']['total'] >= 1){
    $results = $query ['hits']['hits'];

    
        $display="";
 ?>
 <!DOCTYPE html>
<html lang="en">
<head>

<script src="styles/js/hilitor.js" type="text/javascript"></script>
<script type="text/javascript">

  var myHilitor; // global variable
  window.addEventListener("DOMContentLoaded", function(e) {
    myHilitor = new Hilitor("content");
    myHilitor.apply("<?php echo $movie_title?>");
  }, false);

</script>
 <?php   
        foreach($results as $r) {
                $display=$display."<div class='row' style='text-align: center'>";
                $display=$display."<div class='container initial'>";
                $display=$display."<div class='panel panel-success'>";
                $display=$display."<div class=panel-heading style='background-color : aliceblue;''>";
                $display=$display."<h2 class=panel-title>";
                $display=$display."<a href='".$r['_source']['movie_imdb_link']."' target='_blank'><p><br>";
                
                $display=$display."".$r['_source']['movie_title']."";
            
                // if (strpos($r['_source']['movie_title'], $movie_title) !== false) {
                //     $display=$display."<mark style='background-color: rgb(255, 255, 102); color: rgb(0, 0, 0);'>'".$r['_source']['movie_title']."'</mark>";
                // }
                $display=$display."</a>";
                $display=$display."</div>";
                $display=$display."<br><br>";
                $display=$display."<b>Movie Director</b><p >";
                $display=$display."".$r['_source']['director_name']."";
                $display=$display."<p></p><br>";
                $display=$display."<b>Actor</b><p>";
                $display=$display."".$r['_source']['actor_1_name']."";
                $display=$display."<p></p><br>";
                $display=$display."<b>Genres</b><p> ";
                $display=$display."".$r['_source']['genres']."";
                $display=$display."<p></p><br>";
                $display=$display."<b>Rating</b><p>";
                $display=$display."".$r['_source']['imdb_score']."";
                $display=$display."<p></p><br>";
                $display=$display."<input method= 'POST' id='".$r['_id']."' type='submit' class='btn btn-success save' value='Save' style='
                background-color: skyblue;'>";
                $display=$display."<br><br>";
                $display=$display."</div>";
                $display=$display."</div>";
                $display=$display."";
                $display=$display."";               
          }
          echo $display;

    }
  

  }
  

  ?>

</head>
</html>