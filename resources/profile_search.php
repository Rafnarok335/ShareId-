<?php
	if($_SERVER['REQUEST_METHOD']!="POST")
	{
		echo "ERROR";
		return;
	}
	header("location:../profile?id=".$_POST['search']);
?>