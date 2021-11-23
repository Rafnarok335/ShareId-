<?php
session_start();
if(isset($_SERVER['REQUEST_METHOD'])!='POST'){
 		$_SESSION['msg']= "<span style='color::red'>ERROR</span>";
 		header("location:../home.php");	
 	}	 
 	include "dbmsconn.php";
 	var_dump($_POST['username']);
 	$user_name=$_POST['username']; 
 	$sqlCommand="DELETE FROM user_info WHERE user_name = '".$user_name."';";
 	mysqli_query($connect,$sqlCommand);
 	$sqlCommand2="DELETE FROM post WHERE user_name = '".$user_name."';";
	$sqlCommand3="DELETE FROM inbox WHERE reciever = '".$user_name."' OR sender = '".$user_name."';";
	$sqlCommand4="DELETE FROM pending_post WHERE seller = '".$user_name."' OR buyer = '".$user_name."';";
	mysqli_query($connect,$sqlCommand2);
	mysqli_query($connect,$sqlCommand3);
	mysqli_query($connect,$sqlCommand4);
	header("Location:../index.php");
	
?>