<?php 
	class controller_chitiet_detaidathuchien{
		public $model;
		public function __construct(){
			//------
			$this->model = new model();
			//------
			$act = isset($_GET["act"]) ? $_GET["act"] : "";
			$id = isset($_GET["id"])&&is_numeric($_GET["id"]) ? $_GET["id"] : 0;
			switch($act){
				//----
				case "xem":
					//lay 1 ban ghi truong ung voi id truyen vao
					$record = $this->model->get_a_record("select * from tbl_detai where pk_madetai_id=$id");
					$form_action = "giaovien.php?controller=chitiet_detaidathuchien&act=xem&id=$id";
					//load view
					include "view/backend/w_giaovien/view_chitiet_detaidathuchien.php";
				break;
				default:
					//di chuyen den trang 
					header("location:giaovien.php?controller=detaidathuchien");
				break;
				//----
			}
		}
	}
	new controller_chitiet_detaidathuchien();
 ?>