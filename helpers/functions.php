<?php 

function checkloginredirect(){
    if(!checklogin()){
        header('location: signinfrontend.php');
    }
}

function checklogin(){
    if(empty($_SESSION['userdata'])){
        return false;
    }
    return true;
}

function checkcartcount($conn){
    $c_userid = $_SESSION['userdata']['id'];
$productssql="SELECT count(*)  as cartcount FROM `cart` WHERE user_id = $c_userid";

$products;
if($conn){
    $result = mysqli_query($conn, $productssql);
	if (mysqli_num_rows($result) > 0) {
		while($row1 = mysqli_fetch_assoc($result)) {
      $products=$row1;
      //array_push($products,$row1);
		}
    } 
    echo $products['cartcount'];
}
}
?>