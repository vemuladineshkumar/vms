<?php

include('includes/config.php');
$productid = $_GET['id'];
$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
$deletesql="DELETE FROM products WHERE p_id=$productid";
$products = array();
if($conn){
    $result = mysqli_query($conn, $deletesql);
	if($result){
        header("Location:productlist.php");
    }
}
?>