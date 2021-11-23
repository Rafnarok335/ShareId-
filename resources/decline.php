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
	

	

	$msg="<p>Your transaction was denied </p>";
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
	
	
	$sqlCommand="DELETE FROM pending_post WHERE seller='".$seller."' AND buyer='".$buyer."' AND post_time='".$time."';";
	$sqlResult=mysqli_query($connect,$sqlCommand);
	if($sqlResult==false)
	{
		$_SESSION['msg']="<span style='color:red'>DBMS PROB 5</span>";
		header("location:../admin-home");
		return;
	}
	$_SESSION['msg']="<span style='color:red'>you declined the post!!!</span>";
	header("location:../admin-home");

?>