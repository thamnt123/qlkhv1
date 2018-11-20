<?php 
	class controller_add_edit_khoanmucdiemcon{
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
					$form_action = "hoidong.php?controller=add_edit_khoanmucdiemcon&act=do_edit&id=$id";
					//load view
					include "view/backend/w_hoidong/view_add_edit_khoanmucdiemcon.php";
				break;
				case "do_edit":
					$c_tenkhoanmuc = $_POST["c_tenkhoanmuc"];
					$c_diemtoida = $_POST["c_diemtoida"];
					$c_diemdanhgia = $_POST["c_diemdanhgia"];
					
				
				
					//-----
					//update ban ghi
					$this->model->execute("update tbl_phieucham set c_tenkhoanmuc='$c_tenkhoanmuc', c_diemtoida=$c_diemtoida, c_diemdanhgia=$c_diemdanhgia where pk_khoanmucdiem_id=$id");
					//di chuyen den trang 
					header("location:hoidong.php?controller=khoanmucdiemcon");
				break;
				//----
				case "add":
					$form_action = "hoidong.php?controller=add_edit_khoanmucdiemcon&act=do_add";
					//load view
					include "view/backend/w_hoidong/view_add_edit_khoanmucdiemcon.php";
				break;
				//----
				case "do_add":
					$c_tenkhoanmuc = $_POST["c_tenkhoanmuc"];
					$c_diemtoida = $_POST["c_diemtoida"];
					$c_diemdanhgia = $_POST["c_diemdanhgia"];
					$this->model->execute("insert into tbl_phieucham set c_tenkhoanmuc='$c_tenkhoanmuc', c_diemtoida=$c_diemtoida, c_diemdanhgia=$c_diemdanhgia");
					//di chuyen den trang 
					header("location:hoidong.php?controller=khoanmucdiemcon");
				break;
				//----
				case "delete":
					
					//--------
					$this->model->execute("delete from tbl_phieucham where pk_khoanmucdiem_id=$id");
					//di chuyen den trang news
					header("location:hoidong.php?controller=khoanmucdiemcon");
				break;
				//----
				default:
					//di chuyen den trang news
					header("location:hoidong.php?controller=khoanmucdiemcon");
				break;
				//----
			}
		}
	}
	new controller_add_edit_khoanmucdiemcon();
 ?>