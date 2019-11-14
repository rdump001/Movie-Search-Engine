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
    
        foreach($results as $r) {
                $display=$display."<div class='row' style='text-align: center'>";
                $display=$display."<div class='container initial'>";
                $display=$display."<div class='panel panel-success'>";
                $display=$display."<div class=panel-heading style='background-color : aliceblue;''>";
                $display=$display."<h2 class=panel-title>";
                $display=$display."<a href='".$r['_source']['movie_imdb_link']."' target='_blank'><p><br>";
                $display=$display."".$r['_source']['movie_title']."";
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
                $display=$display."<input class='btn btn-success save' id='".$r['_id']."'  data-toggle='modal' href='javascript:void(0)' onclick='openLoginModal();' value= 'Save' style='
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