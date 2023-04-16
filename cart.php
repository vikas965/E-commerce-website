<?php
include "./includes/connect.php";

include "./functions/common_function.php";
// session_start();
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>E-Commerce Cart details</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp"
            crossorigin="anonymous" />
        <link rel="stylesheet" href="./style.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
            integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />

        <link rel="stylesheet" href="./all.css" />

        <!-- <script src="https://kit.fontawesome.com/5f96a9611c.js" crossorigin="anonymous"></script> -->
    </head>

    <body>
        <style>
        .table_image {
            width: 7rem;
            height: 7rem;
            border-radius: 20px;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;

        }

        .btns {
            border: 0;
            border-radius: 10px;
            background: linear-gradient(to right, #4facfe 0%, #00f2fe 100%);
            box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
            width: 170px;
            height: 30px;
            text-decoration: none;
            /* color: white; */
        }

        .d-flex {
            column-gap: 50px;
        }
        </style>
        <!------navbar -->
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid">
                    <img id="logo" src="./images/logo.png" alt="" />
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-3">
                            <li class="nav-item mx-3">
                                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="displayall.php">Products</a>
                            </li>

                            
                            <?php
                                if(isset($_SESSION['username']))
                                {

                                    echo" <li class='nav-item mx-3'>
                                    <a class='nav-link' href='users_area/user_profile.php'>
    
                                    My profile
                                    </a>
                                </li>";
                                }
                                else{
                                    echo" <li class='nav-item mx-3'>
                                    <a class='nav-link' href='users_area/user_register.php'>
    
                                    Register
                                    </a>
                                </li>"; 
                                }
                                
                                ?>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Contact</a>
                            </li>
                            <li class="nav-item mx-3">
                                <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i> <sup>
                                        <?php 
                                        getcartitems();
                                        
                                        ?>
                                    </sup></a>
                            </li>

                        </ul>

                    </div>
                </div>
            </nav>
        </div>
        <!------navbar -->


        <?php
        cart();
?>

        <!-- second-navbar  -->
        <div class="navbar navbar-expand-lg navbar-dark bg-secondary px-4 py-2">
            <ul class="navbar-nav me-auto">
            <li class="nav-item">
                    <a href="#" class="nav-link"> <span style='font-size: large;color: rgb(0, 255, 234);'> <?php if(isset($_SESSION['username']))
                    {
                        echo 'Welcome '.$_SESSION['username'];
                    }
                    else{
                        echo "Welcome Guest";
                    }
                    ?></a></span>


                    
                    
                </li>
                <li class="nav-item">
                    <?php
                    if(isset($_SESSION['username']))
                    {
                        echo "<a href='index.php?logout' style='color:red;' class='nav-link'>Logout</a>";
                    }
                    else{
                        echo "<a href='users_area/user_login.php'  class='nav-link'>Login</a>";
                    }
                    
                    
                    
                    ?>
                </li>
            </ul>
        </div>

        <!-- second-navbar  -->

        <!------header -->
        <div class="bg-light py-3">
            <h3 class="text-center">BRAND-STORE</h3>
        </div>
        <!------header -->

        <!-- main-section  -->

        <div class="container">
            <div class="row">
                <?php 
                $ip = getIPAddress() ;
       
                $carts_query = "SELECT * from cart_details where ip_address='$ip '";
                $resulttotal = mysqli_query($con,$carts_query);
                $num_of_products = mysqli_num_rows($resulttotal);
                if($num_of_products==0)
                {
                 echo "   <h1 style=color:red; class='text-center my-5 text-capitalize'>Cart is empty !!</h1> ";
                }
                
                
                ?>
                <form action="" method="post">
                    <div class='table-responsive'>
                    <table class="table table-bordered text-center">

                        <?php
                        if($num_of_products!=0)
                        {
                            echo "<thead>
                        <tr>
                            <th>Product Title</th>
                            <th>Product Image</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Remove</th>
                            <th colspan='2'>Operations</th>
                        </tr>
                    </thead>
                    <tbody>";
                        }
                        // showcartdetails();
                        global $con;
                        $ip = getIPAddress() ;
                        $total=0;
                        $cart_query = "SELECT * from cart_details where ip_address='$ip '";
                        $result = mysqli_query($con,$cart_query);
                        $num_of_products = mysqli_num_rows($result);

                        
                        while($row=mysqli_fetch_array($result))
                        {
                            $product_id = $row['product_id'];
                            $select_products = "SELECT * from products where `product-id` = '$product_id'";
                            $result_products = mysqli_query($con,$select_products);
                            $row_products=mysqli_fetch_assoc($result_products);
                    
                            $row_product_price = $row_products['product_price'] * $row['quantity'];
                            echo "
                            <tr>
                                                <td ><div class='my-5 text-capitalize'>{$row_products['product_title']}</div></td>
                                                <td ><img class='table_image' src='./admin_area/productimages/{$row_products['product_image1']}' ></td>
                                  

                            <td><input class='my-5' type='number' name='qty' placeholder='{$row['quantity']}' required >

                            </td>


                            <td>
                                <div class=' my-5'>{$row_product_price}
                                </div>
                            </td>
                            <td> <input name='removeitem[]' class='form-input my-5' type='checkbox' value='$product_id'></td>
                            <td> <input name='update_cart' type='submit' class='btn btn-primary my-5'
                                    value='UPDATE CART'></td>
                            <td> <input name='remove_cart' type='submit' class='btn btn-danger my-5' value='REMOVE'>
                            </td>



                            </tr>




                            ";
                            }
                        
                            ?>
                        <!-- <tr> -->

                        <!-- <td >Apple</td>
                            <td ><img class=" table_image" src="./images/logo.png" alt=""></td>
                            <td><input type="number"></td>
                            <td>800</td>
                            <td><input type="checkbox"></td>
                            <td> Update</td>
                            <td>Delete</td> -->

                        <!-- </tr> -->
                        </tbody>
                    </table>
                    </div>
                    <?php

                if(isset($_POST['update_cart']))
                {
                    
                    
                    $new_quantity = $_POST['qty'];
                    
                    
                    $update_cart_query = "UPDATE cart_details set quantity=$new_quantity where ip_address='$ip' ";
                    
                    $result_update_query = mysqli_query($con, $update_cart_query);
                    if(  $result_update_query )
                    {
                        echo "<script>alert('updated succesfully')</script>";
                        echo"<script>window.open('cart.php','_self')</script>";
                       
                    }
                      
                 
                    
                }
               ?>

                    <!-- subtotal -->
                    <?php
                    if($num_of_products!=0)
                    {
                    echo "
                    
                    <div class=''>
                        <h4 class='px-4'>
                            SUBTOTAL : <strong class='text-info'>";

                                total_cart_price() ;
                                echo "
                                /-
                            </strong>

                        </h4>
                    ";
                    }
                        ?>
                    <a href="index.php" class="btn btn-primary my-2 "> Continue Shopping</a>
                    <?php
                        if($num_of_products!=0)
                        {
                            echo "<a class='btn btn-secondary my-2' href='checkout.php'> Check out</a>";
                        }
                        
                        
                        ?>

            </div>
        </div>
        </div>
        </form>

        <?php

function remove_cart_item()
{
    global $con;
    if(isset($_POST['remove_cart']))
    {
        foreach($_POST['removeitem'] as $remove_id)
        {
            echo $remove_id;
            $delete_query = "DELETE FROM cart_details where product_id =$remove_id ";
            $delete_result = mysqli_query($con,$delete_query);
            if($delete_result)
            {
                echo"<script>window.open('cart.php','_self')</script>";
            }
        }
    }
}

echo $remove_item = remove_cart_item();



?>
        <!-- main-section  -->

        <!-- -------footer---- -->

        <?php

        include("./includes/footer.php");
?>
        <!-- -------footer---- -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
        </script>
    </body>

</html>