

<?php

if(isset($_POST['update']))
{
    $user_session_name = $_SESSION['username'];
    $get_user_data = "SELECT * from users where username = '$user_session_name '";
    $result_user_data = mysqli_query($con,$get_user_data );
    $user_data = mysqli_fetch_assoc($result_user_data);
    $user_id = $user_data['user_id'];
    $user_image =  $user_data['user_image'];
    $username = $_POST['username'];
    $useremail = $_POST['useremail'];
    if(!isset($_FILES['userimage']))
    {
        $userimage = $user_image;
       
    }
    
    $userimage = $_FILES['userimage']['name'];
    $userimage_tmp = $_FILES['userimage']['tmp_name'];
    $useraddress = $_POST['useraddress'];
    $usermobile = $_POST['usermobile'];
    $img_upload_path = 'userimages/'.$userimage;
    $update_query = "UPDATE users set username='$username', user_email ='$useremail', user_image ='$userimage', user_address ='$useraddress', user_mobile ='$usermobile' where user_id= $user_id ";
    $result_update_query = mysqli_query($con,$update_query);
    if( $update_query)
    {
        unlink('userimages/'.$user_image);
        move_uploaded_file( $userimage_tmp,$img_upload_path);
        echo "<script>alert('Updated Succesfully Login again to see updated result')</script>";
        echo "<script>window.open('../logout.php','_self')</script>";
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
</head>
<body>
    <h2 class='text-center my-2 mb-4 text-success'>Edit Account </h2>
    <form action="" method="post" enctype="multipart/form-data" >
        <div class="form-outline mb-4">
            <input class='form-control w-50 m-auto' type="text" name="username" value="<?php echo $username?>">
        </div>
        <div class="form-outline mb-4">
            <input class='form-control w-50 m-auto' type="email" name="useremail" value="<?php echo $user_email?>">
        </div>
        <div class="form-outline mb-4 d-flex w-50 m-auto">
            <input class='form-control m-auto' type="file" name="userimage" value="<?php echo $userimage?>" required>
            <img class="user_image" src="./userimages/<?php echo $user_image?>" alt="user profile" width="100" height="100" >
        </div>
        <div class="form-outline mb-4">
            <input class='form-control w-50 m-auto' type="text" name="useraddress" value="<?php echo $user_address?>">
        </div>
        <div class="form-outline mb-4">
            <input class='form-control w-50 m-auto' type="text" name="usermobile"value="<?php echo $user_mobile?>">
        </div>
        
        <input class='btn btn-primary' name="update" type="submit" value="Update">
  
    </form>

    
</body>


</html>