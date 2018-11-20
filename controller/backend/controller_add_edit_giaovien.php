<?php 
	class controller_add_edit_giaovien{
		public $model;
		public function __construct(){
			//------
			$this->model = new model();
			//------
			$act = isset($_GET["act"]) ? $_GET["act"] : "";
			$id = isset($_GET["id"])&&is_numeric($_GET["id"]) ? $_GET["id"] : 0;
			switch($act){
				//----
				case "edit":
					//lay 1 ban ghi truong ung voi id truyen vao
					$record = $this->model->get_a_record("select * from tbl_giaovien where pk_magiaovien_id=$id");
					$form_action = "admin.php?controller=add_edit_giaovien&act=do_edit&id=$id";
					//load view
					include "view/backend/view_add_edit_giaovien.php";
				break;
				case "do_edit":
					$c_tengiaovien = $_POST["c_tengiaovien"];
					$fk_mabomon_id = $_POST["fk_mabomon_id"];
					$c_hocvi = $_POST["c_hocvi"];
					$c_hocham = $_POST["c_hocham"];
					$c_ngaysinh = $_POST["c_ngaysinh"];
					$c_diachi = $_POST["c_diachi"];
					$c_sdt = $_POST["c_sdt"];
					$c_email = $_POST["c_email"];
					//-----
					//replace ky tu dac biet
					$c_tengiaovien = str_replace("'", "\'", $c_tengiaovien);
					$c_gioitinh = str_replace("'", "\'", $c_gioitinh);
					$c_diachi = str_replace("'", "\'", $c_diachi);
					//-----
					//update ban ghi
					$this->model->execute("update tbl_giaovien set c_tengiaovien='$c_tengiaovien', fk_mabomon_id=$fk_mabomon_id,c_hocvi='$c_hocvi',c_hocham='$c_hocham' ,c_ngaysinh='$c_ngaysinh', c_diachi='$c_diachi', c_sdt=$c_sdt, c_email='$c_email' where pk_magiaovien_id=$id");
					//di chuyen den trang 
					header("location:admin.php?controller=giaovien");
				break;
				//----
				case "add":
					$form_action = "admin.php?controller=add_edit_giaovien&act=do_add";
					//load view
					include "view/backend/view_add_edit_giaovien.php";
				break;
				//----
				case "do_add":
					$c_tengiaovien = $_POST["c_tengiaovien"];
					$fk_mabomon_id = $_POST["fk_mabomon_id"];
					$c_hocvi = $_POST["c_hocvi"];
					$c_hocham = $_POST["c_hocham"];
					$c_ngaysinh = $_POST["c_ngaysinh"];
					$c_diachi = $_POST["c_diachi"];
					$c_sdt = $_POST["c_sdt"];
					$c_email = $_POST["c_email"];
					
					$this->model->execute("insert into tbl_giaovien set c_tengiaovien='$c_tengiaovien', fk_mabomon_id=$fk_mabomon_id,c_hocvi='$c_hocvi',c_hocham='$c_hocham',c_ngaysinh='$c_ngaysinh', c_diachi='$c_diachi', c_sdt=$c_sdt, c_email='$c_email'");
					//di chuyen den trang 
					header("location:admin.php?controller=giaovien");
				break;
				//----
				case "delete":
					
					//--------
					$this->model->execute("delete from tbl_giaovien where pk_magiaovien_id=$id");
					//di chuyen den trang 
					header("location:admin.php?controller=giaovien");
				break;
				//----
				default:
					//di chuyen den trang 
					header("location:admin.php?controller=giaovien");
				break;
				//----
			}
		}
	}
	new controller_add_edit_giaovien();
 ?>