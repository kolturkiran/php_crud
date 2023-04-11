<?php
  include 'connect.php'; 
  if(isset($_POST['submit'])){
    $image=$_FILES['file']['file'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $password=$_POST['password'];
    $state=$_POST['state'];
    $dob=date('y-m-d', strtotime($_POST['dateofbirth']));
    $gender=$_POST['gender'];
    $sql="insert into `crud` (user_image, name, email, mobile, password, state, dob, gender) values('$image', $name', '$email', '$mobile', '$password', '$state', '$dob', '$gender')";
    $result=mysqli_query($con, $sql);
    if($result){
      header('location:display.php');
    }
    else{
      die(mysqli_error($con));
    }
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>crud operation</title>    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="container my-5 mx-5" >
       <form method="post" enctype="multipart/form-data">
        <div class="mb-3 my-5">
    <label  class="form-label">Upload Image</label>
    <input type="file" class="form-control" id="" name="file" placeholder="Enter your name" autocomplete="off" style="width: 20%;">  
  </div>
  <div class="mb-3 my-5">
    <label  class="form-label">Name</label>
    <input type="text" class="form-control" id="" name="name" placeholder="Enter your name" autocomplete="off" style="width: 30%;">  
  </div>
  <div class="mb-3 my-5">
    <label  class="form-label">Email</label>
    <input type="email" class="form-control" id="" name="email" placeholder="Enter your email" autocomplete="off" style="width: 30%;">
  </div>
  <div class="mb-3 my-5">
    <label  class="form-label">Mobile</label>
    <input type="text" class="form-control" id="" name="mobile" placeholder="Enter your mobile no." autocomplete="off" style="width: 30%;">
  </div>
  <div class="mb-3 my-5">
    <label  class="form-label">Password</label>
    <input type="text" class="form-control" id="" name="password" placeholder="Enter your password" autocomplete="off" style="width: 30%;">
  </div>  

  <div class="mb-3 my-5">
    <label  class="form-label">State</label>
    <div class="dropdown">    
    <select name="state" style="width: 20%;">
      <option value="selected">--Select your state--</option>
      <option>Karnataka</option>
      <option>Telangana</option>
      <option>Maharashtra</option>
    </select>
  </div>
  </div> 
  <div class="mb-3 my-5">
    <label  class="form-label">Date of birth</label>
    <input type="date"  class="form-control" id="" name="dateofbirth"  value=""/ style="width: 20%;">
  </div>
  <div class="mb-3 my-5">
    <label  class="form-label">Gender</label>
    <div class="form-check">
  <input class="form-check-input" type="radio" name="gender" id="male" value="male" required>
  <label class="form-check-label" for="flexRadioDefault1">
    Male
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="gender" id="female" value="female" required>
  <label class="form-check-label">
    Female
  </label>
</div>
  </div>
  
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
   
    
  </body>
</html>
