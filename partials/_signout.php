<?php  

    // echo 'Your logout is in processing';
    session_start();
    session_destroy();
    header("Location:/comment_system/index.php");
    exit();
?>