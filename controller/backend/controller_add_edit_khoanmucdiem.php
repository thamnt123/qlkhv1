<?php 
	class controller_add_edit_khoanmucdiem{
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
					$record = $this->model->get_a_record("select * from tbl_phieucham where pk_khoanmucdiem_id=$id");
					$form_action = "admin.php?controller=add_edit_khoanmucdiem&act=do_edit&id=$id";
					//load view
					include "view/backend/view_add_edit_khoanmucdiem.php";
				break;
				case "do_edit":
					$c_tenkhoanmuc = $_POST["c_tenkhoanmuc"];
					$c_diemtoida = $_POST["c_diemtoida"];
					
					
				
				
					//-----
					//update ban ghi
					$this->model->execute("update tbl_phieucham set c_tenkhoanmuc='$c_tenkhoanmuc', c_diemtoida=$c_diemtoida where pk_khoanmucdiem_id=$id");
					//di chuyen den trang 
					header("location:admin.php?controller=khoanmucdiem");
				break;
				//----
				case "add":
					$form_action = "admin.php?controller=add_edit_khoanmucdiem&act=do_add";
					//load view
					include "view/backend/view_add_edit_khoanmucdiem.php";
				break;
				//----
				case "do_add":
					$c_tenkhoanmuc = $_POST["c_tenkhoanmuc"];
					$c_diemtoida = $_POST["c_diemtoida"];
					
					$this->model->execute("insert into tbl_phieucham set c_tenkhoanmuc='$c_tenkhoanmuc', c_diemtoida=$c_diemtoida");
					//di chuyen den trang 
					header("location:admin.php?controller=khoanmucdiem");
				break;
				//----
				case "delete":
					
					//--------
					$this->model->execute("delete from tbl_phieucham where pk_khoanmucdiem_id=$id");
					//di chuyen den trang news
					header("location:admin.php?controller=khoanmucdiem");
				break;
				//----
				default:
					//di chuyen den trang news
					header("location:admin.php?controller=khoanmucdiem");
				break;
				//----
			}
		}
	}
	new controller_add_edit_khoanmucdiem();
 ?>