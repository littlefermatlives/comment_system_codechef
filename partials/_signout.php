<?php  

    // echo 'Your logout is in processing';
    session_start();
    session_destroy();
    header("Location:/chefblog.lovestoblog.com/index.php");
    exit();
?>