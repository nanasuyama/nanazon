<?php
session_start();
include_once '../classes/User.php';
$user = new User;
$user->login_required_admin();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>NANAZON</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Colo Shop Template">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../styles/bootstrap4/bootstrap.min.css">
	<link href="../plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
	<link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/animate.css">
	<link rel="stylesheet" type="text/css" href="../styles/main_styles.css">
	<link rel="stylesheet" type="text/css" href="../styles/responsive.css">
	<!-- Java script -->
	<script src="../js/jquery-3.2.1.min.js"></script>
	<script src="../styles/bootstrap4/popper.js"></script>
	<script src="../styles/bootstrap4/bootstrap.min.js"></script>
	<script src="../plugins/Isotope/isotope.pkgd.min.js"></script>
	<script src="../plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
	<script src="../plugins/easing/easing.js"></script>
	<script src="../js/custom.js"></script>
</head>

<body>

	<div class="super_container">

		<!-- Header -->

		<header class="header trans_300">

			<!-- Top Navigation -->

			<div class="top_nav">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<div class="top_nav_left">free shipping on all u.s orders over $50</div>
						</div>
						<div class="col-md-6 text-right">
							<div class="top_nav_right">
								<ul class="top_nav_menu">

									<!-- Currency / Language / My Account -->

									<li class="currency">
										<a href="#">
											usd
											<i class="fa fa-angle-down"></i>
										</a>
										<ul class="currency_selection">
											<li><a href="#">cad</a></li>
											<li><a href="#">aud</a></li>
											<li><a href="#">eur</a></li>
											<li><a href="#">gbp</a></li>
										</ul>
									</li>
									<li class="language">
										<a href="#">
											English
											<i class="fa fa-angle-down"></i>
										</a>
										<ul class="language_selection">
											<li><a href="#">French</a></li>
											<li><a href="#">Italian</a></li>
											<li><a href="#">German</a></li>
											<li><a href="#">Spanish</a></li>
										</ul>
									</li>
									<li class="account">
										<a href="#">
											My Account
											<i class="fa fa-angle-down"></i>
										</a>
										<ul class="account_selection">
											<li><a href="logout.php"><i class="fa fa-sign-in" aria-hidden="true"></i>Log out</a>
											</li>
											<li><a href="#"><i class="fa fa-user-plus"
														aria-hidden="true"></i>Register</a></li>
										</ul>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Main Navigation -->

			<div class="main_nav_container">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 text-right">
							<div class="logo_container">
								<a href="../index.php">nana<span>zon</span></a>
							</div>
							<nav class="navbar">
								<ul class="navbar_menu">
									<li><a href="../index.php">home</a></li>

									<li class="nav-item dropdown">
										<a href="admin/user_list.php" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" 
										data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">user</a>
										<div class="dropdown-menu" aria-labelledby="navbarDropdown">
										<a class="dropdown-item" href="user_list.php">List</a>
										<a class="dropdown-item" href="user_add.php">Add</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#">Something else here</a>
										</div>
									</li>
									
									<li><a href="category_list.php">categories</a></li>
									<li><a href="item_list.php">items</a></li>
									<li><a href="contact.html">contact</a></li>
								</ul>
								<ul class="navbar_user">
									<li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-user" aria-hidden="true"></i></a></li>
									<!-- <li class="checkout">
										<a href="#">
											<i class="fa fa-shopping-cart" aria-hidden="true"></i>
											<span id="checkout_items" class="checkout_items">2</span>
										</a>
									</li> -->
								</ul>
								<div class="hamburger_container">
									<i class="fa fa-bars" aria-hidden="true"></i>
								</div>
							</nav>
						</div>
					</div>
				</div>
			</div>

		</header>