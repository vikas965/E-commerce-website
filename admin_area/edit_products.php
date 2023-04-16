<?php

include('../includes/connect.php');
if(isset($_GET['edit_products']))
{
    $product_id = $_GET['edit_products'];
    $get_product_details = "SELECT * from products where `product-id`=  $product_id";
    $result_product = mysqli_query($con, $get_product_details);
    $row = mysqli_fetch_assoc($result_product);
    $product_title = $row['product_title'];
    $product_desc = $row['product_description'];
    $product_keyword=$row['product_keyword'];

    $cat_id = $row['cat_id'];
    $get_cat_title = "SELECT * from categories where cat_id =$cat_id  ";
    $result_cat_title = mysqli_query($con,$get_cat_title);
    $cat_title_fetch = mysqli_fetch_assoc($result_cat_title);
    $cat_title =  $cat_title_fetch['cat_title'];
    
    $brand_id = $row['brand_id'];
    $get_brand_title = "SELECT * from brands where brand_id =$brand_id  ";
    $result_brand_title = mysqli_query($con,$get_brand_title);
    $brand_title_fetch = mysqli_fetch_assoc($result_brand_title);
    $brand_title =  $brand_title_fetch['brand_title'];
    
    $image1=$row['product_image1'];
    $image2=$row['product_image2'];
    $image3=$row['product_image3'];

    $product_price = $row['product_price'];


}


if(isset($_POST['edit_product']) )
{
    $producttitle = $_POST['product_title'];
    $product_desc = $_POST['product_description'];
    $product_key = $_POST['product_keyword'];
    $product_cat = $_POST['product_categories'];
    $product_brand = $_POST['product_brands'];
    $product_price=$_POST['product_price'];

    $product_img1 = $_FILES['product_image1']['name'];
    $product_img1_tmp = $_FILES['product_image1']['tmp_name'];

    $product_img2 = $_FILES['product_image2']['name'];
    $product_img2_tmp = $_FILES['product_image2']['tmp_name'];

    $product_img3 = $_FILES['product_image3']['name'];
    $product_img3_tmp = $_FILES['product_image3']['tmp_name'];
    
    $imgpath1= 'productimages/'.$product_img1;
    $imgpath2= 'productimages/'.$product_img2;
    $imgpath3= 'productimages/'.$product_img3;



    
   $update_query = "UPDATE products  set product_title ='$producttitle' , product_description='$product_desc',product_keyword='$product_key',cat_id=$product_cat, brand_id =$product_brand,product_image1='$product_img1',
   product_image2=' $product_img2',product_image3=' $product_img3',product_price=' $product_price' where `product-id`=$product_id ";

   $update_result = mysqli_query($con,$update_query);
    if($update_result)
    {
        move_uploaded_file( $product_img1_tmp,$imgpath1);
        move_uploaded_file( $product_img2_tmp,$imgpath2);
        move_uploaded_file( $product_img3_tmp,$imgpath3);
        echo"<script>alert('Updated Succesfully')</script>";
        echo"<script>window.open('index.php?view_products','_self')</script>";
    }


    





}

?>
<h1 class="text-center my-3">Edit Product</h1>
<form action="" method="post" enctype="multipart/form-data" autocomplete="off" >
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_title" class="form-label">Product title</label>
                    <input type="text" name="product_title" id="product_title" class="form-control text-capitalize"
                        placeholder="Enter product title" value="<?php echo  $product_title?>" required>
                </div>
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_description" class="form-label">Product description</label>
                    <input type="text" name="product_description" id="product_description" class="form-control text-capitalize"
                        placeholder="Enter product description" value="<?php echo   $product_desc?>" required>
                </div>
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_keyword" class="form-label">Product keyword</label>
                    <input type="text" name="product_keyword" id="product_keyword" class="form-control text-capitalize"
                        placeholder="Enter product keyword" value="<?php echo   $product_keyword?>" required>
                </div>

                <div class="form-outline mb-4 w-50 m-auto">
                    <select name="product_categories" id="" class="form-select text-capitalize" >
                        <option value="<?php echo $cat_id?>" > <?php echo $cat_title?></option>
                        <?php
$sql = "SELECT * FROM categories where cat_id!=$cat_id";
$result = mysqli_query($con,$sql);
if($result)
{
  
  while($row = mysqli_fetch_assoc($result))
  {
   echo "<option value={$row['cat_id']}>{$row['cat_title']}</option>";
  }
  
}
?>

                    </select>
                </div>
                <div class="form-outline mb-4 w-50 m-auto">
                    <select name="product_brands" id="" class="form-select text-capitalize">
                    <option value="<?php echo $brand_id?>"><?php echo $brand_title?></option>
                        <?php
$sql = "SELECT * FROM brands where brand_id!=  $brand_id";
$result = mysqli_query($con,$sql);
if($result)
{
  
  while($row = mysqli_fetch_assoc($result))
  {
   echo "<option value={$row['brand_id']}>{$row['brand_title']}</option>";
  }
}
?>

                    </select>
                </div>
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_image1" class="form-label">Product image1</label>
                    <div class="d-flex">
                   
                    <input type="file" name="product_image1" id="product_image1" class="form-control" required>
                    <img class='img' src="productimages/<?php echo $image1?>" alt="" width="80" height="80">
                    </div>
                </div>
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_image2" class="form-label">Product image2</label>
                    <div class="d-flex">
                    <input type="file" name="product_image2" id="product_image2" class="form-control" required>
                    <img class='img' src="productimages/<?php echo trim($image2)?>" alt="<?php echo $image2?>" width="80" height="80">
                    </div>
                </div>
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_image3" class="form-label">Product image3</label>
                    <div class="d-flex">
                    <input type="file" name="product_image3" id="product_image3" class="form-control" required>
                    <img class='img' src="productimages/<?php echo trim($image3)?>" alt="" width="80" height="80">
                    </div>
                </div>
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_price" class="form-label">Product price</label>
                    <input type="text" name="product_price" id="product_price" class="form-control"
                        placeholder="Enter product price" value="<?php echo  $product_price?>"  required>
                </div>
                <div class="form-outline mb-4 w-50 m-auto ">
                    <input type="submit" name="edit_product" class="btn btn-info mb-5 p-2" value="Edit Product">
                </div>

            </form>