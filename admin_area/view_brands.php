<?php

include('../includes/connect.php');
echo "<h1 class='text-center'>All Brands</h1>
<div>
<table class='table table-bordered text-center my-4 w-50 m-auto'>
        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Brands</th>                        
                            <th>Edit</th>
                            <th>Delete</th>
                            
                            
                        </tr>
                    </thead> ";

$get_brands = "SELECT * from brands";
$result_get_brand = mysqli_query($con,$get_brands);
$s_no = 1;
while($row= mysqli_fetch_assoc($result_get_brand))
{
    $brand_id = $row['brand_id'];
    $brand_title = $row['brand_title'];
    echo "<tr class='text-capitalize'> 
    <td ><div class='my-1'>$s_no</div></td>
    <td ><div class='my-1'>$brand_title</div></td>
    <td><div class='my-1'><a href='index.php?edit_brand=$brand_id'><i class='fa-regular fa-pen-to-square'></i></a></div></td>
    <td><div class='my-1'><a href='index.php?delete_brands=$brand_id'><i class='fa-solid fa-trash'></i></a></div></td>
    </tr>

    
    
    
    ";
    $s_no++;
}


?>
</table>
</div>