<?php
	$db_name = "runtech";
	$mysql_username = "koketso";
	$mysql_password = "koketso";
	$server_name = "localhost";
	$port="3306";

	$conn = mysqli_connect($server_name,$mysql_username,$mysql_password,$db_name, $port);

	if ($conn) {
		# code...
		//echo "Connected";
	}
?>