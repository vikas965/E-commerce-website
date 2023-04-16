<?php

include('../includes/connect.php');

if(isset($_POST['submit']))
{
    $cat_title = $_POST['cat_title'];
    $select_query = "SELECT * from categories where cat_title='$cat_title'";
    $result_select = mysqli_query($con,$select_query);
    $num_rows = mysqli_num_rows($result_select);
    if($num_rows>0)
    {
        echo "<script>alert('This category is already exits')</script>";
    }
    else{
    $sql = "INSERT into categories(cat_title) VALUES('$cat_title')";
    $result = mysqli_query($con,$sql);
    if($result)
    {
        echo "<script>alert('Category has been inserted succesfully')</script>";
    }
}
}
?>










<h2 class="text-center">Insert Categories</h2>

<form action="" method="post" class="mb-2">

    <div class="input-group mb-2 w-90">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="cat_title" placeholder="Insert categories" aria-label="Username"
            aria-describedby="basic-addon1">
    </div>
    <div class="input-group mb-2 w-10 m-auto">

        <input type="submit" class="bg-info border-0 my-3 p-2" name="submit" value=" Insert categories">
        <!-- <button class="bg-info p-2 my-3 border-0">Insert categories</button> -->
    </div>

</form>