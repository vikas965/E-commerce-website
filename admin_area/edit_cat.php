<?php
include('../includes/connect.php');
if(isset($_GET['edit_cat']))
{
    $cat_id = $_GET['edit_cat'];
    $get_categories = "SELECT * from categories where cat_id =$cat_id ";
    $result_get_cat = mysqli_query($con,$get_categories);
    $row= mysqli_fetch_assoc($result_get_cat);
    $get_title = $row['cat_title'];
    

}

if(isset($_POST['edit']))
{
    $cat_title = $_POST['cat_title'];
    $sql = "UPDATE  categories set cat_title ='$cat_title' where cat_id=$cat_id";
    $result = mysqli_query($con,$sql);
    if($result)
    {
        echo "<script>alert('Category has been updated Succesfully')</script>";
        echo"<script>window.open('index.php?view_categories','_self')</script>";
    }
}
?>








<h2 class="text-center my-2">Edit Category</h2>

<form action="" method="post" class="mb-2">

    <div class="input-group mb-2 w-90">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control text-capitalize" name="cat_title"  aria-label="Username"
            aria-describedby="basic-addon1" value="<?php echo $get_title?>">
    </div>
    <div class="input-group mb-2 w-10 m-auto">

        <input type="submit" class="bg-info border-0 my-3 p-2" name="edit" value="Edit category">
        <!-- <button class="bg-info p-2 my-3 border-0">Insert categories</button> -->
    </div>

</form>