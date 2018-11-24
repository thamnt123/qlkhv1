<?php 
	class controller_detaichoxetduyet{
		public $model;
		public function __construct(){
			$this->model = new model();
			$pk_user_id = $_SESSION["SS_USER"]->pk_user_id;
			$act = isset($_GET["act"]) ? $_GET["act"] : "";
			$id = isset($_GET["id"])&&is_numeric($_GET["id"]) ? $_GET["id"] : 0;
			switch($act){
				case "duyet":
					//lay 1 ban ghi truong ung voi id truyen vao
					$rs = $this->model->execute("UPDATE `tbl_detai` SET c_trangthai = c_trangthai+1 WHERE pk_madetai_id = ".$_GET["id"]);
					//load view
					include "view/backend/w_truongbomon/view_detaichoxetduyet.php";
					header("location:truongbomon.php?controller=detaichoxetduyet");
				break;
				case "huy":
					//lay 1 ban ghi truong ung voi id truyen vao
					$rs = $this->model->execute("UPDATE `tbl_detai` SET c_trangthai = 4 WHERE pk_madetai_id = ".$_GET["id"]);
					//load view
					include "view/backend/w_truongbomon/view_detaichoxetduyet.php";
					header("location:truongbomon.php?controller=detaichoxetduyet");
				break;
				default:
			
					//phan trang
					//quy dinh so ban ghi hien thi tren mot trang
					$record_per_page = 5;
					//tinh tong so ban ghi
					$total = $this->model->num_rows("SELECT dt.pk_madetai_id FROM tbl_user u join tbl_detai dt on u.pk_user_id = dt.fk_user_id join tbl_bomon bm on bm.pk_mabomon_id = u.fk_mabomon_id WHERE bm.fk_user_id = '$pk_user_id' and dt.c_trangthai in (0) ");
					//tinh so trang
					$num_page = ceil($total/$record_per_page);
					//lay bien p truyen tu url, bien nay se chi trang hien tai
					$p = (isset($_GET["p"])&&$_GET["p"]>0) ? ($_GET["p"]-1) : 0;
					//lay tu ban ghi nao trong chuoi sql
					$from = $p * $record_per_page;			
					//---------
					//lay toan bo ban ghi co phan trang
					$arr = $this->model->get_all("SELECT * FROM tbl_user u join tbl_detai dt on u.pk_user_id = dt.fk_user_id join tbl_bomon bm on bm.pk_mabomon_id = u.fk_mabomon_id WHERE bm.fk_user_id = '$pk_user_id' and dt.c_trangthai in (0) order by pk_madetai_id desc limit $from,$record_per_page");
					//load view
					include "view/backend/w_truongbomon/view_detaichoxetduyet.php";
				break;
			}
			
			
		}	
	}
	new controller_detaichoxetduyet();
 ?>