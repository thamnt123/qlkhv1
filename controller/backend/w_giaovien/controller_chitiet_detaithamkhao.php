<?php 
	class controller_chitiet_detaithamkhao{
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
					$form_action = "giaovien.php?controller=chitiet_detaithamkhao&act=xem&id=$id";
					//load view
					include "view/backend/w_giaovien/view_chitiet_detaithamkhao.php";
				break;
				default:
					//di chuyen den trang 
					header("location:giaovien.php?controller=detaithamkhao");
				break;
				//----
			}
		}
	}
	new controller_chitiet_detaithamkhao();
 ?>