<?php

include "../includes/connect.php";

session_start();
if(isset($_GET['order_id']))
{
    $order_id = $_GET['order_id'];

    $get_query = "SELECT * from user_orders where order_id= $order_id ";
    $result = mysqli_query($con,$get_query);
    $pay_details = mysqli_fetch_assoc($result);
    $invoice_number = $pay_details['invoice_number'];
    $amount=$pay_details['due_amount'];
  
  
}
if(isset($_POST['confirm_payment']))
{
    $invoice_id = $_POST['invoicenumber'];
    $pay_amount = $_POST['amount'];
    $mode=$_POST['payment'];

    $insert_payments = "INSERT INTO user_payments(order_id,invoice_number,amount,payment_mode)
    VALUES( $order_id,$invoice_id,$pay_amount ,'$mode')";
    $result_payments = mysqli_query($con, $insert_payments);
    if($result_payments)
    {
    $update_orders  = "UPDATE user_orders  set order_status='complete' where order_id=$order_id ";
    $result_update = mysqli_query($con,$update_orders);
    if($result_update)
    {
        // echo $_POST['payment_mode'];
        echo "<script>alert('Payment Succesfull')</script>";
        echo "<script>window.open('user_profile.php?myorders','_self')</script>";
    }
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp"
            crossorigin="anonymous" />
        <!-- <link rel="stylesheet" href="../style.css" /> -->


        <!-- <link rel="stylesheet" href="./all.css" /> -->
        
</head>
<body class="bg-secondary">
 <style>
    h1{
        border-radius: 10px;
    }
   
 </style>
   <div class="container my-5">
    <h1 class="text-center text-bg-info p-4">Confirm Payment</h1>
    <form action="" method="post">
        <div class="form-outline my-4">

           <input type="text" class="form-control w-50 m-auto" name="invoicenumber" value=" <?php echo $invoice_number?>">
        </div>
        <div class="form-outline my-4  text-center ">
    <label for="" class="text-center text-light my-2">Amount</label>
           <input type="text" class="form-control w-50 m-auto" name="amount" value=" <?php echo  $amount?>">
        </div>
        <div class="form-outline my-4  ">
            <select name="payment"  class="form-select w-50 m-auto " required>
                <option>Select Payment Mode</option>
                <option>UPI</option>
                <option>Net Banking</option>
                <option>Debit Card</option>
                <option>Credit Card</option>
                <option>Cash on delivery</option>
                <option>Payoffline</option>           
            </select>
        </div>
        <div class="form-outline my-4 m-auto text-center ">
            <input type="submit" class="btn btn-primary" name="confirm_payment" value="Confirm Payment" >
        </div>
    </form>
   </div>
</body>
</html>