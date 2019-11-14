<?php    
  session_start();
  require('connect.php');
  require_once 'init.php';
  if(isset($_GET['movie_id'])){

    $data = $_GET['movie_id'];
    $user =$_SESSION['email_id'];
    
	$query = $es->search([
		'index'=> 'movies',
      'type' => '_doc',
      'body' => [
         'query' => [
                  'match'  => ['_id' => $data],
        
         ]
      
      ]
            
   ]);

      if($query['hits']['total'] >= 1){
         $results = $query ['hits']['hits'];
       
         foreach($results as $r) {

            $movie_title=$r['_source']['movie_title'];
            $movie_director=$r['_source']['director_name'];
            $movie_actor=$r['_source']['actor_1_name'];
            $movie_genre=$r['_source']['genres'];
            $movie_imdb=$r['_source']['imdb_score'];
         }

         $sql = "INSERT INTO history (`user`, `id`, `movie_title`, `director_name`, `actor_1_name`, `genres`, `imdb_score`) VALUES ('$user','$data', '$movie_title', '$movie_director', '$movie_actor', '$movie_genre', '$movie_imdb')";
         $result = mysqli_query($conn, $sql);
         echo"inserted";

      //   echo '<pre>', $total = $query['hits']['total']['value'], '</pre>';
      // $variables['total'] = $total;
        // echo '<pre>', print_r($results), '</pre>';
         //echo '<pre>', print_r($query['hits']['total']['value']), '</pre>';
      }
      
}
?>