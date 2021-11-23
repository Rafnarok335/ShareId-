<?php
	session_start();
	session_unset();
	header("location:index");
	return;
	if($_SESSION['user']==null)
	{
		$_SESSION['msg']="<span style='color:red'>Login first!!!</span>";
		header("location:login");
		return;
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Andrea - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="frontend/home/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="frontend/home/css/animate.css">
    
    <link rel="stylesheet" href="frontend/home/css/owl.carousel.min.css">
    <link rel="stylesheet" href="frontend/home/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="frontend/home/css/magnific-popup.css">

    <link rel="stylesheet" href="frontend/home/css/aos.css">

    <link rel="stylesheet" href="frontend/home/css/ionicons.min.css">

    <link rel="stylesheet" href="frontend/home/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="frontend/home/css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="frontend/home/css/flaticon.css">
    <link rel="stylesheet" href="frontend/home/css/icomoon.css">
    <link rel="stylesheet" href="frontend/home/css/style.css">
  </head>
  <body>

	<div id="colorlib-page">
		<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
		<aside id="colorlib-aside" role="complementary" class="js-fullheight">
			<div style="text-align: center;"><?php 
			echo "<h3 style='color:#4A4949;'>WELCOME</h3>";
			echo "<h4 style='color:#409499;'>".$_SESSION['user']['user_name']."</h4>";?>
			</div>
			<nav id="colorlib-main-menu" role="navigation">
				<ul>
					<li ><a href="home">Home</a></li>
					<li><a href="profile">Profile</a></li>
					<li><a href="post">Post</a></li>
					<li><a href="inbox">Inbox</a></li>
					<li class="colorlib-active"><a href="about">About</a></li>
				</ul>
			</nav>

			<div class="colorlib-footer">
				<h1 id="colorlib-logo" class="mb-4"><a href="home" style="background-image: url(frontend/home/images/bg_1.jpg);">Share <span>ID</span></a></h1>
				
				<p class="pfooter"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
	  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This website is made with <i class="icon-heart" aria-hidden="true"></i> 
	  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
			</div>
		</aside> <!-- END COLORLIB-ASIDE -->
		<div id="colorlib-main">
			<section class="ftco-section ftco-no-pt ftco-no-pb">
	    	<div class="container">
	    		<div class="row d-flex">
	    			<div class="col-xl-8 py-5 px-md-5">
	    				<div class="row pt-md-4">
			    			<div class="col-md-12">
									<div class="blog-entry ftco-animate d-md-flex">
										<a href="single.html" class="img img-2" style="background-image: url(images/image_1.jpg);"></a>
										<div class="text text-2 pl-md-4">
				              <h3 class="mb-2"><a href="single.html">A Loving Heart is the Truest Wisdom</a></h3>
				              <div class="meta-wrap">
												<p class="meta">
				              		<span><i class="icon-calendar mr-2"></i>June 28, 2019</span>
				              		<span><a href="single.html"><i class="icon-folder-o mr-2"></i>Travel</a></span>
				              		<span><i class="icon-comment2 mr-2"></i>5 Comment</span>
				              	</p>
			              	</div>
				              <p class="mb-4">A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
				              <p><a href="#" class="btn-custom">Read More <span class="ion-ios-arrow-forward"></span></a></p>
				            </div>
									</div>
								</div>
								
			    		</div><!-- END-->
			    		<div class="row">
			          
			        </div>
			    	</div>
	    			
	    		</div>
	    	</div>
	    </section>
		</div><!-- END COLORLIB-MAIN -->
	</div><!-- END COLORLIB-PAGE -->

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="frontend/home/js/jquery.min.js"></script>
  <script src="frontend/home/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="frontend/home/js/popper.min.js"></script>
  <script src="frontend/home/js/bootstrap.min.js"></script>
  <script src="frontend/home/js/jquery.easing.1.3.js"></script>
  <script src="frontend/home/js/jquery.waypoints.min.js"></script>
  <script src="frontend/home/js/jquery.stellar.min.js"></script>
  <script src="frontend/home/js/owl.carousel.min.js"></script>
  <script src="frontend/home/js/jquery.magnific-popup.min.js"></script>
  <script src="frontend/home/js/aos.js"></script>
  <script src="frontend/home/js/jquery.animateNumber.min.js"></script>
  <script src="frontend/home/js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="frontend/home/js/google-map.js"></script>
  <script src="frontend/home/js/main.js"></script>
    
  </body>
</html>