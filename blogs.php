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
        
    </style>
  </head>
  <body>
    <?php 
       include './partials/_header.php';
       include './partials/_dbconnect.php';
       $blogid = $_GET['blogid'];
       $sql = "SELECT * from `blogs` where `blog_id` = $blogid";
       $result = mysqli_query($conn,$sql);
       $row = mysqli_fetch_assoc($result);
       $bloginfo = $row['blog_info'];
       $blogtitle = $row['blog_title'];
       $blogdesc = $row['blog_desc'];
       echo '<div class="container my-3">
       <div class="jumbotron p-3 text-white rounded bg-dark">
         <div class="col-md-12 px-0">
             <h2 class="display-4 text-center font-italic">'.$blogtitle.'</h2>
             <p class="lead my-3 text-center">'.$blogdesc.'</p>
             <p>'.$bloginfo.'</p>
         </div>
          <div class ="container-fluid"> 
          <form class="d-flex">
          <a href="./partials/_handleupvote.php?blogid='.$blogid.'" class="btn btn-outline-success mx-2"> UpVote</a>
          <a href="./partials/_handledownvote.php?blogid='.$blogid.'" class="btn btn-outline-success mx-2"> DownVote</a>
          <button type="button" class="btn btn-outline-success mx-2">Tooltip on right</button>
           </form>

          </div>
       </div>
       </div>';
      

       

           
        
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