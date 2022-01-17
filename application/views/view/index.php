<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Sin Costume</title>
	<meta charset="UTF-8">
	<meta name="description" content=" Divisima | eCommerce Template">
	<meta name="keywords" content="divisima, eCommerce, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="<?= base_url('assets')?>/index/img/icons/logo2.png" rel="shortcut icon"/>

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">


	<!-- Stylesheets -->
	<link rel="stylesheet" href="<?= base_url('assets')?>/index/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="<?= base_url('assets')?>/index/css/font-awesome.min.css"/>
	<link rel="stylesheet" href="<?= base_url('assets')?>/index/css/flaticon.css"/>
	<link rel="stylesheet" href="<?= base_url('assets')?>/index/css/slicknav.min.css"/>
	<link rel="stylesheet" href="<?= base_url('assets')?>/index/css/jquery-ui.min.css"/>
	<link rel="stylesheet" href="<?= base_url('assets')?>/index/css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="<?= base_url('assets')?>/index/css/animate.css"/>
	<link rel="stylesheet" href="<?= base_url('assets')?>/index/css/style.css"/>


	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Header section -->
	<header class="header-section">
		<div class="header-top">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 text-center text-lg-left">
						<!-- logo -->
						<a href="./index.html" class="site-logo">
							<img src="<?= base_url('assets')?>/index/img/logo3_1.png" alt="">
						</a>
					</div>
					<div class="col-xl-6 col-lg-5">
						
					</div>
					<div class="col-xl-4 col-lg-5">
						<div class="user-panel">
						<div class="up-item">
								<div class="shopping-card">
									<i class="flaticon-bag"></i>
									
								</div>
								<a href="<?=base_url('index.php/peminjaman')?>">My Cart</a>
							</div>
							<div class="up-item">
								<br>
								<i class="flaticon-profile"></i>
								<a href="<?=base_url('index.php/login')?>">Sign In</a> | <a href="#">Register</a>
							</div><span></span>
							<div class="up-item">
								<br>
								<i class="flaticon-profile"></i>
								
								<a href="<?=base_url('index.php/login/logout')?>">Logout</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<nav class="main-navbar" style="background-color:#4698b8">
			<div class="container" >
				<!-- menu -->
				<ul class="main-menu">
					<li><a href="<?=base_url('index.php/dashboard')?>" li:hover="#000000">Home</a></li>
					<li><a href="<?=base_url('index.php/produk_user/studio')?>">Studio</a></li>
					<li><a href="<?=base_url('index.php/produk_user')?>">Costume</a>
					</li>
					<li><a href="<?=base_url('index.php/contact')?>">Contact</a></li>
				</ul>
			</div>
		</nav>
	</header>
	<!-- Header section end -->







	<!-- letest product section -->
	
		
	<?php
						 // Load View Halaman 
						$this->load->view($konten);
					?>


	
	<!-- Product filter section end -->

<!-- Footer section -->
<section class="footer-section" style="background-color:#4698b8" >
<div class="container">
	<div class="footer-logo text-center">
		<a href="index.html"><img src="<?= base_url('assets')?>/index/img/logo3_1.png" width="300px" height="150px" alt=""></a>
	</div>
	<div class="row">
		<div class="col-lg-3 col-sm-6">
			<div class="footer-widget about-widget">
				<h2 style="color:#413a3a">About</h2>
				<p style="color:white">Sin Costume merupakan website peminjaman kostum dan studio foto secara online. Kami menyediakan berbagai jenis kostum yang disesuaikan dengan tema studio yang ada</p>
				<img src="img/cards.png" alt="">
			</div>
		</div>
		<div class="col-lg-3 col-sm-6">
			<div class="footer-widget about-widget">
				<h2 style="color:#413a3a">Menu</h2>
				<ul >
					<li><a href="" style="color:white">Home</a></li>
					<li><a href="" style="color:white">Costume</a></li>
				</ul>
				<ul>
					<li><a href="" style="color:white">Studio</a></li>
					<li><a href="" style="color:white">Contact</a></li>
				</ul>
			</div>
		</div>
		<div class="col-lg-3 col-sm-6">
			<div class="footer-widget about-widget">
				<h2 style="color:#413a3a">Questions</h2>
				<div class="fw-latest-post-widget">
					<div class="lp-item">
						<div class="lp-thumb set-bg" data-setbg="<?= base_url('assets')?>/index/img/blog-thumbs/1.jpg"></div>
						<h6 style="color:#413a3a">what shoes to wear</h6>
						<div class="lp-content">
							<span style="color:white">Oct 21, 2018</span>
							<a href="#" class="readmore" style="color:#413a3a">Read More</a>
						</div>
					</div>
					<div class="lp-item">
						<div class="lp-thumb set-bg" data-setbg="<?= base_url('assets')?>/index/img/blog-thumbs/2.jpg"></div>
						<h6 style="color:#413a3a">trends this year</h6>
						<div class="lp-content">
							<span style="color:white">Oct 21, 2018</span>
							<a href="#" class="readmore" style="color:#413a3a">Read More</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-sm-6">
			<div class="footer-widget contact-widget">
				<h2 style="color:#413a3a">INFO</h2>
				<div class="con-info">
					<span><a style="color:#413a3a">A.</a></span>
					<p style="color:white">Sin Costume</p>
				</div>
				<div class="con-info">
					<span><a style="color:#413a3a">B.</a></span>
					<p style="color:white">Jalan Danau Kerinci</p>
				</div>
				<div class="con-info">
					<span><a style="color:#413a3a">C.</a></span>
					<p style="color:white">+53 345 7953 32453</p>
				</div>
				<div class="con-info">
					<span><a style="color:#413a3a">D.</a></span>
					<p style="color:white">sincostume@gmail.com</p>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
		<div class="social-links-warp">
			<div class="container">
				<div class="social-links">
					<a href="" class="instagram"><i class="fa fa-instagram"></i><span>instagram</span></a>
					<a href="" class="pinterest"><i class="fa fa-pinterest"></i><span>pinterest</span></a>
					<a href="" class="facebook"><i class="fa fa-facebook"></i><span>facebook</span></a>
					<a href="" class="twitter"><i class="fa fa-twitter"></i><span>twitter</span></a>
					<a href="" class="youtube"><i class="fa fa-youtube"></i><span>youtube</span></a>
					<a href="" class="tumblr"><i class="fa fa-tumblr-square"></i><span>tumblr</span></a>
				</div>

<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --> 
<p class="text-white text-center mt-5">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

			</div>
		</div>
	</section>
	<!-- Footer section end -->



	<!--====== Javascripts & Jquery ======-->
	<script src="<?= base_url('assets')?>/index/js/jquery-3.2.1.min.js"></script>
	<script src="<?= base_url('assets')?>/index/js/bootstrap.min.js"></script>
	<script src="<?= base_url('assets')?>/index/js/jquery.slicknav.min.js"></script>
	<script src="<?= base_url('assets')?>/index/js/owl.carousel.min.js"></script>
	<script src="<?= base_url('assets')?>/index/js/jquery.nicescroll.min.js"></script>
	<script src="<?= base_url('assets')?>/index/js/jquery.zoom.min.js"></script>
	<script src="<?= base_url('assets')?>/index/js/jquery-ui.min.js"></script>
	<script src="<?= base_url('assets')?>/index/js/main.js"></script>

	</body>
</html>
