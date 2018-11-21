<?php 
	class controller_chitiet_detaiquahan{
		public $model;
		public function __construct(){
			//------
			$this->model = new model();
			//------
			$act = isset($_GET["act"]) ? $_GET["act"] : "";
			$id = isset($_GET["id"])&&is_numeric($_GET["id"]) ? $_GET["id"] : 0;
			$year = isset($_GET["year"])&&is_numeric($_GET["year"]) ? $_GET["year"] : 0;
			
			switch($act){
				//----
				case "xem":
					//lay 1 ban ghi truong ung voi id truyen vao
					$record = $this->model->get_a_record("select * from tbl_detai where pk_madetai_id=$id");
					$form_action = "admin.php?controller=chitiet_detaiquahan&act=xem&id=$id";
					//load view
					include "view/backend/view_chitiet_detaiquahan.php";
				break;
				default:
					//di chuyen den trang 
					header("location:admin.php?controller=detaiquahan");
				break;
				//----
			}
		}
	}
	new controller_chitiet_detaiquahan();
 ?>