<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>La Casa - Real Estate HTML5 Home Page Template</title>
	<meta charset="utf-8">
	<meta name="author" content="pixelhint.com">
	<meta name="description" content="La casa free real state fully responsive html5/css3 home page website template"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
	
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/responsive.css">

	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/main1.js"></script>
</head>
<body>

	<section class="hero">
		<header>
			<div class="wrapper">
				<a href="#"><img src="img/logo.png" class="logo" alt="" titl=""/></a>
				<a href="#" class="hamburger"></a>
				<nav>
					<ul>
						<li><a href="#">Buy</a></li>
						<li><a href="#">Rent</a></li>
						<li><a href="#">Sell</a></li>
						<li><a href="#">About</a></li>
						<li><a href="#">Contact</a></li>
					</ul>
					<?php if(!empty($_SESSION['userdata'])){ ?>
					<a href="/vms/logout.php" class="login_btn">Logout</a>
					<?php 	}else{ ?>
						<a href="/vms/signinfrontend.php" class="login_btn">Login</a>
					<?php }
					?>
				</nav>
			</div>
		</header><!--  end header section  -->