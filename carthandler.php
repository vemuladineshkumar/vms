<?php 
session_start();
include('includes/config.php');
$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

	$productid= $_GET['id'];
if(!empty($_GET['addcart'])){
	$cp_qty = $_GET['quantity'];
	$c_userid = $_SESSION['userdata']['id'];
	
	$productssql="SELECT * FROM cart WHERE p_id=$productid and user_id=$c_userid";
	$result = mysqli_query($conn, $productssql);
	if(mysqli_num_rows($result) > 0){
		$query="UPDATE cart SET qty= qty+$cp_qty where user_id = $c_userid and p_id = $productid";
	}else{
		$query="INSERT INTO cart (p_id, qty, user_id) VALUES (".$productid.",". $cp_qty.",". $c_userid.")";
	}
	$result = mysqli_query($conn, $query);
}
header("location: singleproductpage.php?id=$productid");


?>