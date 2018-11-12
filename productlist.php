<?php

include('includes/config.php');

$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
$productssql="SELECT * FROM products";

$products = array();
if($conn){
    $result = mysqli_query($conn, $productssql);
	if (mysqli_num_rows($result) > 0) {
		while($row1 = mysqli_fetch_assoc($result)) {
			array_push($products,$row1);
		}
	}
}

?>

<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>

<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 
 <div class="container">

   
           
   
        
    <hr>
        
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Description</th>
          <th class="text-right">Price</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      <?php
	foreach($products as $ps){
?>
        <tr>
          <td><?php echo $ps['p_id'] ?></td>
          <td><?php echo $ps['p_name'] ?></td>
          <td><?php echo $ps['p_description'] ?></td>
          <td class="text-right"><?php echo "Rs.".number_format((float)$ps['p_price'], 2, '.', ''); ?></td>
          <td><a href="/vms/editproduct.php?id=<?php echo $ps['p_id'] ?>" class="btn"><i class="fa fa-edit"></i></a><a href="delete.php?id=<?php echo $ps['p_id']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></button></td>

        </tr>
        <?php }
	?> 
          
      </tbody>
    </table>  
   
        
</div>
    
    