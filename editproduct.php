<?php
include('includes/config.php');
$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
if(!empty($_GET['id'])){
  $productid = $_GET['id'];
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


if(!empty($_POST['product_id'])){
  $productid = $_POST['product_id'];
  $productname = $_POST['product_name'];
  $productdec = $_POST['product_description'];
  $productprice = $_POST['product_price'];
 
  $productimg ;
  if(isset($_FILES['image'])){
    $productimg =  $_FILES['image']['name'];
    $errors= array();
    $file_name = $_FILES['image']['name'];
    $file_size =$_FILES['image']['size'];
    $file_tmp =$_FILES['image']['tmp_name'];
    $file_type=$_FILES['image']['type'];
    $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
    
    $expensions= array("jpeg","jpg","png");
    
    if(in_array($file_ext,$expensions)=== false){
       $errors[]="extension not allowed, please choose a JPEG or PNG file.";
    }
    
    if($file_size > 2097152){
       $errors[]='File size must be excately 2 MB';
    }
    
    if(empty($errors)==true){
       move_uploaded_file($file_tmp,"uploads/".$file_name);
       echo "Success";
    }else{
       print_r($errors);
    }
 }
$productupdatesql="UPDATE products SET p_name='$productname', p_description='$productdec', p_price=$productprice";
if(!empty($productimg)){
  $productupdatesql = $productupdatesql.",p_img='$productimg' ";
}
$productupdatesql = $productupdatesql." WHERE p_id=$productid";
$result = mysqli_query($conn, $productupdatesql);
header("Location:productlist.php");
}

?>



<html>
<head>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>

   <body>
      
      <form  class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>">
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