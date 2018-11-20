<?php 
	class controller_logout{
		public function __construct(){
			//xoa session
			unset($_SESSION["SS_USER"]);
			//di chuyen den trang admin
			header("location:admin.php");
		}
	}
	new controller_logout();
 ?>