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
				$record = $this->model->get_a_record("select * from tbl_user where c_email='$c_email'");
				if(isset($record->c_email)){
					//so khop password
					if($c_password == $record->c_password){
						//so khop duoc ca email va password, co nghia la dang nhap thanh cong
						$_SESSION["SS_USER"] = $record;						
						
					}
				}
				//load file view
				switch ($record->UserType) {
					case USER_TYPE::GIAO_VIEN:
						header("location:giaovien.php");
						break;
					case USER_TYPE::TRUONG_BO_MON:
						header("location:truongbomon.php");
						break;
					case USER_TYPE::HOI_DONG:
						header("location:hoidong.php");
						break;
					case USER_TYPE::ADMIN:
						header("location:admin.php");
						break;
				}
				//di chuyen den trang admin.php
				
			}
			//---

			include "view/backend/view_login.php";
			//---
		}
	}
	new controller_login();
 ?>