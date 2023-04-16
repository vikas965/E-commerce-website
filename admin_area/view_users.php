
<?php

include('../includes/connect.php');
 echo "<h1 class='text-center'>All Orders</h1>

 <table class='table table-bordered text-center my-4'>
        <thead>
                        <tr>
                            <th>SI.No</th>
                            <th>Users Name</th>                        
                            <th>Users Email</th>
                            <th>Users Image</th>   
                            <th>Users Numbers</th>
                            <th>Users Address</th>
                                                    
                        </tr>
                    </thead> ";

$get_users = "SELECT * from  users";
$result_users = mysqli_query($con,$get_users);
$s_no=1;
 while($row=mysqli_fetch_assoc($result_users))
 {
   
        $user_id = $row['user_id'];
        echo"
        <tr class='text-capitalize'>
        <td ><div class='my-4'>$s_no</div></td>
        <td><div class='my-4'>{$row['username']}</div></td>
      
        <td><div class='my-4'>{$row['user_email']}</div></td>
        <td><div><img src='../users_area/userimages/{$row['user_image']}' class='table_image'></div></td>
        <td><div class='my-4'>{$row['user_mobile']}</div></td>
        <td><div class='my-4'>{$row['user_address']}</div></td>
        <td><div class='my-4'><a href='index.php?delete_products= $user_id'><i class='fa-solid fa-trash'></i></a></div></td>   
        
        ";
        $s_no++;
   
 }

?>