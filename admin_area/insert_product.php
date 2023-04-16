<?php
include('../includes/connect.php');

if(isset($_POST['insert_product']) && isset($_FILES['product_image1']) && isset($_FILES['product_image2']) && isset($_FILES['product_image3']))
{
    $product_title = $_POST['product-title'];
    $product_keyword = $_POST['product-description'];
    $product_decription = $_POST['product-keyword'];
    
    
    $product_category = $_POST['product_categories'];
    $product_brand= $_POST['product_brands'];
 
    $product_price = $_POST['product-price'];
 
    $product_status = "true";
 

    // storing images 
    // $product_image1 = $_FILES['product_image1']['name'];
    // $product_image2 = $_FILES['product_image2']['name'];
    // $product_image3 = $_FILES['product_image3']['name'];

    
    // // access images tmp name 
    // $temp_image1 = $_FILES['product_image1']['tmp_name'];
    // $temp_image2 = $_FILES['product_image2']['tmp_name'];
    // $temp_image3 = $_FILES['product_image3']['tmp_name'];


    if($product_title='' or $product_keyword='' or $product_decription='' or $product_category='' or $product_brand='' or$product_image1='' or $product_image2='' or $product_image3='' )
    {
        echo "<script>alert('Please fill all fields')</script>";
        exit();
    }
    else{
       
       
        $img_name1 = $_FILES['product_image1']['name'];    
        $tmp_name1 = $_FILES['product_image1']['tmp_name']; 
        $img_upload_path1 = 'productimages/'.$img_name1;
        move_uploaded_file( $tmp_name1,$img_upload_path1);

        
        $img_name2 = $_FILES['product_image2']['name'];    
        $tmp_name2 = $_FILES['product_image2']['tmp_name']; 
        $img_upload_path2 = 'productimages/'.$img_name2;
        move_uploaded_file( $tmp_name2,$img_upload_path2);

        
        $img_name3 = $_FILES['product_image3']['name'];    
        $tmp_name3 = $_FILES['product_image3']['tmp_name']; 
        $img_upload_path3 = 'productimages/'.$img_name3;
        move_uploaded_file( $tmp_name3,$img_upload_path3);
            
        
            
        
        
        // $img_name2 = $_FILES['product_image2']['name'];
        // $img_size2 = $_FILES['product_image2']['size'];
        // $tmp_name2 = $_FILES['product_image2']['tmp_name']; 
        // $img_ex2 = pathinfo($img_name2,PATHINFO_EXTENSION);
        // $img_ex_lc2 = strtolower($img_ex2);    
        // $new_img_name2 = uniqid("IMG-",true).'.'.$img_ex_lc2;
        // $img_upload_path2 = 'productimages/'.$new_img_name2;
        // move_uploaded_file( $tmp_name2,$img_upload_path2);



        
        // $img_name3 = $_FILES['product_image3']['name'];
        // $img_size3 = $_FILES['product_image3']['size'];
        // $tmp_name3 = $_FILES['product_image3']['tmp_name']; 
        // $img_ex3 = pathinfo($img_name3,PATHINFO_EXTENSION);
        // $img_ex_lc3 = strtolower($img_ex3);    
        // $new_img_name3 = uniqid("IMG-",true).'.'.$img_ex_lc3;
        // $img_upload_path3 = 'productimages/'.$new_img_name3;
        // move_uploaded_file( $tmp_name3,$img_upload_path3);
       
    //  echo $_POST['product_categories'];

        
 $insert_query = "INSERT INTO products(product_title,product_description,product_keyword,cat_id,brand_id,product_image1,product_image2,product_image3,product_price,status) VALUES('{$_POST['product-title']}','{$_POST['product-description']}','{$_POST['product-keyword']}','{$_POST['product_categories']}','{$_POST['product_brands']}','$img_name1','$img_name2','$img_name3','{$_POST['product-price']}','$product_status')";
//  

    
        
    $result_query = mysqli_query($con,$insert_query);
    if($result_query)
    {
        echo "<script>alert('updated succesfully')</script>";
        
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
        <title>Insert_products=Admin_dashboard</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp"
            crossorigin="anonymous" />
        <!-- <link rel="stylesheet" href="../style.css" /> -->
        <link rel="stylesheet" href="../all.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
            integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>

    <body class="bg-light">
        <div class="container">

            <h2 class="text-center my-2">Insert Products</h2>
            <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_title" class="form-label">Product title</label>
                    <input type="text" name="product-title" id="product_title" class="form-control"
                        placeholder="Enter product title" required>
                </div>
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_description" class="form-label">Product description</label>
                    <input type="text" name="product-description" id="product_description" class="form-control"
                        placeholder="Enter product description" required>
                </div>
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_keyword" class="form-label">Product keyword</label>
                    <input type="text" name="product-keyword" id="product_keyword" class="form-control"
                        placeholder="Enter product keyword" required>
                </div>

                <div class="form-outline mb-4 w-50 m-auto">
                    <select name="product_categories" id="" class="form-select">
                        <option value="">Select a category</option>
                        <?php
$sql = "SELECT * FROM categories";
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
                    <select name="product_brands" id="" class="form-select">
                        <option value="">Select a brand</option>
                        <?php
$sql = "SELECT * FROM brands";
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
                    <input type="file" name="product_image1" id="product_image1" class="form-control" required>
                </div>
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_image2" class="form-label">Product image2</label>
                    <input type="file" name="product_image2" id="product_image2" class="form-control" required>
                </div>
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_image3" class="form-label">Product image3</label>
                    <input type="file" name="product_image3" id="product_image3" class="form-control" required>
                </div>
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_price" class="form-label">Product price</label>
                    <input type="text" name="product-price" id="product_price" class="form-control"
                        placeholder="Enter product price" required>
                </div>
                <div class="form-outline mb-4 w-50 m-auto ">
                    <input type="submit" name="insert_product" class="btn btn-info mb-5 p-2" value="Insert Products">
                </div>

            </form>
        </div>

    </body>

</html>