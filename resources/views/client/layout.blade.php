<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Bán điện thoại - @yield('title')</title>
	<meta charset="UTF-8">
	<meta name="description" content=" Divisima | eCommerce Template">
	<meta name="keywords" content="divisima, eCommerce, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<!-- Favicon -->
	<link href="/images/favicon.ico" rel="shortcut icon"/>

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="/client/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="/client/css/font-awesome.min.css"/>
	<link rel="stylesheet" href="/client/css/flaticon.css"/>
	<link rel="stylesheet" href="/client/css/slicknav.min.css"/>
	<link rel="stylesheet" href="/client/css/jquery-ui.min.css"/>
	<link rel="stylesheet" href="/client/css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="/client/css/animate.css"/>
	<link rel="stylesheet" href="/client/css/style.css"/>

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
						<a href="/" class="site-logo">
							<img src="/images/logo.png" alt="">
						</a>
					</div>
					<div class="col-xl-6 col-lg-5">
						<form class="header-search-form">
							<input type="text" placeholder="Search on divisima ....">
							<button><i class="flaticon-search"></i></button>
						</form>
					</div>
					<div class="col-xl-4 col-lg-5">
						<div class="user-panel" id="user-panel">
							<div class="up-item">
								@if(!Auth::user())
									<i class="flaticon-profile"></i>
									<a href="/login">Sign</a> In or <a href="/register">Create Account</a>
								@else
									<div class="dropdown">
										<a href="" data-toggle="dropdown"><i class="flaticon-profile"></i> {{Auth::user()->name}}</a>
										<div class="dropdown-menu">
											<a class="dropdown-item setting-user" href="/user/setting">Setting</a>
											<form method="POST" action="{{ route('logout') }}">
												@csrf
												<button class="btn dropdown-item" type="submit">Logout</button>
											</form>
										</div>
									</div>
								@endif
							</div>
							<div class="up-item" id="up-item-shopping-card">
								<div class="up-item-shopping-card">
									<div class="shopping-card">
										<i class="flaticon-bag"></i>
										@if($countProducts)
											<span>{{count($countProducts)}}</span>
										@else
											<span>0</span>
										@endif
									</div>
									<a href="/cart">Shopping Cart</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<nav class="main-navbar">
			<div class="container">
				<!-- menu -->
				<ul class="main-menu">
					<li><a href="/">Home</a></li>
					<li><a href="/about">About</a></li>
					<li><a href="/contact">Contact</a></li>
					<li><a href="/blog">Blog</a></li>
				</ul>
			</div>
		</nav>
	</header>
	<!-- Header section end -->

	<!-- Product filter section -->
	@yield('content')
	<!-- Product filter section end -->

	<!-- Footer section -->
	<section class="footer-section">
		<div class="container">
			<div class="footer-logo text-center">
				<a href="index.html"><img src="/images/logo-light.png" alt=""></a>
			</div>
			<div class="row">
				<div class="col-lg-3 col-sm-6">
					<div class="footer-widget about-widget">
						<h2>About</h2>
						<p>Donec vitae purus nunc. Morbi faucibus erat sit amet congue mattis. Nullam frin-gilla faucibus urna, id dapibus erat iaculis ut. Integer ac sem.</p>
						<img src="/images/cards.png" alt="">
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="footer-widget about-widget">
						<h2>Questions</h2>
						<ul>
							<li><a href="">About Us</a></li>
							<li><a href="">Track Orders</a></li>
							<li><a href="">Returns</a></li>
							<li><a href="">Jobs</a></li>
							<li><a href="">Shipping</a></li>
							<li><a href="">Blog</a></li>
						</ul>
						<ul>
							<li><a href="">Partners</a></li>
							<li><a href="">Bloggers</a></li>
							<li><a href="">Support</a></li>
							<li><a href="">Terms of Use</a></li>
							<li><a href="">Press</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="footer-widget about-widget">
						<h2>Questions</h2>
						<div class="fw-latest-post-widget">
							<div class="lp-item">
								<div class="lp-thumb set-bg" data-setbg="/images/blog-thumbs/1.jpg"></div>
								<div class="lp-content">
									<h6>what shoes to wear</h6>
									<span>Oct 21, 2018</span>
									<a href="#" class="readmore">Read More</a>
								</div>
							</div>
							<div class="lp-item">
								<div class="lp-thumb set-bg" data-setbg="/images/blog-thumbs/2.jpg"></div>
								<div class="lp-content">
									<h6>trends this year</h6>
									<span>Oct 21, 2018</span>
									<a href="#" class="readmore">Read More</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="footer-widget contact-widget">
						<h2>Questions</h2>
						<div class="con-info">
							<span>C.</span>
							<p>Your Company Ltd </p>
						</div>
						<div class="con-info">
							<span>B.</span>
							<p>1481 Creekside Lane  Avila Beach, CA 93424, P.O. BOX 68 </p>
						</div>
						<div class="con-info">
							<span>T.</span>
							<p>+53 345 7953 32453</p>
						</div>
						<div class="con-info">
							<span>E.</span>
							<p>office@youremail.com</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="social-links-warp">
			<div class="container">
				<div class="social-links">
					<a href="" class="instagram"><i class="fa fa-instagram"></i><span>instagram</span></a>
					<a href="" class="google-plus"><i class="fa fa-google-plus"></i><span>g+plus</span></a>
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
	
	<script src="/client/js/jquery-3.2.1.min.js"></script>
	<script src="/client/js/bootstrap.min.js"></script>
	<script src="/client/js/jquery.slicknav.min.js"></script>
	<script src="/client/js/owl.carousel.min.js"></script>
	<script src="/client/js/jquery.nicescroll.min.js"></script>
	<script src="/client/js/jquery.zoom.min.js"></script>
	<script src="/client/js/jquery-ui.min.js"></script>
	<script src="/client/js/main.js"></script>
	<script src="{{asset('vendor/notify.js')}}"></script>
	
	<script type="text/javascript">
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
	</script>
	</body>
</html>
