<?php

include('../includes/connect.php');

if(isset($_POST['submit']))
{
    $brand_title = $_POST['brand_title'];
    $select_query = "SELECT * from brands where brand_title='$brand_title'";
    $result_select = mysqli_query($con,$select_query);
    $num_rows = mysqli_num_rows($result_select);
    if($num_rows>0)
    {
        echo "<script>alert('This brand is already exits')</script>";
    }
    else{
    $sql = "INSERT into brands(brand_title) VALUES('$brand_title')";
    $result = mysqli_query($con,$sql);
    if($result)
    {
        echo "<script>alert('Brand has been inserted succesfully')</script>";
    }
}
}
?>










<h2 class="text-center">Insert Brands</h2>


<form action="" method="post" class="mb-2">

    <div class="input-group mb-2 w-90">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="brand_title" placeholder="Insert Brands" aria-label="Username"
            aria-describedby="basic-addon1">
    </div>
    <div class="input-group mb-2 w-10 m-auto">

        <!-- <input type="submit" class="form-control bg-info" name="cat_title" value="Insert categories"> -->
        <input type="submit" class="bg-info border-0 my-3 p-2" name="submit" value=" Insert Brands">
    </div>

</form>