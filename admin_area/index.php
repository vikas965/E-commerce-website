<?php
session_start();
include "../includes/connect.php";
if(!isset($_SESSION['adminname']))
{
    header("Location:admin_login.php");
}
else{
    $admin = $_SESSION['adminname'];
}


?>


<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Admin Dashboard</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp"
            crossorigin="anonymous" />
        <!-- <link rel="stylesheet" href="../style.css" /> -->
        <link rel="stylesheet" href="../all.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
            integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>

    <body>
       
        <style>
           
           

        * {
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-image: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        }

        .logo {
            width: 6%;
            height: 6%;
        }

        .br {
            border-radius: 10px;
            box-shadow: rgba(6, 24, 44, 0.4) 0px 0px 0px 2px,
                rgba(6, 24, 44, 0.65) 0px 4px 6px -1px,
                rgba(255, 255, 255, 0.08) 0px 1px 0px inset;
        }

        .admin-image {
            width: 100px;
            object-fit: contain;
        }

        .row {
            /* margin-right: -25px; */
            margin-left: 0;
            margin-right: 0;
        }

        button {
            background: none;
            border: none;
        }

        .sc {

            width: 9rem;

            border-radius: 10px;
            height: 1.8rem;
            box-shadow: rgba(6, 24, 44, 0.4) 0px 0px 0px 2px,
                rgba(6, 24, 44, 0.65) 0px 4px 6px -1px,
                rgba(255, 255, 255, 0.08) 0px 1px 0px inset;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px,
                rgba(0, 0, 0, 0.3) 0px 30px 60px -30px,
                rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
            background: linear-gradient(to top, #6a85b6 0%, #bac8e0 100%);
        }

        .scs{
            width: 9rem;

            border-radius: 10px;
            height: 1.8rem;
            box-shadow: rgba(6, 24, 44, 0.4) 0px 0px 0px 2px,
                rgba(6, 24, 44, 0.65) 0px 4px 6px -1px,
                rgba(255, 255, 255, 0.08) 0px 1px 0px inset;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px,
                rgba(0, 0, 0, 0.3) 0px 30px 60px -30px,
                rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
            background:red;
        }
        a{
            text-decoration:none;
        }
        .table_image {
            width: 7rem;
            height: 7rem;
            border-radius: 20px;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;

        }

        .img{
            width: 5rem;
            height: 5rem;
            border-radius: 10px;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
        }
        .side{
            display:flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background: linear-gradient(to top, #cfd9df 0%, #e2ebf0 100%);
            border-radius: 10px;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
            position: relative;
            top: 4rem;
            left: 10px;
            height: 100%;
            /* margin-left: 0.5rem; */
            /* position: fixed; */
            /* margin-left: 5px; */

        }
        
        </style>

        <div class="container-fluid p-0">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid">
                    <img src="./logoicon.png" alt="" class="logo" />
                    <nav class="navbar navbar-expand-lg br">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="" class="nav-link">Welcome <?php echo  $admin ?></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </nav>
            <!-- <div class="bg-light">
                <h3 class="text-center p-2">Manage Details</h3>
            </div> -->

            <div class="row">
                <div class="col-md-2  p-1 align-items-center side mb-3 ">
                    <div class="image px-3 py-3">
                        <?php
                        
                        $getimage = "SELECT * from admins where admin_name ='$admin'";
                        $image_result= mysqli_query($con,$getimage );
                        $am=mysqli_fetch_assoc($image_result);
                        $adminimg=$am['admin_image']
                        
                        ?>
                        <a href=""><img src="adminimages/<?php echo $adminimg?>" class="admin-image" alt="" /></a>
                        <p class="text-center"><?php echo $admin ?></p>
                    </div>
                    <div class="button text-center">
                        <button>
                            <a href="insert_product.php" class="nav-link text-light my-1 sc mx-1">Insert
                                Products</a>
                        </button>
                        <button>
                            <a href="index.php?view_products" class="nav-link text-light my-1 sc mx-1">View Products</a>
                        </button>
                        <button>
                            <a href="index.php?insert_category" class="nav-link text-light my-1 sc mx-1">Insert
                                Categories</a>
                        </button>
                        <button>
                            <a href="index.php?view_categories" class="nav-link text-light my-1 sc mx-1">View Categories</a>
                        </button>
                        <button>
                            <a href="index.php?insert_brands" class="nav-link text-light my-1 sc mx-1">Insert Brands</a>
                        </button>
                        <button>
                            <a href="index.php?view_brands" class="nav-link text-light my-1 sc mx-1">View Brands</a>
                        </button>
                        <button>
                            <a href="index.php?view_orders" class="nav-link text-light my-1 sc mx-1">All Orders</a>
                        </button>
                        <button>
                            <a href="index.php?view_payments" class="nav-link text-light my-1 sc mx-1">All Payments</a>
                        </button>
                        <button>
                            <a href="index.php?view_users" class="nav-link text-light my-1 sc mx-1">List Users</a>
                        </button>
                        <button>
                            <a href="index.php" class="nav-link text-light my-1 scs mx-1">Logout</a>
                        </button>
                    </div>
                </div>
                <div class="col-md-10">
                <div class="container my-3">
            <?php
      
      if(isset($_GET['insert_category']))
      {
        include "insert_category.php";
      }
       
       if(isset($_GET['insert_brands']))
      {
        include "insert_brands.php";
      }
      if(isset($_GET['view_products']))
      {
        include "view_products.php";
      }
      if(isset($_GET['edit_products']))
      {
        include "edit_products.php";
      }
      if(isset($_GET['delete_products']))
      {
        include "delete_products.php";
      }
      if(isset($_GET['view_categories']))
      {
        include "view_categories.php";
      }
      if(isset($_GET['view_brands']))
      {
        include "view_brands.php";
      }
      if(isset($_GET['edit_brand']))
      {
        include "edit_brand.php";
      }
    if(isset($_GET['edit_cat']))
    {
        include "edit_cat.php";
    }
    if(isset($_GET['delete_brands']))
    {
        include "delete_brand.php";
    }
    if(isset($_GET['delete_cat']))
    {
        include "delete_cat.php";
    }
    if(isset($_GET['view_orders']))
    {
        include "view_orders.php";
    }
    if(isset($_GET['view_payments']))
    {
        include "view_payments.php";
    }
    if(isset($_GET['view_users']))
    {
        include "view_users.php";
    }


      ?>

        </div>
                </div>
            </div>
        </div>


        <div class="container my-3">
            <?php
      
//       if(isset($_GET['insert_category']))
//       {
//         include "insert_category.php";
//       }
       
//        if(isset($_GET['insert_brands']))
//       {
//         include "insert_brands.php";
//       }
//       if(isset($_GET['view_products']))
//       {
//         include "view_products.php";
//       }
//       if(isset($_GET['edit_products']))
//       {
//         include "edit_products.php";
//       }
//       if(isset($_GET['delete_products']))
//       {
//         include "delete_products.php";
//       }
//       if(isset($_GET['view_categories']))
//       {
//         include "view_categories.php";
//       }
//       if(isset($_GET['view_brands']))
//       {
//         include "view_brands.php";
//       }
//       if(isset($_GET['edit_brand']))
//       {
//         include "edit_brand.php";
//       }
//     if(isset($_GET['edit_cat']))
//     {
//         include "edit_cat.php";
//     }
//     if(isset($_GET['delete_brands']))
//     {
//         include "delete_brand.php";
// }
//     if(isset($_GET['delete_cat']))
//     {
//         include "delete_cat.php";
// }
      ?>
        </div>


        <!-- <div class="bg-info p-4">
            <center>All rights reserved <span>©</span> - Designed by Vikas</center>
        </div> -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
        </script>
    </body>

</html>