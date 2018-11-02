<?php
include('includes/config.php');
$productid = $_GET['id'];
$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
$productssql="SELECT * FROM products WHERE p_id=$productid";

$products;
if($conn){
    $result = mysqli_query($conn, $productssql);
	if (mysqli_num_rows($result) > 0) {
		while($row1 = mysqli_fetch_assoc($result)) {
      $products=$row1;
      //array_push($products,$row1);
		}
	}
}

?>



<html>
<head>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>

   <body>
      
      <form  class="form-horizontal">
      <fieldset>

<!-- Form Name -->
<legend>PRODUCTS</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="product_id">PRODUCT ID</label>  
  <div class="col-md-4">
  <input id="product_id" name="product_id" value="<?php echo $products['p_id']; ?>" class="form-control input-md" required="" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="product_name">PRODUCT NAME</label>  
  <div class="col-md-4">
  <input id="product_name" name="product_name" value="<?php echo $products['p_name']; ?>" class="form-control input-md" required="" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="product_description">PRODUCT DESCRIPTION</label>  
  <div class="col-md-4">
  <input id="product_description" name="product_description" value="<?php echo $products['p_description']; ?>" class="form-control input-md" required="" type="text">
    
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="product_price">PRODUCT PRICE</label>  
  <div class="col-md-4">
  <input id="product_price" name="product_price" value="<?php echo $products['p_price']; ?>" class="form-control input-md" required="" type="text">
    
  </div>
</div>
<div class="form-group">
<label class="col-md-4 control-label" for="product_image">PRODUCT IMAGE</label>  
<div class="col-md-4">
         <input type="file" name="image" /><br>
        
         </div>
         </div>
<div class="form-group">
<label class="col-md-4 control-label" for="product_image"></label>  
    <div class="col-md-4">
         <input type="submit"/><br>
        
    </div>
</div>
    
      </form>
  
   </body>
</html>