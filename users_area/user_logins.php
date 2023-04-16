


<?php
session_start();
include('includes/connect.php');

include('functions/common_function.php');



if(isset($_SESSION['username']))
{
    echo "<script>window.open('index.php','_self')</script>";
}
else{

    if(isset($_POST['login']))
    {
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        
        $user_fetch_query = "SELECT * from users where username='$username'";
        $result_user_fetch = mysqli_query($con, $user_fetch_query);




// cart items 
        $user_ip = getIPAddress();
        $user_cart_query ="SELECT * FROM cart_details where ip_address= '$user_ip'";
        $select_cart = mysqli_query($con, $user_cart_query);
        $count_cart = mysqli_num_rows($select_cart);

        if($result_user_fetch)
        {
            $row = mysqli_fetch_assoc($result_user_fetch);
            $row_count=mysqli_num_rows($result_user_fetch);
            if($password==$row['user_password'])
            {

                $_SESSION['username']=$username;
                if($row_count==1 and  $count_cart==0)
                {
                    echo "<script>alert('Login Succesfull')</script>";
                echo "<script>window.open('../index.php','_self')</script>";
                }
                else{
                echo "<script>alert('Login Succesfull')</script>";
                echo "<script>window.open('payment.php','_self')</script>";
                }
            }
            else{
                echo "<script>alert('Username and password doesnt match')</script>";
            }
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
    <title>User login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp"
            crossorigin="anonymous" />

        <link rel="stylesheet" href="../style.css" />
</head>
<body>
    <style>
        video {
  object-fit: cover;
  position: absolute;
  width: 100%;
  height: 100vh;
  position: absolute;
  z-index: 1;
  /* overflow:hidden; */
}

.overlay {
  position: absolute;
  margin:auto;
 top:100px;
 left:50px;
right:50px;
/* bottom:50px; */
  padding: 3rem;
  padding-top: 1rem;
  /* padding-bottom: 2rem; */
  
  /* right: 10; */
  z-index: 2;
  background: rgba(0,0,0,0.6);
  overflow:hidden;
  
}
label{
    color:white;
}
h1{
    color: white;
}

.back{
    color: white;
}
    </style>
<video autoplay muted loop id="myVideo">
  <source src="background.mp4" type="video/mp4">
</video>

    <div class="overlay">
        <h1 class="text-center">User Login </h1>
    <form class="row g-3" action="" method="post">
        <div class="col-12">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" placeholder="Enter Username">
          </div>
      
      <div class="col-md-12">
        <label for="inputPassword4" class="form-label">Password</label>
        <input type="password" class="form-control" id="inputPassword4" placeholder="Enter Passsword">
      </div>
    
      
      
      <div class="col-12 my-4">
        <input value="Login" type="submit" class="btn btn-primary w-100">
      </div>

     
       <div class="back">
        Not a User ? <a href="users_area/user_register.php" class="">Register</a>
       </div>
     
    </form>
    </div>

</body>
</html>