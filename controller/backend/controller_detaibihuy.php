<?php 
	class controller_detaibihuy{
		public $model;
		public function __construct(){
			$this->model = new model();

			$id=isset($_GET['id'])?$_GET['id']:0;
			
			$classB =0;
			
			if(isset($_GET["classB"])){
				$classB = $_GET["classB"];
			}
			if(isset($_POST['Process'])){
				
				$classB =  $_POST['bomon'];
			}
			$form_action = "admin.php?controller=detaibihuy&act=xem&id=$id";
			//---------
			//phan trang
			//quy dinh so ban ghi hien thi tren mot trang
			$record_per_page = 8;
			//tinh tong so ban ghi
			$total = $this->model->num_rows("select dt.pk_madetai_id from tbl_user u join tbl_detai dt on u.pk_user_id = dt.fk_user_id where dt.c_trangthai in (4) ".($classB!=0 ? " and u.fk_mabomon_id in($classB) " : ""));
			//tinh so trang
			$num_page = ceil($total/$record_per_page);
			//lay bien p truyen tu url, bien nay se chi trang hien tai
			$p = (isset($_GET["p"])&&$_GET["p"]>0) ? ($_GET["p"]-1) : 0;
			//lay tu ban ghi nao trong chuoi sql
			$from = $p * $record_per_page;			
			//---------
			//lay toan bo ban ghi co phan trang
			$arr = $this->model->get_all("select * from tbl_user u join tbl_detai dt on u.pk_user_id = dt.fk_user_id where dt.c_trangthai in (4) ".($classB!=0 ? " and u.fk_mabomon_id in($classB) " : "")." order by pk_madetai_id desc limit $from,$record_per_page");
			//load view
			include "view/backend/view_detaibihuy.php";
		}
	}
	new controller_detaibihuy();
 ?>