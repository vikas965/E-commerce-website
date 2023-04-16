<?php

include('../includes/connect.php');
echo "<h1 class='text-center'>All Categories</h1>

<table class='table table-bordered text-center my-4 w-50 m-auto'>
        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Categories</th>                        
                            <th>Edit</th>
                            <th>Delete</th>
                            
                            
                        </tr>
                    </thead> ";

$get_categories = "SELECT * from categories";
$result_get_cat = mysqli_query($con,$get_categories );
$s_no = 1;
while($row= mysqli_fetch_assoc($result_get_cat))
{
    $cat_id = $row['cat_id'];
    $cat_title = $row['cat_title'];
    echo "<tr class='text-capitalize'> 
    <td ><div class='my-1'>$s_no</div></td>
    <td ><div class='my-1'>$cat_title</div></td>
    <td><div class='my-1'><a href='index.php?edit_cat=$cat_id' ><i class='fa-regular fa-pen-to-square'></i></a></div></td>
    <td><div class='my-1'><a  href='index.php?delete_cat=<?php echo $cat_id?>' data-bs-toggle='modal' data-bs-target='#exampleModal'><i class='fa-solid fa-trash'></i></a></div></td>
    </tr>

    
    
    
    ";
    $s_no++;
}


?>
<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-body">
      <center> <h4>Are You Sure you want to delete this?</h4></center>
      </div>
      <div class="modal-footer">
      <a href='index.php?delete_cat=<?php echo $cat_id?>'  class="btn btn-primary" data-bs-toggle='modal' data-bs-target='#exampleModal'>YES</a>
      <button  type="button" class="btn btn-secondary" data-bs-dismiss="modal">NO</button>
        
      </div>
      
    </div>
  </div>
</div>