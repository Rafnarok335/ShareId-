<?php
	session_start();
	if(isset($_SESSION['user'])==null)
	{
		$_SESSION['msg']="<span style='color:red'>Login first</span>";
		header("location:../admin-login");
		return;
	}	

	if (isset($_GET['b'])==null||isset($_GET['s'])==null||isset($_GET['t'])==null) {
		$_SESSION['msg']="<span style='color:red'>Login first</span>";
		header("location:../admin-login");
		return;
	}

	$buyer=$_GET['b'];
	$seller=$_GET['s'];
	$time=$_GET['t'];

	include "dbmsconn.php";
	$sqlCommand="UPDATE posts SET status='YES' WHERE user_name='".$seller."' AND post_time='".$time."';";
	$sqlResult=mysqli_query($connect,$sqlCommand);
	if($sqlResult==false)
	{
		$_SESSION['msg']="<span style='color:red'>DBMS PROB 1</span>";
		header("location:../admin-home");
		return;
	}
	$sqlCommand="SELECT * FROM posts WHERE user_name='".$seller."' AND post_time='".$time."';";
	$sqlResult=mysqli_query($connect,$sqlCommand);
	if($sqlResult==false)
	{
		$_SESSION['msg']="<span style='color:red'>DBMS PROB 2</span>";
		header("location:../admin-home");
		return;
	}
	$rows=mysqli_fetch_assoc($sqlResult);

	$msg="<p>Your transaction was verified </p><p>username/email is ".$rows['uid']."</p><p>Password is ".$rows['upass']."</p>";
	$time2="CONCAT(CURRENT_DATE,' ',CURRENT_TIME)";
	$sqlCommand="INSERT INTO  inbox VALUES('admin','".$buyer."',".$time2.",'".$msg."');";
	$sqlResult=mysqli_query($connect,$sqlCommand);
	if($sqlResult==false)
	{
		$_SESSION['msg']="<span style='color:red'>DBMS PROB 3</span>".$sqlCommand;
		header("location:../admin-home");
		//echo $sqlCommand;
		return;
	}
	
	$msg="<p>Your transaction was verified </p><p>user ".$rows['uid']." bought you post</p>";
	$time2="CONCAT(CURRENT_DATE,' ',CURRENT_TIME)";
	$sqlCommand="INSERT INTO  inbox VALUES('admin','".$seller."',".$time2.",'".$msg."');";
	$sqlResult=mysqli_query($connect,$sqlCommand);
	if($sqlResult==false)
	{
		$_SESSION['msg']="<span style='color:red'>DBMS PROB 4</span>";
		header("location:../admin-home");
		//echo $sqlCommand;
		return;
	}
	$sqlCommand="DELETE FROM pending_post WHERE seller='".$seller."' AND buyer='".$buyer."' AND post_time='".$time."';";
	$sqlResult=mysqli_query($connect,$sqlCommand);
	if($sqlResult==false)
	{
		$_SESSION['msg']="<span style='color:red'>DBMS PROB 5</span>";
		header("location:../admin-home");
		return;
	}
	$_SESSION['msg']="<span style='color:limegreen'>you accepted the post!!!</span>";
	header("location:../admin-home");

?>