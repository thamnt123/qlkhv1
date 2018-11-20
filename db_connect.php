<?php 
	$hostname = "localhost";
	$user = "root";
	$password = "";
	$database = "qlkh";
	$db = mysqli_connect($hostname,$user,$password,$database);
	mysqli_set_charset($db,"UTF8");
	$mysqli = mysqli_connect('localhost', 'root','', 'qlkh');
	$mysqli->set_charset('utf8');
	if(mysqli_connect_errno()){
		echo 'Connect Failed:'.mysqli_connect_error();
		exit;
	}
 ?>