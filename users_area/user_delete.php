<?php

if(isset($_POST['delete']))
{
$username_session = $_SESSION['username'];
$delete_query = "DELETE from users where username='$username_session'";
$delete_exe= mysqli_query($con,$delete_query);

if($delete_exe)
{
    session_destroy();
    echo "<script>alert('Account Deleted Succesfully')</script>";
    echo "<script>window.open('../index.php','_self')</script>";

}

}

?>

<h1 class="my-5">Are You Sure ?  Want to Delete Your Account </h1>


<form action="" method="post"  >
       
        
       
        
        <input class='form-control w-50 m-auto my-5 bg-danger text-light' name="delete" type="submit" value="YES">
       <a href="user_profile.php" class="btn w-50 m-auto bg-primary text-light mb-2">NO</a>
  
    </form>