<?php 
	class controller_login{
		public $model;
		public function __construct(){
			$this->model = new model();
			//---
			//khi user an nut submit
			if($_SERVER["REQUEST_METHOD"] == "POST"){
				$c_email = $_POST["c_email"];
				$c_password = $_POST["c_password"];
				//ham md5 se hash chuoi ky tu ra 128bit
				$c_password = md5($c_password);
				//lay mot ban ghi tuong ung voi email va password truyen vao
				$record = $this->model->get_a_record("select c_email,c_password from tbl_user where c_email='$c_email'");
				if(isset($record->c_email)){
					//so khop password
					if($c_password == $record->c_password){
						//so khop duoc ca email va password, co nghia la dang nhap thanh cong
						$_SESSION["c_email"] = $c_email;						
					}
				}
				//di chuyen den trang admin.php
				header("location:giaovien.php");
			}
			//---
			//load file view
			include "view/backend/w_giaovien/view_login.php";
			//---
		}
	}
	new controller_login();
 ?>