<?php
include "../includes/connect.php";

include "../functions/common_function.php";
// @session_start();

if(isset($_SESSION['username']))
{
    $username=$_SESSION['username'];
    $user_fetch = "SELECT * from users where username='$username'";
    $user_fetch_result = mysqli_query($con,$user_fetch);
    if( $user_fetch_result)
    {
        $user_details = mysqli_fetch_assoc($user_fetch_result);
        $user_email = $user_details['user_email'];
        $user_address = $user_details['user_address'];
        $user_mobile = $user_details['user_mobile'];
        $user_image = $user_details['user_image'];
    }
}

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
        <link rel="stylesheet" href="../style.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
            integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />

        <link rel="stylesheet" href="./all.css" />

        <!-- <script src="https://kit.fontawesome.com/5f96a9611c.js" crossorigin="anonymous"></script> -->
    </head>

    <body>
        <style>
            body{
                background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            }
            .user_image{
                filter: contrast(100%);
                border-radius: 10px;
                
                box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
            }
            .nav-item:hover{
                background: none;
            }
            .bh{
                background: linear-gradient(120deg, #a1c4fd 0%, #c2e9fb 100%);
               margin: 0.6rem;
                display: flex;
                justify-content: center;
                align-items: center;
                border-radius: 4px;
                /* padding-left: 0.2rem;
                padding-right: 0.2rem; */
            }
            .image{
                width: 190px;
                height: 190px;
                display: flex;
                justify-content: center;
                align-items: center;
                border-radius: 10px;
                margin-bottom: 20px;
                background: linear-gradient(120deg, #a1c4fd 0%, #c2e9fb 100%);
                
                box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
            }
            .bgc{
                background:lightskyblue
            }
            .bgr{
                background: rgba(14, 40, 19, 0.751);
                
            }
            a{
                text-decoration: none;
            }
        </style>
        <!------navbar -->
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid">
                    <img id="logo" src="../images/logo.png" alt="" />
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-3">
                            <li class="nav-item mx-3">
                                <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../displayall.php">Products</a>
                            </li>
                            <?php
                            if(isset($_SESSION['username']))
                            {

                                echo" <li class='nav-item mx-3'>
                                <a class='nav-link' href='user_profile.php'>

                                My profile
                                </a>
                            </li>";
                            }
                            else{
                                echo" <li class='nav-item mx-3'>
                                <a class='nav-link' href='user_register.php'>

                                Register
                                </a>
                            </li>"; 
                            }
                            
                            ?>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Contact</a>
                            </li>
                            <li class="nav-item mx-3">
                                <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i> <sup>
                                        <?php 
                                        getcartitems();
                                        
                                        ?>
                                    </sup></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Total price :
                                    <?php
                                    total_cart_price();
                                    ?>/-
                                </a>
                            </li>
                        </ul>
                        <form class="d-flex" role="search" action="../search_product.php" method="get">
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
                        echo "<a href='../logout.php' style='color:red;' class='nav-link'>Logout</a>";
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
        <!-- <div class="bg-light py-3">
            <h3 class="text-center">BRAND-STORE</h3>
        </div> -->
        <!------header -->

        <!-- main-section  -->
<div class="row">
    <div class="col-md-3 p-1">
        <ul class="navbar-nav bg-secondary text-center bh">
            <li class="nav-item">
                <a class="nav-link"  href="#"><h4>Your Profile</h4></a>
            </li>
            <li class="nav-item ">
                <div class="image"><img class="user_image" src="./userimages/<?php echo $user_image ?>" alt="user profile" width="150" height="150"></div>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light"  href="user_profile.php?edit_account"><h4>Edit Account</h4></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light"  href="user_profile.php?myorders"><h4>Your orders</h4></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light"  href="user_profile.php"><h4>Pending Orders</h4></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-danger"  href="user_profile.php?delete_account"><h4>Delete Account</h4></a>
            </li>
        </ul>
    </div>
    <div class="col-md-9 text-center">
    <?php
    get_user_order_details();
    
    if(isset($_GET['edit_account']))
    {
        include("user_edit.php");
    }
    if(isset($_GET['myorders']))
    {
        include("user_orders.php");
    }
    if(isset($_GET['delete_account']))
    {
        include("user_delete.php");
    }
    ?>
    </div>
</div>
        
        <!-- main-section  -->

        <!-- -------footer---- -->

        <?php

        include("../includes/footer.php");

?>
        <!-- -------footer---- -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
        </script>

        
    </body>

</html>