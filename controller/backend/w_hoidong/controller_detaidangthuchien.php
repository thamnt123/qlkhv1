<?php 
	class controller_detaidangthuchien{
		public $model;
		public function __construct(){
			$this->model = new model();
			$act = isset($_GET["act"]) ? $_GET["act"] : "";
			$id = isset($_GET["id"])&&is_numeric($_GET["id"]) ? $_GET["id"] : 0;
			switch($act){
				case "hoanthanh":
					//lay 1 ban ghi truong ung voi id truyen vao
					$rs = $this->model->execute("UPDATE `tbl_detai` SET c_trangthai = 3 WHERE pk_madetai_id = ".$_GET["id"]);
					//load view
					include "view/backend/w_hoidong/view_detaidangthuchien.php";
					header("location:hoidong.php?controller=detaidangthuchien");
				break;
				case "huy":
					//lay 1 ban ghi truong ung voi id truyen vao
					$rs = $this->model->execute("UPDATE `tbl_detai` SET c_trangthai = 4 WHERE pk_madetai_id = ".$_GET["id"]);
					//load view
					include "view/backend/w_hoidong/view_detaidangthuchien.php";
					header("location:hoidong.php?controller=detaidangthuchien");
				break;
				default:
			//---------
			//phan trang
			//quy dinh so ban ghi hien thi tren mot trang
			$record_per_page = 5;
			//tinh tong so ban ghi
			$total = $this->model->num_rows("select dt.pk_madetai_id from tbl_user u join tbl_detai dt on u.pk_user_id = dt.fk_user_id where  dt.c_trangthai in (2)");
			//tinh so trang
			$num_page = ceil($total/$record_per_page);
			//lay bien p truyen tu url, bien nay se chi trang hien tai
			$p = (isset($_GET["p"])&&$_GET["p"]>0) ? ($_GET["p"]-1) : 0;
			//lay tu ban ghi nao trong chuoi sql
			$from = $p * $record_per_page;			
			//---------
			//lay toan bo ban ghi co phan trang
			$arr = $this->model->get_all("select * from tbl_user u join tbl_detai dt on u.pk_user_id = dt.fk_user_id where dt.c_trangthai in (2) order by pk_madetai_id desc limit $from,$record_per_page");
			//load view
			include "view/backend/w_hoidong/view_detaidangthuchien.php";
			break;
		}
	}
	}
	new controller_detaidangthuchien();
 ?>