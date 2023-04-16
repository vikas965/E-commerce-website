
<?php

include('../includes/connect.php');
 echo "<h1 class='text-center'>All Orders</h1>

 <table class='table table-bordered text-center my-4'>
        <thead>
                        <tr>
                            <th>SI.No</th>
                            <th>Order ID</th>                        
                            <th>Invoice Number</th>
                            <th>Amount</th>
                            <th>Payment Mode</th>
                            <th>Date</th>
                            
                        </tr>
                    </thead> ";

$get_payments = "SELECT * from  user_payments";
$result_payments = mysqli_query($con,$get_payments);
$s_no=1;
 while($row=mysqli_fetch_assoc($result_payments))
 {
   
        $payment_id = $row['payment_id'];
        echo"
        <tr class='text-capitalize'>
        <td ><div class='my-1'>$s_no</div></td>
        <td><div class='my-1'>{$row['order_id']}</div></td>
      
        <td><div class='my-1'>{$row['invoice_number']}</div></td>
        <td><div class='my-1'>{$row['amount']}</div></td>
        <td><div class='my-1'>{$row['payment_mode']}</div></td>
        <td><div class='my-1'>{$row['date']}</div></td>
             
        
        ";
        $s_no++;
   
 }

?>