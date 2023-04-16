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
        <title>E-Commerce</title>
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
                                <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i> <sup><?php 
                                        getcartitems();
                                        
                                        ?></sup></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Total price :<?php
                                    total_cart_price();
                                    ?>/-</a>
                            </li>
                        </ul>
                        <form class="d-flex" role="search" action="search_product.php" method="get">
                            <input class="form-control me-2" type="search" placeholder="Search" name="search_data"
                                aria-label="Search" />
                            <!-- <button class="btn btn-outline-light btn-dark" type="submit">
                                Search
                            </button> -->
                            <input class="btn btn-dark" name="search_data_product" type="submit" value="Search">
                        </form>
                    </div>
                </div>
            </nav>
        </div>
        <!------navbar -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasRightLabel">Filter products here</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
  <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item">
                        <a class="nav-link text-light bg-info rounded-2 my-2" href="index.php">
                            <h4 style="color: black">Delivery Brands</h4>
                        </a>
                    </li>
                    <?php
                    
                    getbrands();

?>

                    <li class="nav-item">
                        <a class="nav-link text-light bg-info rounded-2 my-2" href="index.php">
                            <h4 style="color: black">Categories</h4>
                        </a>
                    </li>
                    <?php
                    getcategories();

?>

                </ul>
  </div>
</div>
        <!-- second-navbar  -->
        <nav class="navbar navbar-expand-lg navbar-light bg-secondary">
                <div class="container-fluid">
                <ul class="navbar-nav me-auto mx-2">
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
                        echo "<a href='logout.php' style='color:red;' class='nav-link'>Logout</a>";
                    }
                    else{
                        echo "<a href='users_area/user_login.php'  class='nav-link'>Login</a>";
                    }
                    
                    
                    
                    ?>
                </li>
                
                    
            </ul>
                    <nav class="navbar navbar-expand-lg br">
                        <ul class="navbar-nav">
                            <li class="d-flex">
                                <h2 class='text-light'>Filter</h2>
                            <button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="fa-solid fa-filter" style='color:white'></i></button>
                            </li>
                        </ul>
                    </nav>
                </div>
            </nav>

        <!-- second-navbar  -->

        <!------header -->
        <div class="bg-light py-3">
            <h3 class="text-center">BRAND-STORE</h3>
        </div>
        <!------header -->

        <!-- main-section  -->

        <div class="row">
            <div class="col-md-12">
                <!-- products -->
                <div class="row">
                    <!-- fetching products -->
                    <?php 
                    getallproducts();
                    getuniquecategories();
              
                    getuniquebrands();
                    viewmoreproducts();
                    
                    ?>




                    <!-- rowend -->

                </div>
                <!-- colend -->
            </div>
            <!-- <div class="col-md-2" id="sidenav">
               
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item">
                        <a class="nav-link text-light bg-info rounded-2 my-2" href="index.php">
                            <h4 style="color: black">Delivery Brands</h4>
                        </a>
                    </li>
    

                    <li class="nav-item">
                        <a class="nav-link text-light bg-info rounded-2 my-2" href="index.php">
                            <h4 style="color: black">Categories</h4>
                        </a>
                    </li>


                </ul>
               
            </div> -->
        </div>

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