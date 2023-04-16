<?php
include('../includes/connect.php');
if(isset($_GET['edit_brand']))
{
    $brand_id = $_GET['edit_brand'];
  
    $get_brands = "SELECT * from brands where brand_id =$brand_id ";
    $result_get_brand = mysqli_query($con,$get_brands);
    $row= mysqli_fetch_assoc($result_get_brand);
    $get_title = $row['brand_title'];
    

}

if(isset($_POST['edit']))
{
    $brand_title = $_POST['brand_title'];
    $sql = "UPDATE  brands set brand_title ='$brand_title' where brand_id=$brand_id";
    $result = mysqli_query($con,$sql);
    if($result)
    {
        echo "<script>alert('Brand has been updated Succesfully')</script>";
        echo"<script>window.open('index.php?view_brands','_self')</script>";
    }
}
?>








<h2 class="text-center my-2">Edit Brand</h2>

<form action="" method="post" class="mb-2">

    <div class="input-group mb-2 w-90">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control text-capitalize" name="brand_title"  aria-label="Username"
            aria-describedby="basic-addon1" value="<?php echo $get_title?>">
    </div>
    <div class="input-group mb-2 w-10 m-auto">

        <input type="submit" class="bg-info border-0 my-3 p-2" name="edit" value="Edit Brand">
        <!-- <button class="bg-info p-2 my-3 border-0">Insert categories</button> -->
    </div>

</form>