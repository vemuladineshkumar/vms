<?php
session_start();
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
if(!empty($_GET['addcart'])){
	$cp_qty = $_GET['quantity'];
	$c_userid = $_SESSION['userdata']['id'];
	
	$productssql="SELECT * FROM cart WHERE p_id=$productid and user_id=$c_userid";
	$result = mysqli_query($conn, $productssql);
	if(mysqli_num_rows($result) > 0){
		$query="UPDATE cart SET qty= qty+$cp_qty where user_id = $c_userid and p_id = $productid";
	}else{
		$query="INSERT INTO cart (p_id, qty, user_id) VALUES (".$products['p_id'].",". $cp_qty.",". $c_userid.")";
	}
	$result = mysqli_query($conn, $query);
}

}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Product Page</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="styles/normalize.css">
		<link rel="stylesheet" type="text/css" href="styles/styles.css">
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
		<script src="scripts/jquery.js"></script>
		
		<script src="scripts/modernizr.js"></script>
	</head>
	<body>
		<div class="product clear">
			<header>
				<hgroup>
					<h1><?php echo $products['p_name'] ?></h1>
				
				</hgroup>
			</header>
			<figure>
				<img src="/vms/uploads/<?php echo $products['p_img'] ?>">
			</figure>
			<section>
				<p><?php echo $products['p_description'] ?></p>
               
				<details>
					<summary>Product Features</summary>
						<ul>
							<li>8 mega pixel camera with full 1080p video recording</li>
							<li>Siri voice assitant</li>
							<li>iCloud</li>
							<li>Air Print</li>
							<li>Retina display</li>
							<li>Photo and video geotagging</li>
						</ul>
				</details>
                <p>Price: &#x20b9;<?php echo $products['p_price'] ?></p>
				<div class="container">
	<form action="<?= $_SERVER['PHP_SELF']?>?id=<?php echo $products['p_id'].'&addcart=true'  ?>" method ="get">
	<div class="row">
                        <div class="col-lg-2">
                                        <div class="input-group">
                                    <span class="input-group-btn">
                                        <button type="button" class="quantity-left-minus btn btn-danger btn-number"  data-type="minus" data-field="">
                                          <span class="glyphicon glyphicon-minus"></span>
                                        </button>
                                    </span>
									<input type="text" value="<?php echo $products['p_id']; ?>" name="id" hidden>
									<input type="text" value="true" name="addcart" hidden>
                                    <input type="text" id="quantity" name="quantity" class="form-control input-number" value="10" min="1" max="100">
                                    <span class="input-group-btn">
                                        <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="">
                                            <span class="glyphicon glyphicon-plus"></span>
                                        </button>
                                    </span>
                                </div>
                        </div>
	</div>
</div><br>
				
				<button>Add to Cart</button>
				</form>

				<button>Buy Now</button>
				
			</section>
		</div>
		<script>
			if ($('html').hasClass('no-details')) {
				
				var summary = $('details summary');

				summary.siblings().wrapAll('<div class="slide"></div>');

				$('details:not(.open) summary').siblings('div').hide();

				summary.click(function() { 
					$(this).siblings('div').toggle();
	          			$('details').toggleClass('open');
       			});
			 }
	
$(document).ready(function(){

var quantitiy=0;
   $('.quantity-right-plus').click(function(e){
        
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity').val());
        
        // If is not undefined
            
            $('#quantity').val(quantity + 1);

          
            // Increment
        
    });

     $('.quantity-left-minus').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity').val());
        
        // If is not undefined
      
            // Increment
            if(quantity>0){
            $('#quantity').val(quantity - 1);
            }
    });
    
});
</script>
	</body>
</html>