<?php

// include('./includes/connect.php');


session_start();
//getting all products 

function getallproducts()
{
    global $con;

                
    if(!isset($_GET['brand']) && !isset($_GET['cat']))
    {
      
          $products_query = "SELECT * from products order by rand() ";
          $result_products = mysqli_query($con,$products_query);
          if($result_products)
          {
              while($product_data=mysqli_fetch_assoc($result_products))
              {
                  echo "
          <div class='col-md-4 mb-3'>
              <div class='card'>
                  <img src='./admin_area/productimages/{$product_data['product_image1']}' class='card-img-top'  />
                  <div class='card-body'>
                      <h5 class='card-title'>{$product_data['product_title']}</h5>
                      <p class='card-text'>
                          {$product_data['product_description']}
                      </p>
                      <p class='card-text'>
                                   Price: {$product_data['product_price']}/-
                                </p>
                      <a href='index.php?add_to_cart={$product_data['product-id']}' class='btn btn-info'>Add to cart</a>
                      <a href='product_details.php?product_id={$product_data['product-id']}' class='btn btn-outline-secondary'>View more</a>
                  </div>
              </div>
          </div>
         ";
              }
          }
                          
       
      }
}




function viewmoreproducts()
{
    global $con;

                
    if(isset($_GET['product_id']) )
    {
          $product_id = $_GET['product_id'];
          $products_query = "SELECT * from products where `product-id` =  $product_id";
          $result_products = mysqli_query($con,$products_query);
          
          if($result_products)
          {
              while($product_data=mysqli_fetch_assoc($result_products))
              {
                $img2=trim($product_data['product_image2']);
                $img3=trim($product_data['product_image3']);
                  echo "
          <div class='col-md-4 mb-3'>
              <div class='card'>
                  <img src='./admin_area/productimages/{$product_data['product_image1']}' class='card-img-top'  />
                  <div class='card-body'>
                      <h5 class='card-title'>{$product_data['product_title']}</h5>
                      <p class='card-text'>
                          {$product_data['product_description']}
                      </p>
                      <p class='card-text'>
                                   Price: {$product_data['product_price']}/-
                                </p>
                      <a href='index.php?add_to_cart={$product_data['product-id']}' class='btn btn-info'>Add to cart</a>
                      <a href='index.php' class='btn btn-outline-secondary'>Go to Home</a>
                  </div>
              </div>
          </div>
          <div class='col-md-4 mb-3 sp'>
             <img class='viewmoreimages' src='./admin_area/productimages/{$img2}' alt='{$product_data['product_image2']}' >
             
          </div>
          <div class='col-md-4 mb-3 sp'>
             <img class='viewmoreimages' src='./admin_area/productimages/{$img3}' >
             
          </div>
         ";
              }
          }
                          
       
      }
}















// getting products 


function getproducts(){
              global $con;

                
              if(!isset($_GET['brand']) && !isset($_GET['cat']))
              {
                
                    $products_query = "SELECT * from products order by rand() limit 0,6";
                    $result_products = mysqli_query($con,$products_query);
                    if($result_products)
                    {
                        while($product_data=mysqli_fetch_assoc($result_products))
                        {
                            echo "
                    <div class='col-md-4 mb-3'>
                        <div class='card'>
                            <img src='./admin_area/productimages/{$product_data['product_image1']}' class='card-img-top'  />
                            <div class='card-body'>
                                <h5 class='card-title'>{$product_data['product_title']}</h5>
                                <p class='card-text'>
                                    {$product_data['product_description']}
                                </p>
                                <p class='card-text'>
                                   Price: {$product_data['product_price']}/-
                                </p>
                                <a href='index.php?add_to_cart={$product_data['product-id']}' class='btn btn-info'>Add to cart</a>
                                <a href='product_details.php?product_id={$product_data['product-id']}' class='btn btn-outline-secondary'>View more</a>
                            </div>
                        </div>
                    </div>
                   ";
                        }
                    }
                                    
                 
                }
    }
             

// get unique categories
              function getuniquecategories(){
                global $con;

                
                if(isset($_GET['cat']))
                {
                  $category_id = $_GET['cat'];
                      $products_query = "SELECT * from products where cat_id=$category_id ";
                      
                      $result_products = mysqli_query($con,$products_query);
                      $num_of_rows = mysqli_num_rows($result_products);
                      if($num_of_rows>0)
                      {
                      if($result_products)
                      {
                          while($product_data=mysqli_fetch_assoc($result_products))
                          {
                              echo "
                      <div class='col-md-4 mb-3'>
                          <div class='card'>
                              <img src='./admin_area/productimages/{$product_data['product_image1']}' class='card-img-top'  />
                              <div class='card-body'>
                                  <h5 class='card-title'>{$product_data['product_title']}</h5>
                                  <p class='card-text'>
                                      {$product_data['product_description']}
                                  </p>
                                  <p class='card-text'>
                                   Price: {$product_data['product_price']}/-
                                </p>
                                  <a href='index.php?add_to_cart={$product_data['product-id']}' class='btn btn-info'>Add to cart</a>
                                  <a href='product_details.php?product_id={$product_data['product-id']}' class='btn btn-outline-secondary'>View more</a>
                              </div>
                          </div>
                      </div>
                     ";
                          }
                      }
                                      
                   
                  }
                  else{
                    echo" 
                    
                 <h1 style=color:red; class='text-center my-5'>No Stock Available For This Category !!</h1> 
                    
                    ";
                  }
                }
                  
                
     }




// get unique brands


function getuniquebrands()
{
    
    global $con;

                
    if(isset($_GET['brand']))
    {
      $brand_id = $_GET['brand'];
          $products_query = "SELECT * from products where brand_id=$brand_id ";
          
          $result_products_bybrand = mysqli_query($con,$products_query);
          $num_of_rows = mysqli_num_rows($result_products_bybrand);
          if($num_of_rows>0)
          {
          if($result_products_bybrand)
          {
              while($product_data=mysqli_fetch_assoc($result_products_bybrand))
              {
                  echo "
          <div class='col-md-4 mb-3'>
              <div class='card'>
                  <img src='./admin_area/productimages/{$product_data['product_image1']}' class='card-img-top'  />
                  <div class='card-body'>
                      <h5 class='card-title'>{$product_data['product_title']}</h5>
                      <p class='card-text'>
                          {$product_data['product_description']}
                      </p>
                      <p class='card-text'>
                                   Price: {$product_data['product_price']}/-
                                </p>
                      <a href='index.php?add_to_cart={$product_data['product-id']}' class='btn btn-info'>Add to cart</a>
                      <a href='product_details.php?product_id={$product_data['product-id']}' class='btn btn-outline-secondary'>View more</a>
                  </div>
              </div>
          </div>
         ";
              }
          }
                          
       
      }
      else{
        echo" 
        
     <h1 style=color:red; class='text-center my-5'>No Stock Available For This Brand !!</h1> 
        
        ";
      }
    }
}








              
// displaying brands in side nav

function getbrands()
{
    global $con;
    $sql = "SELECT * FROM brands";
$result = mysqli_query($con,$sql);
if($result)
{
  
  while($row = mysqli_fetch_assoc($result))
  {
    echo "<li class='nav-item bgg my-1'>
    <a class='nav-link text-light' href='index.php?brand={$row['brand_id']}'>
        <h6>{$row['brand_title']}</h6>
    </a>
</li>";
  }
}
}

  

 
function getcategories()
{

    global $con;
    $sql = "SELECT * FROM categories";
$result = mysqli_query($con,$sql);
if($result)
{
  
  while($row = mysqli_fetch_assoc($result))
  {
    echo "<li class='nav-item bgg my-1'>
    <a class='nav-link text-light' href='index.php?cat={$row['cat_id']}'>
        <h6>{$row['cat_title']}</h6>
    </a>
</li>";
  }
}
}



// searching products

function search_product()
{
    global $con;

       if(isset($_GET['search_data_product']))        
              {
                $search_data_value = $_GET['search_data'];
                    $search_query = "SELECT * from products where product_keyword like '%$search_data_value%' ";
                    $result_products = mysqli_query($con,$search_query);
                   
                    $num_of_rows = mysqli_num_rows($result_products);
                    if($num_of_rows>0){
                    if($result_products)
                    {
                        while($product_data=mysqli_fetch_assoc($result_products))
                        {
                            echo "
                    <div class='col-md-4 mb-3'>
                        <div class='card'>
                            <img src='./admin_area/productimages/{$product_data['product_image1']}' class='card-img-top'  />
                            <div class='card-body'>
                                <h5 class='card-title'>{$product_data['product_title']}</h5>
                                <p class='card-text'>
                                    {$product_data['product_description']}
                                </p>
                                <p class='card-text'>
                                   Price: {$product_data['product_price']}/-
                                </p>
                                <a href='index.php?add_to_cart={$product_data['product-id']}' class='btn btn-info'>Add to cart</a>
                                <a href='product_details.php?product_id={$product_data['product-id']}' class='btn btn-outline-secondary'>View more</a>
                            </div>
                        </div>
                    </div>
                   ";
                        }
                    }
                }  
                else{
                    echo" 
        
     <h1 style=color:red; class='text-center my-5'>No Stock Available For This search data !!</h1> 
        
        ";
      }
                }              
 }
                
        






 function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  





function  cart()
{
    if(isset($_GET['add_to_cart']))
    {
        global $con;
        $ip = getIPAddress() ;
        $get_product_id = $_GET['add_to_cart'];
        $select_query = "SELECT * from cart_details where ip_address ='$ip' and product_id=$get_product_id";
        $result_products = mysqli_query($con,$select_query);                 
        $num_of_rows = mysqli_num_rows($result_products);
        if($num_of_rows>0){
            echo " <script>alert('This item is already present in cart')</script>";
           echo "<script>window.open('index.php','_self')</script>";
        }
        else{
            $insert_query = "INSERT INTO cart_details(product_id,ip_address,quantity) VALUES($get_product_id,'$ip',1)";
            $query_result =   mysqli_query($con,$insert_query);  
            if($query_result)
            {
                echo " <script>alert('Item added to cart succesfully')</script>";
                echo "<script>window.open('index.php','_self')</script>";
            }
        }
    }
}
 





function getcartitems()
{
    
    global $con;
    $ip = getIPAddress() ;
    $get_query = "SELECT * from cart_details where ip_address ='$ip'";
    $result_get_query = mysqli_query($con,$get_query);
    $no_of_items =  mysqli_num_rows($result_get_query);
    if($no_of_items==0)
    {
        echo "+";
    }
   else{
    echo $no_of_items;
   }
    
}



function total_cart_price()
{
    global $con;
    $ip = getIPAddress() ;
    $total=0;
    $cart_query = "SELECT * from cart_details where ip_address='$ip '";
    $result = mysqli_query($con,$cart_query);
    while($row=mysqli_fetch_array($result))
    {
        $product_id = $row['product_id'];
        $select_products = "SELECT * from products where `product-id` = '$product_id'";
        $result_products = mysqli_query($con,$select_products);
        while($row_product_price=mysqli_fetch_array($result_products))
        {
            $product_price=array($row_product_price['product_price']) ;
            $product_values =array_sum($product_price);
            $total+=$product_values*$row['quantity'];
        }

        
    }
    echo $total  ;
}


 
function get_user_order_details()
{
    global $con;
    $user_name = $_SESSION['username'];
    $get_details = "SELECT * from users where username ='$user_name' ";
    $result_details = mysqli_query($con,$get_details);
    $row_query = mysqli_fetch_assoc($result_details);
    $user_id = $row_query['user_id'];
    if(!isset($_GET['edit_account']))
    {
        if(!isset($_GET['delete_account']))
        {
            if(!isset($_GET['myorders']))
            {
                $get_orders = "SELECT * from user_orders where user_id = $user_id and order_status='pending' ";
                $result_get_orders=mysqli_query($con, $get_orders);
                $num_pending_orders = mysqli_num_rows($result_get_orders);
                if($num_pending_orders>0)
                {
                    echo "<h3 class='text-center my-5'>You have <strong class='text-danger'>$num_pending_orders</strong> Pending Orders</h3>";
                    echo "<p class='text-center my-5'><a class='btn btn-primary' href='user_profile.php?myorders'>Show Pending Orders</a></p>";
                }
                else{
                    echo "<h3 class='text-center my-5'>You have No Pending Orders</h3>";
                    echo "<p class='text-center my-5'><a class='btn btn-primary' href='../index.php'>Explore Products</a></p>";
                }
            }
        }
    }
}




?>