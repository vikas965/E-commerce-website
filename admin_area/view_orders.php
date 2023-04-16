
<?php

include('../includes/connect.php');
 echo "<h1 class='text-center'>All Orders</h1>

 <table class='table table-bordered text-center my-4'>
        <thead>
                        <tr>
                            <th>SI.No</th>
                            <th>UserID</th>                        
                            <th>Due Amount</th>
                            <th>Invoice Number</th>
                            <th>Total Products</th>
                            <th>Order Date</th>
                            <th>Order Status</th>
                            
                        </tr>
                    </thead> ";

$get_orders = "SELECT * from  user_orders";
$result_orders = mysqli_query($con,$get_orders);
$s_no=1;
 while($row=mysqli_fetch_assoc($result_orders))
 {
   
        $order_id = $row['order_id'];
        echo"
        <tr class='text-capitalize'>
        <td ><div class='my-1'>$s_no</div></td>
        <td><div class='my-1'>{$row['user_id']}</div></td>
        <td><div class='my-1'>{$row['due_amount']}</div></td>
        <td><div class='my-1'>{$row['invoice_number']}</div></td>
        <td><div class='my-1'>{$row['total_products']}</div></td>
        <td><div class='my-1'>{$row['order_date']}</div></td>
        <td><div class='my-1'>{$row['order_status']}</div></td>
        
        
        
        
        ";
        $s_no++;
   
 }

?>