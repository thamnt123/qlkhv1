<?php 
	class controller_chitiet_phieuchamdetai{
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
					$form_action = "hoidong.php?controller=chitiet_phieuchamdetai&act=xem&id=$id";
					//load view
					include "view/backend/w_hoidong/view_chitiet_phieuchamdetai.php";
				break;
				default:
					//di chuyen den trang 
					header("location:hoidong.php?controller=phieuchamdetai");
				break;
				//----
			}
		}
	}
	new controller_chitiet_phieuchamdetai();
 ?>