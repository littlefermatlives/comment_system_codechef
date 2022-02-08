<?php 
   session_start();

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    include "_dbconnect.php";
        if(isset($_SESSION['login']) and $_SESSION['login'] == 'true'){
            $blogtitle = $_POST['blogtitle'];
            $blogdesc = $_POST['blogdesc'];
            $userid = $_SESSION['userid'];
            $sql = "INSERT INTO `blogs` (`user_id`, `blog_title`, `blog_desc`, `time`) VALUES ('$userid', '$blogtitle', '$blogdesc', current_timestamp())";
            $result = mysqli_query($conn,$sql);
            header("Location:/comment_system/index.php?addnewblogsucess=true");
            exit();
        }else{
            header("Location:/comment_system/index.php?addnewblogsucess=false");
            exit();

        }
       
    
    
    
  }



?>