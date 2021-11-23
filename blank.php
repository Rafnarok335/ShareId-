<?php 
	$sqlCommand="SELECT *,date_format(post_time,'%D %M ,%Y %l:%i %p') AS time_details FROM `inbox` WHERE sender='"."user1"."' AND reciever='"."user2"."' OR reciever='"."user1"."' AND sender='"."user2"."' ORDER BY msg_time DESC;";
	//echo $sqlCommand;
	date_default_timezone_set("Asia/dhaka");
	$time=date('Y-m-d H:m:s');
	echo $time;
?>
