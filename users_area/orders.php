<?php

include('../includes/connect.php');
include('../functions/common_function.php');


if(isset($_GET['user_id']))
{
    $user_id = $_GET['user_id'];
   
    $ipaddress = getIPAddress();
    $total_price =0;
    $get_query_price = "SELECT * from cart_details where ip_address ='$ipaddress' ";
    $get_query = mysqli_query($con, $get_query_price);
    $invoice_number = mt_rand();
    // echo $invoice_number;
    $status='pending';
    $num_of_products = mysqli_num_rows( $get_query);
    while($row=mysqli_fetch_assoc( $get_query))
    {
        $product_id = $row['product_id'];
        $select_product = "SELECT * from products where `product-id`=$product_id ";
        $exe_select_product = mysqli_query($con, $select_product);
        while($row_products=mysqli_fetch_assoc( $exe_select_product))
        {
            $product_price = array($row_products['product_price']);
            $product_price_sum = array_sum($product_price);
            $total_price+=$product_price_sum;
            
        }
    }
    
}

$get_cart = "SELECT * from cart_details ";
$run_cart = mysqli_query($con,$get_cart);
$get_item_quantity = mysqli_fetch_assoc($run_cart);
$quantity = $get_item_quantity['quantity'];
if($quantity==0)
{
    $quantity=1;
    $subtotal = $total_price;

}
else{
    $quantity = $quantity;
    $subtotal = $total_price * $quantity;

}


$insert_orders = "INSERT into user_orders(user_id,due_amount,invoice_number,total_products,order_date,order_status) VALUES($user_id, $subtotal,$invoice_number,$num_of_products,NOW(),'$status')";
$insert_order_query=mysqli_query($con,$insert_orders);

if($insert_order_query)
{
   echo" <script>alert('orders are submitted succesfully')</script>";
//    echo "<script>window.open('user_profile.php','_self')</script>";
}




$insert_pending_orders = "INSERT into pending_orders(user_id,invoice_number,product_id,quantity,order_status) VALUES($user_id, $invoice_number,$product_id ,$quantity,'$status')";
$pending_order_query=mysqli_query($con,$insert_pending_orders);


$empty_cart = "DELETE from cart_details where ip_address='$ipaddress' ";
$result_empty_cart=mysqli_query($con,$empty_cart);

if($pending_order_query)
{
//    echo" <script>alert('orders are submitted succesfully')</script>";
   echo "<script>window.open('user_profile.php','_self')</script>";
}





?>