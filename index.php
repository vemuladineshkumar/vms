<?php
include('common/header.php');
include('includes/config.php');

$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
$productssql="SELECT * FROM products";
$products = array();
if($conn){
    $result = mysqli_query($conn, $productssql);
	if (mysqli_num_rows($result) > 0) {
		while($row1 = mysqli_fetch_assoc($result)) {
			array_push($products,$row1);
		}
	}
}
?>
<section class="caption">
				<h2 class="caption">Find You Dream Home</h2>
				<h3 class="properties">Appartements - Houses - Mansions</h3>
			</section>
	</section><!--  end hero section  -->


	<section class="search">
		<div class="wrapper">
			<form action="#" method="post">
				<input type="text" id="search" name="search" placeholder="What are you looking for?"  autocomplete="off"/>
				<input type="submit" id="submit_search" name="submit_search"/>
			</form>
			<a href="#" class="advanced_search_icon" id="advanced_search_btn"></a>
		</div>

		<div class="advanced_search">
			<div class="wrapper">
				<span class="arrow"></span>
				<form action="#" method="post">
					<div class="search_fields">
						<input type="text" class="float" id="check_in_date" name="check_in_date" placeholder="Check In Date"  autocomplete="off">

						<hr class="field_sep float"/>

						<input type="text" class="float" id="check_out_date" name="check_out_date" placeholder="Check Out Date"  autocomplete="off">
					</div>
					<div class="search_fields">
						<input type="text" class="float" id="min_price" name="min_price" placeholder="Min. Price"  autocomplete="off">

						<hr class="field_sep float"/>

						<input type="text" class="float" id="max_price" name="max_price" placeholder="Max. price"  autocomplete="off">
					</div>
					<input type="text" id="keywords" name="keywords" placeholder="Keywords"  autocomplete="off">
					<input type="submit" id="submit_search" name="submit_search"/>
				</form>
			</div>
		</div><!--  end advanced search section  -->
	</section><!--  end search section  -->


	<section class="listings">
	
		<div class="wrapper">
			<ul class="properties_list">
			<?php
	foreach($products as $ps){
?>
				<li>
					<a href="#">
						<img src="img/property_1.jpg" alt="" title="" class="property_img"/>
					</a>
					<span class="price"><?php echo $ps['p_price'] ?></span>
					<div class="property_details">
						<h1>
							<a href="#">Fuisque dictum tortor at purus libero</a>
						</h1>
						<h2>2 kitchens, 2 bed, 2 bath... <span class="property_size">(288ftsq)</span></h2>
					</div>
				</li>
				<?php }
	?> 
			</ul>
			<div class="more_listing">
				<a href="#" class="more_listing_btn">View More Listings</a>
			</div>
		</div>

	</section>	<!--  end listing section  -->

	<?php
include('common/footer.php');
?>
</body>
</html>