<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <?php 
       include './partials/_header.php';
       include './partials/_carousel.php';
       include './partials/_dbconnect.php';
       echo '<div class = "row mx-2">';
       $sql2 = "SELECT * FROM `blogs`";
       $result2 = mysqli_query($conn,$sql2);
       while($row = mysqli_fetch_assoc($result2)){
        // echo $row['catid'];
        $blogid = $row['blog_id'];
        $userid = $row['user_id'];
        $blogtitle = $row['blog_title'];
        $blogdesc = $row['blog_desc'];
        $sql3 = "SELECT * from `users` where `user_id` = $userid";
        $result3 = mysqli_query($conn,$sql3);
        $row3 = mysqli_fetch_assoc($result3);
        $username = $row3['username'];
        echo '<div class="container col-md-4 my-3">
        <div class="jumbotron p-3 p-md-3 text-white rounded bg-dark">
          <div class="col-md-12 px-0">
              <h2 class="display-4 font-italic">'.$blogtitle.'</h2>
              <p class="lead my-3">'.$blogdesc.'</p>
              <p>Posted By: <b></b>'.$username.'</p>
          </div>
          <a href="/comment_system/blogs.php?blogid='.$blogid.'" class="btn btn-primary"> View Blog</a>
        </div>
        </div>';
        
      }
      echo '</div>';

       

           
        
    // }

    ?>

    
    




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