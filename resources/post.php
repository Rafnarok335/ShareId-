<?php //ARNOB
	session_start();
	if(isset($_SESSION['user'])==null)
	{
		$_SESSION['msg']="<span style='color:red'>No User Found</span>";
		header("location:../login");
		return;
	}
	
	if($_SERVER['REQUEST_METHOD']!="POST")
	{

	 	$_SESSION['msg']="<span style='color:red'>ERROR</span>";
	 	header("location:../login");
	 	return;
    }
    
	include "dbmsconn.php";
	//$user_name="USER";
	$user_name=$_SESSION['user']['user_name'];
	date_default_timezone_set("Asia/dhaka");
	$time="CONCAT(CURRENT_DATE,' ',CURRENT_TIME)";
	$title=$_POST["post_title"];
	$price=$_POST["post_price"];
	$uid=$_POST["post_uid"];
	$upass=$_POST["post_pass"];
	$comment=$_POST["comment"];
	$catagory=$_POST["post_category"];
	$status='NO';
	$sqlCommand="INSERT INTO posts VALUES('".$user_name."',".$time.",'".$title."','".$catagory."','".$price."','".$comment."','".$uid."','".$upass."','".$status."');";
	$sqlResult=mysqli_query($connect,$sqlCommand);
	if($sqlResult==false)
	{
		$_SESSION['msg']="<span style='color:red'>could not post</span>";
		header("location:../post");
		return;
	}
	else
	{
		$_SESSION['msg']="<span style='color:#90EE90'>POSTED!!!</span>";
		header("location:../post");
		return;
	}
	
?>