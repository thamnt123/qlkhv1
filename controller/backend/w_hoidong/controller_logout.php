<?php 
	class controller_logout{
		public function __construct(){
			//xoa session
			unset($_SESSION["c_email"]);
			//di chuyen den trang admin
			header("location:hoidong.php");
		}
	}
	new controller_logout();
 ?>