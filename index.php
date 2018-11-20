<?php 
	//start session
	session_start();
	//load file config
	include "config.php";
	//load file model
	include "model/model.php";
	
	//load file common
	//include('public/backend/Classes/Common.php');
	//lay bien controller truyen tu url
	$controller = isset($_GET["controller"]) ? $_GET["controller"] : "home";
	//noi cac thanh phan de ra duong dan vat ly
	$file_controller = "controller/frontend/controller_$controller.php";
	//load file master
	include "view/frontend/master.php";

 ?>
