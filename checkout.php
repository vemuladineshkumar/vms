<?php 
session_start();
include('includes/config.php');
$ordered_by = $_SESSION['userdata']['id'];
$db = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
if($db->connect_errno > 0){
    echo"error db connection";
exit;
}
$selectsql = "SELECT * FROM cart as c left join products as p on p.p_id = c.p_id WHERE user_id = $ordered_by";
$result = $db->query($selectsql);
$products = array();
while ($row = $result->fetch_assoc()){
    
    array_push($products,$row);
}
print_r($products);
foreach($products as $prochekout){
    $totalprice = $prochekout['p_price'];
    $price = $totalprice;
    $c = $price + $totalprice;

    print_r($c);
}

// foreach($products as $prochekout){
//     $userid = $prochekout['user_id'];
//     print_r($userid);
//     $orderquery = "INSERT INTO `orders` (`ordered_by`, `total_amount`) VALUES ($userid, $price)";
// }

?>