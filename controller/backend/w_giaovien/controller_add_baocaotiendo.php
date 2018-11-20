<?php
	include_once "public/backend/Classes/Common.php"; 
	class controller_baocaotiendo{
		public $model;
		public function __construct(){

			//------
			$this->model = new model();
			//------
			$act = isset($_GET["act"]) ? $_GET["act"] : "";
			$id = isset($_GET["id"])&&is_numeric($_GET["id"]) ? $_GET["id"] : 0;
			switch($act){
				case "add":
					$form_action = "giaovien.php?controller=add_baocaotiendo&act=do_add";
					//load view
					include "view/backend/w_giaovien/view_add_baocaotiendo.php";
				break;
				//----
				case "do_add":
					$fk_madetai_id = $_POST["fk_madetai_id"];
					//$fk_mabomon_id = $_POST["fk_mabomon_id"];
					$c_tungay = $_POST["c_tungay"];
					$c_denngay = $_POST["c_denngay"];
					$c_noidungtiendo = $_POST["c_noidungtiendo"];
					$c_hoanthanhtiendo = $_POST["c_hoanthanhtiendo"];
					$c_ghichu = $_POST["c_ghichu"];

					$this->model->execute("insert into tbl_tiendo set fk_madetai_id='$fk_madetai_id', c_tungay='$c_tungay',c_denngay='$c_denngay',c_noidungtiendo='$c_noidungtiendo', c_hoanthanhtiendo='$c_hoanthanhtiendo', c_ghichu='$c_ghichu'");
					//di chuyen den trang 
					header("location:giaovien.php?controller=baocaotiendo");
				break;
				default:
					//di chuyen den trang news
					header("location:giaovien.php?controller=baocaotiendo");
				break;
				//----
			}
		}
	}
	new controller_baocaotiendo();
 ?>