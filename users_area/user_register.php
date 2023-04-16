
<?php

include('../includes/connect.php');

include('../functions/common_function.php');
// session_start();

if(isset($_POST['submit']) && isset($_FILES['image']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $cpassword =md5($_POST['cpassword']);
    $number =$_POST['number'];
    $address =$_POST['address'];
    $ipaddress= getIPAddress();
    $img_name = $_FILES['image']['name'];    
    $tmp_name = $_FILES['image']['tmp_name']; 
    $img_upload_path = 'userimages/'.$img_name;
    
    $select_query="SELECT * from users where username='$username'";
    $result_select = mysqli_query($con,$select_query);
    $num_of_users = mysqli_num_rows($result_select);
    if($num_of_users>0)
    {
      echo "<script>alert('Username already exists')</script>";
    }
    else{
    if($password==$cpassword )
    {
    $insert_query = "INSERT INTO users(username,user_email,user_password,user_image,user_ipaddress,user_address,user_mobile) VALUES('$username','$email','$password','$img_name','$ipaddress','$address','$number')";
              
    $result_query = mysqli_query($con,$insert_query);
    move_uploaded_file( $tmp_name,$img_upload_path);
    echo "<script>alert('Registered succesfully')</script>";
    echo "<script>window.open('./user_login.php')</script>";
        
    }
    else{
      echo "<script>alert('Passwords Doesnt Match')</script>";
    }


  }
    

   
  
  }
    


?>











<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp"
            crossorigin="anonymous" />

        <link rel="stylesheet" href="../style.css" />
</head>
<body>
    <style>



form{
        height: 100vh;
       background: url('https://media.giphy.com/media/i4jKn7itdV2Tvjzj6Y/giphy.gif');
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        /* overflow-y: hidden; */
        /* padding-top: 4rem; */
        padding-left: 2rem;
        padding-right: 2rem;
    }
       


label{
    color:white;
}
h1{
    color: white;
}
    </style>
<!-- <video autoplay muted loop id="myVideo">
  <source src="background.mp4" type="video/mp4">
</video> -->
<div class="overlay">
    
<form class="row" action="" method="post" enctype="multipart/form-data">
<h1 class="text-center my-2">User Registration </h1>
    <div class="col-md-6">
        <label for="username" class="form-label">Username</label>
        <input name="username" type="text" class="form-control" id="username" placeholder="Enter Username">
      </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Email</label>
    <input name="email" type="email" class="form-control" id="inputEmail4" placeholder="Enter Email">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Password</label>
    <input name="password" type="password" class="form-control" id="inputPassword4" placeholder="Enter Passsword">
  </div>
  <div class="col-md-6">
    <label for="confirmpassword" class="form-label">Confirm Password</label>
    <input name="cpassword" type="password" class="form-control" id="confirmpassword" placeholder="Confirm Your Password">
  </div>
  <div class="col-12">
    
    <label for="formFile" class="form-label">Upload Your Image</label>
  <input name="image" class="form-control" type="file" id="formFile">
  </div>
  <div class="col-md-6">
    <label for="mobile" class="form-label">Mobile Number</label>
        <input  name="number" type="number" class="form-control" id="mobile" placeholder="Enter mobile number">
  </div>
  <div class="col-md-6">
    
    <label for="inputAddress" class="form-label">Address</label>
    <input name="address" type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
  </div>
  
  
  <div class="col-12 my-4">
    <input name="submit" value="Register" type="submit" class="btn btn-primary w-100">
  </div>
</form>
</div>
</body>
</html>