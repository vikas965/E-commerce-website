<?php

include('../includes/connect.php');

   echo "<h1 class='text-center'>All Products</h1>
   <div class='table-responsive'>
   <table class='table table-bordered text-center table-hover my-4'>
        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>                        
                            <th>Image</th>
                            <th>Price</th>
                            <th>Total Sold</th>
                            <th>Status</th>
                            <th>Edit</th>
                            <th>Delete</th>
                            
                        </tr>
                    </thead> ";

    




   $get_products = "SELECT * FROM products ";
   $result_get_products = mysqli_query($con,$get_products);
   if($result_get_products)
   {
    $s_no = 1;
    while($row = mysqli_fetch_assoc($result_get_products))
    {
        $product_id = $row['product-id'];
        echo"
        <tr class='text-capitalize'>
        <td ><div class='my-5'>$s_no</div></td>
        <td><div class='my-5'>{$row['product_title']}</div></td>
        <td><img src='productimages/{$row['product_image1']}' class='table_image'></td>
        <td><div class='my-5'>{$row['product_price']}/-</div></td>";
        $get_count= "SELECT * from pending_orders where product_id = $product_id";
        $result_get_count= mysqli_query($con,$get_count);
        $row_count= mysqli_num_rows( $result_get_count);
        echo "<td><div class='my-5'>$row_count</div></td>";
        
        echo "
        <td><div class='my-5'>{$row['status']}</div></td>
        <td><div class='my-5'><a href='index.php?edit_products=$product_id'><i class='fa-regular fa-pen-to-square'></i></a></div></td>
        <td><div class='my-5'><a href='index.php?delete_products=$product_id'><i class='fa-solid fa-trash'></i></a></div></td>
        </tr>
        
        
        ";
        $s_no++;
    }
   }
   echo"</table></div>";

?>


