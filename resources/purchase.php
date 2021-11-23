<?php
	session_start();
	if(isset($_SESSION['user'])==null)
	{
		$_SESSION['msg']="<span style='color:red;'>Login first!!!</span>";
		header("location:../login");
	}
	if($_SERVER['REQUEST_METHOD']!="POST")
	{
		echo "error";
		return;
	}
	$buyer=$_SESSION['user']['user_name'];
	$seller=$_POST['seller'];
	$time=$_POST['post_time'];
	$tran_id=$_POST['tran_id'];
	echo $buyer."<br>";
	echo $seller."<br>";
	echo $time."<br>";
	echo $tran_id;
	include "dbmsconn.php";
	$sqlCommand="SELECT * FROM pending_post WHERE buyer='".$buyer."' AND seller='".$seller."' AND post_time='".$time."';";
	$sqlResult=mysqli_query($connect,$sqlCommand);
	$row=mysqli_num_rows($sqlResult);
	echo $row;
	if($row>0)
	{
		$_SESSION['msg']="<span style='color:red;'>You have already made transaction</span>";
		header("location:../purchase?id=".$seller."&t=".$time);
		return;
	}
	$sqlCommand="INSERT INTO pending_post VALUES('".$buyer."','".$seller."','".$time."','".$tran_id."');";
	$sqlResult=mysqli_query($connect,$sqlCommand);
	if($sqlResult==false)
	{
		$_SESSION['msg']="<span style='color:red;'>Transaction failed!!!</span>";
		header("location:../purchase?id=".$seller."&t=".$time);
		return;
	}
	else
	{
		$_SESSION['msg']="<span style='color:green;'>Waiting for approval<br>You will get a message!!!</span>";
		header("location:../purchase?id=".$seller."&t=".$time);
		return;
	}



?>