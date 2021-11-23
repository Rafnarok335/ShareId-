<?php
//RAFI
session_start();
 if($_SERVER['REQUEST_METHOD']!="POST"){

 	$_SESSION['msg']="<span style='color:red'>ERROR</span>";
 	header("location:../login");
 }
    $user_name=$_POST['username'];
	$pass=$_POST['pass'];
	include "dbmsconn.php";
	$sqlCommand = "SELECT * FROM user_info WHERE user_name='".$user_name."';";
	$sqlResult=mysqli_query($connect,$sqlCommand);
	$row=mysqli_fetch_assoc($sqlResult);
	$_SESSION['user']=$row;
	$count=mysqli_num_rows($sqlResult);
	//echo $count;
	if($count==0){
		$_SESSION['msg']="<span style='color:red'>No User Found</span>";
		header("location:../login");
		return;
	}

	$sqlCommand="SELECT user_pass FROM user_info WHERE user_name='".$user_name."';";
	$sqlResult=mysqli_query($connect,$sqlCommand);
	$row=mysqli_fetch_assoc($sqlResult);
	
	if($row['user_pass']==$pass){
     header("location:../home");

	}
	else
	{
		$_SESSION['msg']="<span style='color:red'>INVALID PASS</span>";
		header("location:../login");	
	}