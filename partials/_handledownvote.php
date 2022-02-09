<?php  
  session_start();
  if(isset($_SESSION['login']) and $_SESSION['login'] == 'true'){
      $blogid = $_GET['blogid'];
      echo $blogid;
  }


?>