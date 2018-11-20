<?php 
	class controller_add_edit_user{
		public $model;
		public function __construct(){
			$this->model = new model();
			//---
			$act = isset($_GET["act"]) ? $_GET["act"] : "";
			$id = isset($_GET["id"])&&is_numeric($_GET["id"]) ? $_GET["id"] : 0;
			switch($act){
				case "edit":
					//lay 1 ban ghi truong ung voi id truyen vao
					$record = $this->model->get_a_record("select * from tbl_user where pk_user_id=$id");
					//khai bao bien $form_action de dieu phoi action cua the form
					$form_action = "admin.php?controller=add_edit_user&act=do_edit&id=$id";
					//load view
					include "view/backend/view_add_edit_user.php";
				break;
				case "do_edit":
					$c_fullname = $_POST["c_fullname"];
					$fk_mabomon_id = $_POST["fk_mabomon_id"];
					$c_hocham = $_POST["c_hocham"];
					$c_hocvi = $_POST["c_hocvi"];
					$c_ngaysinh = $_POST["c_ngaysinh"];
					$c_diachi = $_POST["c_diachi"];
					$c_sdt = $_POST["c_sdt"];
					$c_password = $_POST["c_password"];
					$UserType = $_POST["UserType"];
					//-----
					//replace ky tu dac biet
					$c_fullname = str_replace("'", "\'", $c_fullname);
					//-----
					//update ban ghi
					$this->model->execute("update tbl_user set c_fullname='$c_fullname',fk_mabomon_id=$fk_mabomon_id, c_hocham='$c_hocham',c_hocvi='$c_hocvi', c_ngaysinh='$c_ngaysinh', c_diachi='$c_diachi', c_sdt=$c_sdt, UserType=$UserType where pk_user_id=$id");
					//neu password khong bang rong thi update password
					if($c_password != ""){
						//ma hoa password
						$c_password = md5($c_password);
						//update ban ghi
						$this->model->execute("update tbl_user set c_password='$c_password' where pk_user_id=$id");
					}
					//di chuyen den trang user
					header("location:admin.php?controller=user");
				break;
				case "add":
					//khai bao bien $form_action de dieu phoi action cua the form
					$form_action = "admin.php?controller=add_edit_user&act=do_add";
					//load view
					include "view/backend/view_add_edit_user.php";
				break;
				case "do_add":
					$c_fullname = $_POST["c_fullname"];
					$fk_mabomon_id = $_POST["fk_mabomon_id"];
					$c_hocham = $_POST["c_hocham"];
					$c_hocvi = $_POST["c_hocvi"];	
					$c_ngaysinh = $_POST["c_ngaysinh"];
					$c_diachi = $_POST["c_diachi"];
					$c_sdt = $_POST["c_sdt"];
					$c_email = $_POST["c_email"];
					$c_password = $_POST["c_password"];
					$UserType = $_POST["UserType"];
					//-----
					//replace ky tu dac biet
					$c_fullname = str_replace("'", "\'", $c_fullname);
					$c_email = str_replace("'", "\'", $c_email);
					//-----
					//ma hoa password
					$c_password = md5($c_password);
					//insert ban ghi
					$this->model->execute("insert into tbl_user(c_fullname,fk_mabomon_id, c_hocham, c_hocvi, c_ngaysinh, c_diachi, c_sdt,c_email,c_password, UserType) values('$c_fullname', '$fk_mabomon_id', '$c_hocham', '$c_hocvi', '$c_ngaysinh', '$c_diachi', '$c_sdt','$c_email','$c_password', '$UserType')");
					//di chuyen den trang user
					header("location:admin.php?controller=user");
				break;
				case "delete":
					//xoa ban ghi tuong ung voi id truyen vao
					$this->model->execute("delete from tbl_user where pk_user_id=$id");
					//di chuyen den trang user
					header("location:admin.php?controller=user");
				break;
				case "deleteMuti":
					$listId = $_GET['listId'];
					$this->model->execute("delete from tbl_user where pk_user_id in ($listId)");
					header("location:admin.php?controller=user");
				break;
				default:
					//di chuyen den trang user
					header("location:admin.php?controller=user");
				break;
			}
			//---
		}
	}
	new controller_add_edit_user();
 ?>