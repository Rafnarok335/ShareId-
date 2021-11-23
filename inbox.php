<?php
	session_start();
	if($_SESSION['user']==null)
	{
		$_SESSION['msg']="<span style='color:red'>Login first!!!</span>";
		header("location:login");
		return;
	}
	include "resources/dbmsconn.php";
	$sqlCommand="SELECT DISTINCT sender FROM inbox WHERE reciever='".$_SESSION['user']['user_name']."' ORDER BY msg_time DESC;";
	$sqlResult=mysqli_query($connect,$sqlCommand);
	if($sqlResult==false)
	{
		echo "DB ERROR";
		return;
	}
	$rows=mysqli_num_rows($sqlResult);
	
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>INBOX</title>
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
					<li><a href="profile?id=<?php echo $_SESSION['user']['user_name']; ?>">Profile</a></li>
					<li><a href="post">Post</a></li>
					<li  class="colorlib-active"><a href="inbox">Inbox</a></li>
					<li><a href="logout">Logout</a></li>
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
			    				<h2 style="text-align: center;margin: 7px;">Your INBOX</h2>
									<div class="blog-entry ftco-animate d-md-flex">

										<table>
										<?php 
										 	if($rows>0){
									     
												while($row=mysqli_fetch_assoc($sqlResult))
											       {

											       		

										?>
											<tr>
												<td  style="padding:20px 50px;"></td><td><a href="messages?id=<?php echo $row['sender']?>"><?php echo $row['sender']?></a></td>
											</tr>

										 <?php 
											       }
											}else{ 
										 ?>
											<tr>
												<td  style="padding:100px 100px;"></td><td><h4>You have no messages to show</h4></td>
											</tr>
											
										<?php
											}
										?>
											
										</table>
										

									</div>
							</div>
								
			    		</div><!-- END-->
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