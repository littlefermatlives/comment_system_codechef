<?php  
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "comment_system";
  $conn = mysqli_connect($servername,$username,$password,$database);
  if($conn){
       echo 'database connected';
  }else 'not connected';
 
?>