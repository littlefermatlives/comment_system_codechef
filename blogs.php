<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
    <style>
        .design{
            border-radius: 10%;
            max-height = 100px;
        }
        #bnt{
           height = 5px;
           width = 10px;
        }
        
    </style>
  </head>
  <body>
    <?php 
      session_start();
       include './partials/_header.php';
       include './partials/_dbconnect.php';
       $blogid = $_GET['blogid'];
       $sql = "SELECT * from `blogs` where `blog_id` = $blogid";
       $result = mysqli_query($conn,$sql);
       $row = mysqli_fetch_assoc($result);
       $bloginfo = $row['blog_info'];
       $blogtitle = $row['blog_title'];
       $blogdesc = $row['blog_desc'];
       $vote = $row['Vote'];
       echo '<div class="container my-3">
       <div class="jumbotron p-3 text-white rounded bg-dark">
         <div class="col-md-12 px-0">
             <h2 class="display-4 text-center font-italic">'.$blogtitle.'</h2>
             <p class="lead my-3 text-center">'.$blogdesc.'</p>
             <p>'.$bloginfo.'</p>
         </div>
          <div class ="container-fluid"> 
          <form class="d-flex text-muted">';
          if(isset($_SESSION['login']) and $_SESSION['login'] == 'true'){
               $user_id = $_SESSION['userid'];
            $sql = "SELECT * from `voted_users` where `blog_id` = $blogid";
            $result = mysqli_query($conn,$sql);
            $flag = true;
            while($row = mysqli_fetch_assoc($result)){
                  $uid = $row['user_id'];
                  if($uid == $user_id){
                       $flag = false;
                       break;
                  }
            }
            if($flag){
                 echo '<a href="./partials/_handleupvote.php?blogid='.$blogid.'" class="btn btn-outline-success btn-sm mx-2"> UpVote</a>
                 <a href="./partials/_handledownvote.php?blogid='.$blogid.'" class="btn btn-outline-success btn-sm mx-2"> DownVote</a>';
            }else{
                echo '<button type="button" class="btn btn-lg btn-success btn-sm mx-2" disabled>UpVote</button>
                <button type="button" class="btn btn-lg btn-success btn-sm mx-2" disabled>DownVote</button>';
            }

          }else{
            echo '<button type="button" class="btn btn-lg btn-success btn-sm mx-2" disabled>UpVote</button>
            <button type="button" class="btn btn-lg btn-success btn-sm mx-2" disabled>DownVote</button>';
             
          }
          
        //   <a href="./partials/_handleupvote.php?blogid='.$blogid.'" class="btn btn-outline-success mx-2"> UpVote</a>
        //   <a href="./partials/_handledownvote.php?blogid='.$blogid.'" class="btn btn-outline-success mx-2"> DownVote</a>
        echo' <button type="button" class="btn btn-success mx-2" disabled>'.$vote.'</button>
           </form>

          </div>
       </div>
       </div>';



       if(isset($_SESSION['login']) && $_SESSION['login'] == true){
        $user_id = $_SESSION['userid'];
         echo '<div class="container my-3 py-2">
                <h1>Post Comment</h1>
                <form action="' .$_SERVER['REQUEST_URI']. '" method="post">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Enter your comment here</label>
                            <textarea class="form-control" id="comment" name="comment" rows="5"></textarea>
                        </div>
                        <input type="hidden" name = "user_id" value =  "'.$user_id.'">
                        <button type="submit" class="btn btn-success my-2">Post</button>
                </form>
            </div>';
         }else{
        echo'<div class="container my-3">
                <h1>Post Comment</h1>
                <p class = "lead">You are not logged in. Please login to Post a comment</p>

            </div>';
         }
       





          
            $method = $_SERVER['REQUEST_METHOD'];
            if($method =='POST'){
                 // insert thread into  database
                 $cm_content = $_POST['comment'];
                 $userid = $_SESSION['userid'];
                 $cm_content = str_replace("<","&lt",$cm_content);
                 $cm_content = str_replace("<","&gt",$cm_content);
                 $userid = $_POST['user_id'];
                 $sql = "INSERT INTO `comments` (`blog_id`, `user_id`, `comment`, `time`) VALUES ('$blogid', '$user_id', '$cm_content', current_timestamp())";
                 $result = mysqli_query($conn,$sql);
                
                
            }




          
            echo '<div class = "container"
            <div class="my-3 p-3 bg-body rounded shadow-sm">
          <h6 class="border-bottom pb-2 mb-0">Recent Comments</h6>';
            $sql = "SELECT * FROM `comments` WHERE `blog_id` = $blogid";
            $result = mysqli_query($conn,$sql);
            $noresult = true;
            while($row = mysqli_fetch_assoc($result)){
                 $noresult = false;
                 $cid = $row['comment_id'];
                 $content = $row['comment'];
                 date_default_timezone_set('Asia/Kolkata');
                 $time = $row['time'];
                 $today = date("Y-m-d H:i:s");
                 $firstDate  = new DateTime($today);
                 $secondDate = new DateTime($time);
                 $intv1 = $firstDate->diff($secondDate);
                 $userid = $row['user_id'];

                 $sql2 = "SELECT username FROM `users` WHERE user_id = '$userid'";
                 $result2 = mysqli_query($conn,$sql2);
                 $row2 =  mysqli_fetch_assoc($result2);
                 $username = $row2['username'];
                 echo '
               <div class="d-flex text-muted pt-3">
               <p class="pb-3 mb-0 small lh-sm border-bottom">
                   <strong class="d-block text-gray-dark">@'.$username.'</strong>'.$content.' </p>
                 
               </div>
               <div class="d-flex text-muted pt-1">
               <a href = "#" class="btn btn-success mx-2 btn-sm" id = "bnt">Upvote</a>
               <a href = "#" class="btn btn-success mx-2 btn-sm" id = "bnt">DownVote</a>
               <a href = "#" class="btn btn-success mx-2 btn-sm" id = "bnt" disabled>DownVote</a>
               <a href = "#" class="btn btn-success mx-2 btn-sm" id = "bnt">Reply</a>
               </div>
              
             ';
                //  if($intv1->y > 0){
                //  echo $intv1->y . " year ago";
                //  }else if($intv1->m > 0){
                //          echo $intv1->m . " months ago";
                //  }else if($intv1->d > 0){
                //          echo $intv1->d. " days ago";
                //  }else if($intv1->h > 0){
                //          echo $intv1->h. " hours ago";
                //  }else if($intv1->i > 0){
                //          echo $intv1->i.  " minutes ago";
                //  }else echo $intv1->s. " seconds ago";
                 
             }
             echo '</div>
             </div>';
             if($noresult){
                  echo '<div class="jumbotron jumbotron-fluid">
                  <div class="container">
                    <p class="display-4">No Comments Yet!</p>
                    <p class="lead">Be the first person to post comment!</p>
                  </div>
                </div>';
             }






       
          
        
       
      

       

           
        
    // }

    ?>

    
    
  <!-- Lorem ipsum dolor sit amet consectetur, adipisicing elit. Architecto dolor laboriosam earum, excepturi consequatur temporibus vero! Placeat quas, libero cumque incidunt, voluptatum architecto ab, veniam numquam eos a asperiores nostrum.</p> -->



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>