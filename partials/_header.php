
<?php
session_start();
echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">chefblogs</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
       
      </ul>';
      if(isset($_SESSION['login']) and $_SESSION['login'] == 'true') {

      echo'<form class="d-flex">
        <button type = "button" class="btn btn-success mx-2">'.$_SESSION['username'].'</button>
        <a href = "partials/_signout.php" class="btn btn-success mx-2">Sign Out</a>
      </form>';
      }
      else{
        echo '<form class="d-flex">
        <button type = "button" class="btn btn-outline-success mx-2" data-bs-toggle="modal" data-bs-target="#loginModal">Sign in</button>
        <button class="btn btn-outline-success mx-2" type="submit">Sign Up</button>
      </form>';
      }
  echo '  </div>
  </div>
</nav>';

include 'partials/_loginmodal.php';

?>






