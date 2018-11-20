<?php
	include_once "public/backend/Classes/Common.php"; 
	class controller_dangkidetai{
		public $model;
		public function __construct(){

			//------
			$this->model = new model();
			//------
			$act = isset($_GET["act"]) ? $_GET["act"] : "";
			$id = isset($_GET["id"])&&is_numeric($_GET["id"]) ? $_GET["id"] : 0;
			switch($act){
				case "add":
					$form_action = "giaovien.php?controller=add_dangkidetai&act=do_add";
					//load view
					include "view/backend/w_giaovien/view_add_dangkidetai.php";
				break;
				//----
				case "do_add":
					$c_tendetai = $_POST["c_tendetai"];
					$c_noidungnghiencuu = $_POST["c_noidungnghiencuu"];
					$c_kinhphi = $_POST["c_kinhphi"];
					$c_tungay = $_POST["c_tungay"];
					$c_denngay = $_POST["c_denngay"];
					$pk_user_id = $_SESSION["SS_USER"]->pk_user_id;
					
					//$file_mo_ta = $_POST["file_mo_ta"];
					
					$file_mo_ta = Upload("file_mo_ta","src/image/")->Data;
					print_r($file_mo_ta);
					$this->model->execute("insert into tbl_detai set fk_user_id='$pk_user_id', c_tendetai='$c_tendetai', c_noidungnghiencuu='$c_noidungnghiencuu', c_kinhphi=$c_kinhphi, c_tungay='$c_tungay', c_denngay='$c_denngay',  file_mo_ta='$file_mo_ta', c_trangthai=0");
					 $id_detai_new = $this->model->get_a_record("select * from tbl_detai ORDER BY pk_madetai_id DESC LIMIT 1");
					foreach ($_POST['thanh_vien'] as $selectedOption)
						$this->model->execute("INSERT INTO `tbl_detai_user` (`fk_madetai_id`, `fk_user_id`) VALUES ('$id_detai_new->pk_madetai_id', '$selectedOption')");
					//di chuyen den trang 
					header("location:giaovien.php?controller=dangkidetai");
				break;
				default:
					//di chuyen den trang news
					header("location:giaovien.php?controller=dangkidetai");
				break;
				//----
			}
		}
	}
	new controller_dangkidetai();
 ?>