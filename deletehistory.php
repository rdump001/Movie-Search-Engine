<?php
session_start();
if(!isset($_SESSION['email_id'])){
    header("location: index.php");
}
include('./connect.php');

$user_id = $_SESSION['email_id'];


    $data = $_GET['movie_id'];
    // $username =$_SESSION[''];

         $sql = "DELETE FROM history WHERE id='$data'";

         $result = mysqli_query($conn, $sql);

         if ($result->num_rows > 0)
         {
          echo "<script>alert (\"Successfully Deleted\")</script>";
          header("refresh:1; url= favourites.php");
         }
         else {
          echo "<script>alert (\"Error in Deleting\")</script>" . $conn->error;
          header("refresh:1; url= favourites.php");

      }
         


      //echo '<pre>', $total = $query['hits']['total']['value'], '</pre>';
      // $variables['total'] = $total;
        // echo '<pre>', print_r($results), '</pre>';
         //echo '<pre>', print_r($query['hits']['total']['value']), '</pre>';



?>