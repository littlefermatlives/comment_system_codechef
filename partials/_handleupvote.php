<?php 
 session_start();
 if(isset($_SESSION['login']) and $_SESSION['login'] == 'true'){
    include "_dbconnect.php";
    $blogid = $_GET['blogid'];
    $user_id = $_SESSION['userid'];
    echo $blogid;
    $sql = "SELECT * from `blogs` where `blog_id` = $blogid";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    $crvote = $row['Vote'];
    $crvote = $crvote + 1;
    $sql = "UPDATE `blogs` SET `Vote` = $crvote WHERE `blogs`.`blog_id` = $blogid";
    $result = mysqli_query($conn,$sql);
    
    $sql = "INSERT INTO `voted_users` (`blog_id`, `user_id`, `time`) VALUES ($blogid, $user_id,current_timestamp())";
    $result = mysqli_query($conn,$sql);
    header("Location:/comment_system/blogs.php?blogid=$blogid");
    exit();
  
}

 


?>