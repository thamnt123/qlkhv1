<?php 
	class controller_chitiet_detaidangthuchien{
		public $model;
		public function __construct(){
			//------
			$this->model = new model();
			//------
			$act = isset($_GET["act"]) ? $_GET["act"] : "";
			$id = isset($_GET["id"])&&is_numeric($_GET["id"]) ? $_GET["id"] : 0;
			$classB = isset($_GET["classB"])&&is_numeric($_GET["classB"]) ? $_GET["classB"] : 0;
			switch($act){
				//----
				case "xem":
					//lay 1 ban ghi truong ung voi id truyen vao
					$record = $this->model->get_a_record("select * from tbl_detai where pk_madetai_id=$id");
					$form_action = "admin.php?controller=chitiet_detaidangthuchien&act=xem&id=$id";
					//load view
					include "view/backend/view_chitiet_detaidangthuchien.php";
				break;
				default:
					//di chuyen den trang 
					header("location:admin.php?controller=detaidangthuchien");
				break;
				//----
			}
		}
	}
	new controller_chitiet_detaidangthuchien();
 ?>