<?php


echo '<div class="modal fade" id="addnewblogModal" tabindex="-1" aria-labelledby="addnewblogModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addnewblogModalLabel">Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       
       <!-- login form -->
      <form action = "partials/_handlenewblog.php" method = "post">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">blog title</label>
                    <input type="text" class="form-control" id="blogtitle" name = "blogtitle">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">blog desc</label>
                    <input type="text" class="form-control" id="blogdesc" name = "blogdesc">
                </div>
                <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Write your blog here</label>
                <input type="text" class="form-control" id="bloginfo" name = "bloginfo">
                </div>
              
                <button type="submit" class="btn btn-success">Submit</button>
       </form>

       
      </div>
      <div class="modal-footer">
         
           
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
            
   


   
          
         
       
        
      
      </div>
    </div>
  </div>
</div>';
if(isset($_GET['addnewblogsucess']) && $_GET['addnewblogsucess'] == "true"){
    echo '<div class="alert alert-success alert-dismissible fade show m-0" role="alert">
    <strong>Holy guacamole!</strong> You have successfully signed up, Now you can login.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}else if(isset($_GET['addnewblogsucess']) && $_GET['addnewblogsucess'] == 'false'){
  $error = $_GET['error'];
echo '<div class="alert alert-danger alert-dismissible fade show m-0" role="alert">
<strong>Error: </strong> You have not logged in.
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

?>