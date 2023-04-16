<?php

include('../includes/connect.php');
if(isset($_GET['delete_products']))
{
    $product_id = $_GET['delete_products'];

$delete_query = "DELETE from products where `product-id`=  $product_id";
$delete_exe= mysqli_query($con,$delete_query);

if($delete_exe)
{
   
    echo "<script>window.open('index.php?view_products','_self')</script>";
}

}

?>