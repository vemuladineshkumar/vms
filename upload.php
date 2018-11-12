<?php
session_start();
include('includes/config.php');
$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
   
   if($conn){
   // $p_id = $_POST['product_id'];
    $p_name = $_POST['product_name'];
    $p_description = $_POST['product_description'];
    $p_price = $_POST['product_price'];
   
if(!empty($_POST)){
    $query = "INSERT INTO `products` (`p_name`, `p_description`, `p_price`) VALUES ('$p_name', '$p_description', '$p_price')";
    $products=mysqli_query($conn,$query);
    $lastproductid = mysqli_insert_id($conn);
    $img_name =  $lastproductid.$_FILES['image']['name'];
    $productupdatesql="UPDATE products SET p_name='$p_name', p_description='$p_description', p_price=$p_price, p_img='$img_name' WHERE p_id=$lastproductid";
    $productsimage=mysqli_query($conn,$productupdatesql);
    if(isset($_FILES['image'])){
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
           move_uploaded_file($file_tmp,"uploads/".$lastproductid.$file_name);
           echo "Success";
        }else{
           print_r($errors);
        }
     }
    
}
   }
?>