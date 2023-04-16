






<?php
$user_name = $_SESSION['username'];
$get_user = "SELECT * from users where username='$user_name'";
$get_user_result = mysqli_query($con,$get_user );
$fetch_user = mysqli_fetch_assoc($get_user_result);
$user_id = $fetch_user['user_id'];



?>








<h3 class="text-success my-2">Your Orders</h3>
<div class='table-responsive'>
<table class="table table-bordered mt-5">
            <thead class="bgc">
                        <tr >
                            <th>SI.NO</th>
                            <th>Amount Due</th>
                            <th>Total Products</th>
                            <th>Invoice Number</th>
                            <th>Date</th>
                            <th>Complete/Incomplete</th>
                            <th>Status</th>
                        </tr>
            </thead>
            <tbody class='bgr text-light'>
               <?php
               $get_order_details = "SELECT * from user_orders where user_id =$user_id";
               $result_details = mysqli_query($con,$get_order_details);
               $number=1;
               while($row=mysqli_fetch_assoc( $result_details))
               {
                $order_id =$row['order_id'];
                $amount_due = $row['due_amount'];
                $total_products = $row['total_products'];
                $order_date=$row['order_date'];
                $invoice_number = $row['invoice_number'];
                $order_status=$row['order_status'];
                if($order_status=='pending')
                {
                    $order_status='Incomplete';
                }
                else{
                    $order_status='Complete';
                }
                
                echo "
                <tr>
                <td> $number</td>
                <td>$amount_due</td>
                <td> $total_products</td>
                <td>$invoice_number</td>
                <td>  $order_date</td>
                <td>$order_status</td>";
                ?>
                <?php
                if($order_status=='Complete')
                {
                   echo"<td>Paid</td>";
                   
                }
                else{
               echo " <td><a href='confirm_payment.php?order_id=$order_id'>Confirm</a></td>

            </tr>";}
            $number++;
               }
               
               
               ?>
               
            </tbody>
</table>
            </div>