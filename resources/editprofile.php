<?php 
     session_start();
 	if(isset($_SERVER['REQUEST_METHOD'])!='POST'){
 		$_SESSION['msg']= "<span style='color::red'>ERROR</span>";
 		header("location:../editProfile");	
 	}	 
 	$user_name=$_POST['username']; 
 	$first_name=$_POST['first_name'];
 	$last_name=$_POST['last_name'];
 	$email=$_POST['email'];
 	$country=$_POST['country'];
	include "dbmsconn.php";
	$sqlCommand="UPDATE user_info SET first_name='".$first_name."', last_name='".$last_name."', email='".$email."', country='".$country."' WHERE user_name='".$user_name."';";
	$sqlResult=mysqli_query($connect,$sqlCommand);
	if($sqlResult=true){
	$_SESSION['msg'] = "<span style='color:green'>SUCCESSFULLY UPDATED</span>";
	header("Location:../Profile.php?id=".$user_name);
}
else {
		echo "dbms prob";
		header("location:../profile");
	}


?>