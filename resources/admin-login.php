<?php 
	session_start();
	$name=$_POST['username'];
	$pass=$_POST['pass'];
	include "dbmsconn.php";
	$sqlCommand="SELECT * FROM admin WHERE admin_id='".$name."';";
	$sqlResult=mysqli_query($connect,$sqlCommand);
	if($sqlResult==false)
	{
		$_SESSION['msg']="<span style='color:red'>DBMS PROB</span>";
		header("location:../admin-login");
		return;
	}
	$row=mysqli_num_rows($sqlResult);
	if($row==0)
	{
		$_SESSION['msg']="<span style='color:red'>invalid id</span>";
		header("location:../admin-login");
		return;
	}
	$row=mysqli_fetch_assoc($sqlResult);
	if ($pass==$row['pass']) {
		$_SESSION['user']=$row;
		header("location:../admin-home");
	}
	else
	{
		$_SESSION['msg']="<span style='color:red'>invalid pass</span>";
		header("location:../admin-login");
		return;
	}

?>