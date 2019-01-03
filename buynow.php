<?php 
session_start();
include('includes/config.php');
$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
$productid = $_GET['id'];
$selectsql = "SELECT * FROM products WHERE p_id=$productid";
$ordered_by = $_SESSION['userdata']['id'];
$orders;
if($conn){
    $result = mysqli_query($conn, $selectsql);
	if (mysqli_num_rows($result) > 0) {
		while($row1 = mysqli_fetch_assoc($result)) {
      $orders=$row1;
      //array_push($products,$row1);
		}
    }
    $qty = 1;
    $price = $orders['p_price'];
   $orderquery = "INSERT INTO `orders` (`ordered_by`, `total_amount`) VALUES ($ordered_by, $price)";
   $result = mysqli_query($conn, $orderquery);
   $queryuserid = "SELECT LAST_INSERT_ID() as id";
          $userid=mysqli_query($conn,$queryuserid);
          $userid1 = mysqli_fetch_assoc($userid);
   $orderlinequery = "INSERT INTO `order_line` (`p_id`, `qty`, `user_id`, `total_amount`, `order_id`) VALUES ($productid, $qty, $ordered_by, $price, $userid1[id])";


   $result = mysqli_query($conn, $orderlinequery);
}

