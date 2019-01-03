<?php 
session_start();
include('includes/config.php');
$ordered_by = $_SESSION['userdata']['id'];
$db = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
if($db->connect_errno > 0){
    echo"error db connection";
exit;
}
$productid = $_GET['id'];
$selectsql = "SELECT * FROM products WHERE p_id=$productid";

$result = $db->query($selectsql);
while ($row = $result->fetch_assoc()){
    $orders=$row;
}
$qty = 1;
$price = $orders['p_price'];
$orderquery = "INSERT INTO `orders` (`ordered_by`, `total_amount`) VALUES ($ordered_by, $price)";
$orderqueryresult = $db->query($orderquery);

$queryuserid = "SELECT LAST_INSERT_ID() as id";
$queryuseridresult = $db->query($queryuserid);
$userid1 = $queryuseridresult->fetch_assoc();
$orderlinequery = "INSERT INTO `order_line` (`p_id`, `qty`, `user_id`, `total_amount`, `order_id`) VALUES ($productid, $qty, $ordered_by, $price, $userid1[id])";

$orderqueryresult = $db->query($orderlinequery);

