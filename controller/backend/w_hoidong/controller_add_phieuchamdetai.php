<?php 
	class controller_add_phieuchamdetai{
		public $model;
		public function __construct(){
			//------
			$this->model = new model();
			//------
			
			//-------
			$act = isset($_GET["act"]) ? $_GET["act"] : "";
			$id = isset($_GET["id"])&&is_numeric($_GET["id"]) ? $_GET["id"] : 0;

			switch($act){
				case "add":
					$form_action = "hoidong.php?controller=add_phieuchamdetai&act=do_add";
					//load view
					include "view/backend/w_hoidong/view_add_phieuchamdetai.php";
				break;
				//----
				case "do_add":
					//echo '<script>$(function(){console.log('.$_POST['objReturn'].');alert("ok");});</script>';
					$fk_madetai_id = $_POST["fk_madetai_id"];
					$diem_chu_tich = $_POST["diem_chu_tich"];
					$diem_phan_bien_1 = $_POST["diem_phan_bien_1"];
					$diem_phan_bien_2 = $_POST["diem_phan_bien_2"];
					$ngay_hop = $_POST["ngay_hop"];
					$dia_diem = $_POST["dia_diem"];
					$y_kien = $_POST["y_kien"];
					$ghi_chu = $_POST["ghi_chu"];
					$xep_loai = $_POST["xep_loai"];

					$this->model->execute("insert into tbl_detai_phieucham set fk_madetai_id=$fk_madetai_id,diem_chu_tich=$diem_chu_tich, diem_phan_bien_1=$diem_phan_bien_1, diem_phan_bien_2=$diem_phan_bien_2, y_kien='$y_kien', ghi_chu='$ghi_chu', xep_loai=$xep_loai, ngay_hop='$ngay_hop', dia_diem='$dia_diem'");
					//di chuyen den trang 
					header("location:hoidong.php?controller=phieuchamdetai");
				break;
				//----
				
				//----
				default:
					//di chuyen den trang 
					header("location:hoidong.php?controller=phieuchamdetai");
				break;
				//----
			}
		}
	}
	new controller_add_phieuchamdetai();
 ?>