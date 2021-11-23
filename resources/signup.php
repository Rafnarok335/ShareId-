<?php
	session_start();
	if($_SERVER['REQUEST_METHOD']!='POST')
	{
		$_SESSION['msg']="<span style='color:red'>ERROR</span>";
		
		header("location:../signup");
	}

	if($_POST['pass']!=$_POST['repeat-pass'])
	{
		$_SESSION['msg']="<span style='color:red'>Password didnt match</span>";
		
		header("location:../signup");	
	}

	$user_name=$_POST['username'];
	$pass=$_POST['pass'];
	$repeat_pass=$_POST['repeat-pass'];
	$first_name=$_POST['first_name'];
	$last_name=$_POST['last_name'];
	$email=$_POST['email'];
	$dob=$_POST['dob'];
	$phone=$_POST['phone'];
	$city=$_POST['city'];
	$country=$_POST['country'];

	include "dbmsconn.php";
	$sqlCommand="SELECT user_name FROM user_info WHERE user_name='".$user_name."';";
	$sqlResult=mysqli_query($connect,$sqlCommand);
	$count=mysqli_num_rows($sqlResult);

	if($count>0)
	{
		$_SESSION['msg']="<span style='color:red'>Username taken!!!</span>";
		header("location:../signup");	
	}
	
	$sqlCommand="INSERT INTO user_info VALUES('".$user_name."','".$pass."','".$first_name."','".$last_name."','".$dob."','".$email."','".$phone."','".$city."','".$country."');";
	$sqlResult=mysqli_query($connect,$sqlCommand);
	if($sqlResult==false)
	{
		echo "dbms prob";
	}
	$_SESSION['msg']="<span style='color:#90EE90'>Successfully registered</span>";
		header("location:../signup");

                                                                                                                         
?>