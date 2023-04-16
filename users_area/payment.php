

<?php
include('includes/connect.php');

include('ipaddress.php');



$ip = getip();
$get_user = "SELECT * from users where user_ipaddress='$ip' ";
$get_user_query = mysqli_query($con,$get_user);
$run_query = mysqli_fetch_assoc($get_user_query );
$user_id = $run_query['user_id'];

?>





<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>
        <style>
            .upiimage{
               border-radius: 30px;
               margin-bottom: 2rem;
               
               box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
               box-shadow: rgba(88, 46, 240, 0.4) 5px 5px, rgba(101, 46, 240, 0.3) 10px 10px, rgba(117, 46, 240, 0.2) 15px 15px, rgba(179, 46, 240, 0.1) 20px 20px, rgba(82, 46, 240, 0.05) 25px 25px;
            }

            .offline{
                text-decoration: none;
                
            }

            .bk{
                background: linear-gradient(120deg, #a1c4fd 0%, #c2e9fb 100%);
                /* width: 560px; */
                padding: 2rem;
                border-radius: 20px;
                box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
            }
        </style>
        <div class="container">

            <h2 class="text-center text-info">Payment options</h2>
            <div class="row d-flex justify-content-center align-items-center">
                <!-- <div class="col-md-6">
                    <a href="https://www.paypal.com">
                        <img class="upiimage" src="images/upi.jpg" alt="">
                    </a>
                </div> -->
                <div class="col-md-12 bk mb-5">
                    <a class="offline" href="./users_area/orders.php?user_id=<?php echo $user_id?>">
                        <h2 class="text-center">Pay Here</h2>
                    </a>
                </div>
                
            </div>
        </div>
    </body>

</html>