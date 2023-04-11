<?php
include 'connect.php';
$id=$_GET['updateid'];
 $sql="select * from `crud` where id=$id";  
 $result=mysqli_query($con, $sql);  
    $row=mysqli_fetch_assoc($result);        
         $name=$row['name'];
    $email=$row['email'];
    $mobile=$row['mobile'];
    $password=$row['password'];
    $state=$row['state'];
    $dob=$row['dob'];
    $gender=$row['gender'];
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $password=$_POST['password'];
	 $state=$_POST['state'];
   $dob=date('y-m-d', strtotime($_POST['dateofbirth']));
   $gender=$_POST['gender'];
	$sql="update `crud` set id=$id, name='$name', email='$email', mobile='$mobile',password='$password', state='$state', dob='$dob', gender='$gender' where id=$id";
	$result=mysqli_query($con, $sql);
    if($result){
      // echo "updated successfully";
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
  </head>
  <body>
    <div class="container">
       <form method="post">
  <div class="mb-3 my-5">
    <label  class="form-label">Name</label>
    <input type="text" class="form-control" id="" name="name" placeholder="Enter your name" autocomplete="off" value="<?php echo $name; ?>">  
  </div>
  <div class="mb-3 my-5">
    <label  class="form-label">Email</label>
    <input type="email" class="form-control" id="" name="email" placeholder="Enter your email" autocomplete="off" value="<?php echo $email; ?>">
  </div>
  <div class="mb-3 my-5">
    <label  class="form-label">Mobile</label>
    <input type="text" class="form-control" id="" name="mobile" placeholder="Enter your mobile no." autocomplete="off" value="<?php echo $mobile; ?>">
  </div>
  <div class="mb-3 my-5">
    <label  class="form-label">Password</label>
    <input type="text" class="form-control" id="" name="password" placeholder="Enter your password" autocomplete="off" value="<?php echo $password; ?>">
  </div>
   <div class="mb-3 my-5">
    <label  class="form-label">State</label>
    <div class="dropdown">    
    <select name="state">
      <option value="selected">--Select your state--</option>
      <option <?php if($state=='Karnataka')echo 'selected'; ?>>Karnataka</option>
      <option <?php if($state=='Telangana') echo 'selected'; ?>>Telangana</option>
      <option <?php if($state=='Maharashtra') echo 'selected'; ?>>Maharashtra</option>
    </select>
  </div>
  </div>
  <div class="mb-3 my-5">
    <label  class="form-label">Date of birth</label>
    <input type="date"  class="form-control" id="" name="dateofbirth"  value="<?php echo isset($dob)?$dob:null ?>"/>
  </div>
  <div class="mb-3 my-5">
    <label  class="form-label">Gender</label>
    <div class="form-check">
  <input class="form-check-input" type="radio" name="gender" id="male" value="male" required <?php if($gender=='male') echo 'checked' ?>>
  <label class="form-check-label" for="flexRadioDefault1">
    Male
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="gender" id="female" value="female" required <?php if($gender=='female') echo 'checked' ?>>
  <label class="form-check-label">
    Female
  </label>
</div>
  </div>  
  
  <button type="submit" name="submit" class="btn btn-primary">update</button>
</form>
    </div>
   
    
  </body>
</html>
