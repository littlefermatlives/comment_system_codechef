<?php 
 session_start();
 include 'partials/_dbconnect.php';
 if(isset($_SESSION['login']) and $_SESSION['login'] == 'true'){
      $blogid = $_GET['blogid'];
      echo $blogid;
      $s = "SELECT * from `blogs` where `blog_id` = $blogid";
      $res= mysqli_query($conn,$s);
      echo $res;
 }


?>