<?php 
	session_start();
	//load config
	include "config.php";
	//load file model.php
	include "model/model.php";
	//load file common
	include "public/backend/Classes/Common.php";
	//kiem tra sem session c_email da ton tai chua, neu chua ton tai thi load MVC login, neu da ton tai thi load file master.php
	if(isset($_SESSION["SS_USER"]) == false)
		include "controller/backend/controller_login.php";
	else{
		//lay bien controller truyen tu url
		$controller = isset($_GET["controller"]) ? $_GET["controller"] : "";
		//noi cac thanh phan de ra duong dan vat ly
		$file_controller = "controller/backend/w_giaovien/controller_$controller.php";
		//load file master
		include "view/backend/w_giaovien/master_giaovien.php";
	}
 ?>