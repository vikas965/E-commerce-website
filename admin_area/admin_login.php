

<?php

include('../includes/connect.php');

// include('../functions/common_function.php');


session_start();
if(isset($_SESSION['adminname']))
{
    echo "<script>window.open('index.php','_self')</script>";
}
else{

    if(isset($_POST['login']))
    {
        $adminname = $_POST['username'];
        $password = md5($_POST['password']);
        
        $user_fetch_query = "SELECT * from admins where admin_name='$adminname'";
        $result_user_fetch = mysqli_query($con, $user_fetch_query);

        if($result_user_fetch)
        {
            $row = mysqli_fetch_assoc($result_user_fetch);
            if($password==$row['admin_password'])
            {

                $_SESSION['adminname']=$adminname;
                echo "<script>alert('Login Succesfull')</script>";
                echo "<script>window.open('index.php','_self')</script>";
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
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp"
            crossorigin="anonymous" />

</head>
<body>
   <style>
    body{
        height: 100vh;
        background: url('https://media.giphy.com/media/l0K4lUxBzIOeJd1EA/giphy.gif');
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        overflow-y: hidden;
        padding-top: 100px;
    }
    h2{
        color: white;
    }
    label{
        color: white;
    }
    
   </style>
    
    

    <div class="container-fluid my-5">
    <h2 class="text-center">Login</h2>
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-lg-12 col-xl-6">
            <form action="" method="post" autocomplete="off">
                <div class="form-outline mb-4">
                    <label for="username" class="form-label">Adminname</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Enter Adminname" required>
                </div>
                <div class="form-outline mb-4">
                    <label for="password" class="form-label">password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter password" required>
                </div>
                <div class="form-outline mb-4">
                   
                    <input type="submit" name="login" id="login" value="Login" class="form-control btn btn-dark" >
                </div>
                <div class="form-outline mb-4">
                   
                    <label  class="form-label">Not a admin ? <a class="btn btn-primary" href="./admin_register.php">Sign Up </a></label>
                </div>
            </form>
        </div>
    </div>
    </div>
    

</body>
</html>