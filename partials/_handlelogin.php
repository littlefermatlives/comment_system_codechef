<?php 
  
   $showerror = "false";
   if($_SERVER["REQUEST_METHOD"] == "POST"){
        include "_dbconnect.php";
        
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "select * from `users` where username = '$username'";
        $result = mysqli_query($conn,$sql);
        $nums = mysqli_num_rows($result);
        echo $nums;
        if($nums == 1){
             $row = mysqli_fetch_assoc($result);
             if($password == $row['password']){
                   echo 'yes';
                  session_start();
                  $_SESSION['login'] = true;
                  $_SESSION['username'] = $username;
                  $_SESSION['userid'] = $row['user_id'];
                //   ecoh $_SESSION['userid'];
                  header("Location:/chefblog.lovestoblog.com/index.php?loginsuccess=true");
                exit();
                  
             }else{
                //  echo 'no';
               $showerror = "Password is incorrect";
             }
        }
        else if($nums == 0){
            $showerror = "User doesnot exists";
        }
        // echo $showerror;
        header("Location:/chefblog.lovestoblog.com?loginsuccess=false&error=$showerror");

   }
?>
