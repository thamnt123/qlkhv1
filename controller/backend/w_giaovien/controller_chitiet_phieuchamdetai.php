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
					$record = $this->model->get_a_record("SELECT * FROM tbl_detai_phieucham dtpc JOIN tbl_detai dt ON dtpc.fk_madetai_id = dt.pk_madetai_id JOIN tbl_user u ON u.pk_user_id = dt.fk_user_id JOIN tbl_bomon bm ON bm.pk_mabomon_id = u.fk_mabomon_id WHERE fk_madetai_id = $id");
					$form_action = "giaovien.php?controller=chitiet_phieuchamdetai&act=xem&id=$id";
					//load view
					include "view/backend/w_giaovien/view_chitiet_phieuchamdetai.php";
				break;
				default:
					//di chuyen den trang 
					header("location:giaovien.php?controller=phieuchamdetai");
				break;
				//----
			}
		}
	}
	new controller_chitiet_phieuchamdetai();
 ?>