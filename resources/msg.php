<?php
	session_start();
	if($_SESSION['user']==null)
	{
		$_SESSION['msg']="<span style='color:red'>Login first!!!</span>";
		header("location:login");
		return;
	}
	include "dbmsconn.php";
	date_default_timezone_set("Asia/dhaka");
	$time="CONCAT(CURRENT_DATE,' ',CURRENT_TIME)";
	$sender=$_SESSION['user']['user_name'];
	$reciever=$_POST['rec'];
	$msg=$_POST['msg'];
	$sqlCommand="INSERT INTO inbox VALUES('".$sender."','".$reciever."',".$time.",'".$msg."');";
	$sqlResult= mysqli_query($connect,$sqlCommand);
	if($sqlResult==false)
	{
		echo "DBMS ERROR";
	}
	else
	{
		header("location:../messages?id=".$reciever);
	}
?>