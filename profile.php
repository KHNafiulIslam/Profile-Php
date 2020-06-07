<?php
include_once 'includes/dbh.inc.php';
session_start()
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Crime news</title>
  </head>
  <body>
<!--  navbar start-->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="index.php">CrimeBox</a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
<!--  navbar end-->
<!-- profile view start-->
<div class="container">
<div class="card mb-3">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="image/Profile.jpg" class="card-img" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">My Profile</h5>
        <?php
    
    if(isset($_SESSION['uid'])){
        
        $sql = "SELECT * FROM users WHERE user_name='{$_SESSION['uid']}'";
        $result = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_assoc($result))
            {
        echo "<b>Name: </b> ". $row['first_name']." ".$row['last_name'];
        echo "<br /><b>Email: </b> ".$row['email'];
        echo "<br /><b>City: </b> ".$row['city'];
        echo "<br /><b>Address :</b> ".$row['address'];
            }
    }
    else{
        echo "Please LogIn to see your profile!";
    }
          ?>
      </div>
    </div>
  </div>
</div>
</div>
<!-- profile view end-->
<!--buttons start-->
<?php
      if(isset($_SESSION['uid'])){
 echo '<div class="container">
  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">Edit Profile</button>
  
  <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#staticBackdrop">Delete Profile</button>
      </div>';
      }
?>
    <!--buttons end-->
<!-- Modal -->
<form action="includes/delete.inc.php" method="POST" class="form-inline">
<div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      </div>
      <div class="modal-body">
        Are you sure, You want to delete your profile?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="submit" class="btn btn-primary">Delete Profile</button>
      </div>
    </div>
  </div>
</div>
      </form>
<!--   modal end-->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<!--       update input-->
        
         <form action="includes/update.inc.php" method="POST">
         <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationCustom01">First name</label>
      <input type="text" class="form-control" name="first"  required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationCustom02">Last name</label>
      <input type="text" class="form-control" name="last"  required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
  </div>    
     <div class="form-group">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" name="email" >
    </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" name="address" >
  </div>
  <div class="form-row">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" name="city" >
  </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
    </div>
  </div>
  <button type="submit" class="btn btn-primary" name="submit" >Update</button>
</form>
      </div>
    </div>
  </div>
</div>
<!--   end modal-->
   <script src="js/jquery-3.4.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>