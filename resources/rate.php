<?php
 session_start();
 if($_SERVER['REQUEST_METHOD']!="POST")
 {
 	$_SESSION['msg']="<span style='color:red'>IT WAS NOT POST METHOD</span>";
	header("location:../login");
	return;
 }
 $user=$_POST['user'];
 $rate=$_POST['rate'];
 include "dbmsconn.php";
 $sqlCommand="INSERT INTO rating VALUES('".$user."','".$rate."')";
 $sqlResult=mysqli_query($connect,$sqlCommand);
 if($sqlResult==false)
 {
 	$_SESSION['msg']="<span style='color:red'>DBMS ERROR</span>";
	header("location:../profile?id=".$user);
	return;
 }
 header("location:../profile?id=".$user);
?>