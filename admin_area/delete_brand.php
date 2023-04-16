<?php

include('../includes/connect.php');
if(isset($_GET['delete_brands']))
{
    $brand_id = $_GET['delete_brands'];

$delete_query = "DELETE from brands where brand_id =  $brand_id";
$delete_exe= mysqli_query($con,$delete_query);

if($delete_exe)
{
   
    echo "<script>window.open('index.php?view_brands','_self')</script>";
}

}

?>