<?php
	session_start();
	if($_SESSION['user']==null)
	{
		$_SESSION['msg']="<span style='color:red'>Login first!!!</span>";
		header("location:login");
		return;
	}
	include "resources/dbmsconn.php";
	$sqlCommand="SELECT * FROM user_info WHERE user_name='".$_GET['id']."';";
	$sqlResult=mysqli_query($connect,$sqlCommand);
	$row=mysqli_num_rows($sqlResult);
	if($row==0)
	{
		echo "SUCH USER DOES NOT EXISTS!!!<br>";
		echo "<a href='home'>Go Back</a>";
		exit();
	}
	$row=mysqli_fetch_assoc($sqlResult);

	$sqlCommand="SELECT ROUND(AVG(rate),0 )as rate FROM rating WHERE user_name='".$_GET['id']."' GROUP BY user_name;";
	$sqlResult=mysqli_query($connect,$sqlCommand);	
	if($sqlResult==false)
	{
		echo "DBMS ERROR!!!<br>";
		echo "<a href='home'>Go Back</a>";
		exit();
	}
	$rate=mysqli_fetch_assoc($sqlResult);
	if($rate['rate']==null)
	{
		$r="NOT RATED YET";
	}
	else
	{
		$r=$rate['rate'];
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Profile</title>
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
					<li class="colorlib-active"><a href="profile?id=<?php echo $_SESSION['user']['user_name']; ?>">Profile</a></li>
					<li><a href="post">Post</a></li>
					<li><a href="inbox">Inbox</a></li>
					<li><a href="logout">Logout</a></li>
				</ul>
			</nav>

			
		</aside> <!-- END COLORLIB-ASIDE -->
		<div id="colorlib-main">
			<section class="ftco-section ftco-no-pt ftco-no-pb">
	    	<div class="container">
	    		<div class="row d-flex">	
	    			<div class="col-xl-8 py-5 px-md-5">
	    				<div class="row pt-md-4">
	    					<div class="col-md-12">
	    						<div class="blog-entry ftco-animate d-md-flex">
	    							<div class="text text-2 pl-md-4">
	    						         <h1 style="text-align: center;">DETAILS of <?php echo $_GET['id']; ?> </h1>
	    							</div>
	    					    </div>
	    					</div>
	    				</div>
	    				<div class="row pt-md-4">
	    					<div class="col-md-12">
	    						<div class="blog-entry ftco-animate d-md-flex">
	    							<div class="text text-2 pl-md-4">
	    						         <form method = "post" action="resources/editprofile.php" id ="form1">
	    						         <table>
	    						         	<tr>
	    						         		<td >User Name : &nbsp;&nbsp;&nbsp;</td><td><input type="hidden" name="username" value="<?php echo $row['user_name']; ?>"></td>
	    						         	</tr>
	    						         	
	    						         	<tr>
	    						         		<td >First Name : &nbsp;&nbsp;&nbsp;</td><td><input type="text" name="first_name" value="<?php echo $row['first_name']; ?>"></td>
	    						         		
	    						         	</tr>
	    						         	<tr>
	    						         		<td >Last Name : &nbsp;&nbsp;&nbsp;</td><td><input type="text" name="last_name" value="<?php echo $row['last_name'];?>"></td>
	    						         		
	    						         	</tr>
	    						         	<tr>
	    						         		<td >Email : &nbsp;&nbsp;&nbsp;</td><td><input type="text" name="email" value="<?php echo $row['email']; ?>"></td>
	    						         		
	    						         	</tr>
	    						         	<tr>
	    						         		<td >Country : &nbsp;&nbsp;&nbsp;</td><td><input type="text" name="country" value="<?php echo $row['country'];?>"></td>
	    						         		
	    						         	</tr>
	    						     		
	    						         	<tr>
	    						         		<td>Rating : &nbsp;&nbsp;&nbsp;</td><td> <?php echo $r; ?></td>
	    						         	</tr>	
	    						        


	    						         </table>
	    						         
	    						         <button type="submit" form="form1">Save</button>
	    						       
	    				 		   		</form> 
	    				 		       <!-- RATING START -->
	    				 		       <?php if($_SESSION['user']['user_name']!=$_GET['id']){ ?> <p style="text-align: center;margin: 10px auto"><button><a href="messages?id=<?php echo $_GET['id'];?>">Message<a/></button></p> <?php } ?>
	    						       <div style="text-align: center;">
	    						         	<?php
		    						       	if(isset($_SESSION['msg'])!=null)
		    						       	{
		    						       		echo $_SESSION['msg'];
		    						       	}

		    						       	 if($_SESSION['user']['user_name']!=$_GET['id']){ 

		    						       	?>
		    						       	<form action="resources/rate" method="post" id="form">
		    						       		<table>
		    						       			<tr>
		    						       				<input type="hidden" name="user" value="<?php echo $_GET['id'];?>">
		    						       				<td>Rate user</td><td><input type="number"  max="5" min="0" name="rate"></td>
		    						       			</tr>
		    						       		</table>
		    						       	</form>
		    						       	<?php

		    						       	  }  ?>
		    						       <?php if($_SESSION['user']['user_name']!=$_GET['id']){ ?> <p style="text-align: left;margin:0 90px auto"><button form="form"><a>Rate<a/></button></p> <?php } ?>
	    								</div> <!-- RATING ENDS -->
	    							</div>
	    					    </div>
	    					</div>
	    				</div>
	    				<!-- DYNAMIC POSTS -->
	    				<?php
	    					$sqlCommand="SELECT *,date_format(post_time,'%D %M ,%Y %l:%i %p') AS time_details FROM `posts` WHERE user_name='".$_GET['id']."' ORDER BY post_time DESC;";
	    					$sqlResult=mysqli_query($connect,$sqlCommand);
	    					while ($row=mysqli_fetch_assoc($sqlResult)) {
	    						# code...
	    					

	    				?>
	    				<div class="row pt-md-4">
			    			<div class="col-md-12">
									<div class="blog-entry ftco-animate d-md-flex"><span class="img img-2">POSTED BY:
										<a href="profile?id="<?php echo $row['user_name']?>  style="word-wrap:break-word;"><br><?php echo $row['user_name']?></a></span>
							
							<div class="text text-2 pl-md-4">
				              <h3 class="mb-2"><a href="purchase?id=<?php echo $row['user_name']?>&t=<?php echo $row['post_time']?>"><?php echo $row['title']?></a></h3>
				              <div class="meta-wrap">
												<p class="meta">
				              		<span><i class="icon-calendar mr-2"></i><?php echo $row['time_details']?></span>
				              		<span><a href="single.html"><i class="icon-folder-o mr-2"></i><?php echo $row['catagory']?></a></span>
				              		<span><i class="icon-comment2 mr-2"></i><?php echo $row['price']?> TAKA</span>
				              	</p>
			              	</div>
				              <p class="mb-4"><?php echo $row['comment']?></p>
				              <p><a href="purchase?id=<?php echo $row['user_name']?>&t=<?php echo $row['post_time']?>" class="btn-custom">Purchase</a></p>
				            </div>
									</div>
								</div>
								
			    		</div>
			    		<!-- END-->
			    		<?php
			    			}
			    		?>
			    		<!-- Dynamic ends-->
			    	</div>
	    			<div class="col-xl-4 sidebar ftco-animate bg-light pt-5">
			    		<div class="sidebar-box pt-md-4">
			              <form action="resources/profile_search" class="search-form" method="post">
			                <div class="form-group">
			                  <span class="icon icon-search"></span>
			                  <input type="text" class="form-control" name="search" placeholder="Search user">
			                </div>
			              </form>
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