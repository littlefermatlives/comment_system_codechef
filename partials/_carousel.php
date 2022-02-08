<?php 
echo '<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="./img/blog2.jpeg" class="d-block w-100" style="max-height:500px;" alt="...">
      <div class="carousel-caption d-none d-md-block">
      <button type = "button" class="btn btn-outline-success mx-2" data-bs-toggle="modal" data-bs-target="#addnewblogModal">Add new blog</button>
      </div>
    </div>
    <div class="carousel-item">
      <img src="./img/blog4.jpeg" class="d-block w-100" style="max-height:500px;"  alt="...">
      <div class="carousel-caption d-none d-md-block">
      <button type = "button" class="btn btn-outline-success mx-2" data-bs-toggle="modal" data-bs-target="#addnewblogModal">Add new blog</button>
      </div>
    </div>
    <div class="carousel-item">
      <img src="./img/blog6.jpeg" class="d-block w-100" style="max-height:500px;" alt="...">
      <div class="carousel-caption d-none d-md-block">
      <button type = "button" class="btn btn-outline-success mx-2" data-bs-toggle="modal" data-bs-target="#addnewblogModal">Add new blog</button>
     
       
    </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>';
include 'partials/_addnewblog.php';
?>