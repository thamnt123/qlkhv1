<?php 
	class controller_hoidongnghiemthu{
		public $model;
		public function __construct(){
			$this->model = new model();
			//---------
			//phan trang
			//quy dinh so ban ghi hien thi tren mot trang
			$id=isset($_GET['id'])?$_GET['id']:0;
			$id = isset($_GET["id"])&&is_numeric($_GET["id"]) ? $_GET["id"] : 0;
			$record_per_page = 5;
			$year = date("Y");
			$classB =0;
			if(isset($_GET["year"])){
				$year = $_GET["year"];
			}
			if(isset($_GET["classB"])){
				$classB = $_GET["classB"];
			}
			if(isset($_POST['Process'])){
				$year = $_POST['nam'];
				$classB =  $_POST['bomon'];
			}
			$form_action = "admin.php?controller=hoidongnghiemthu&act=xem&id=$id";
			//tinh tong so ban ghi
			$total = $this->model->num_rows("select hd.pk_hoidongnghiemthu_id from tbl_hoidongnghiemthu hd join tbl_detai dt on dt.pk_madetai_id=hd.fk_madetai_id join tbl_user u on u.pk_user_id = dt.fk_user_id where 1=1 ".($year!=0?" and year(hd.c_ngaybaove) = $year ":"").($classB!=0 ? " and u.fk_mabomon_id = $classB " : ""));
			//tinh so trang
			$num_page = ceil($total/$record_per_page);
			//lay bien p truyen tu url, bien nay se chi trang hien tai
			$p = (isset($_GET["p"])&&$_GET["p"]>0) ? ($_GET["p"]-1) : 0;
			//lay tu ban ghi nao trong chuoi sql
			$from = $p * $record_per_page;			
			//---------
			//lay toan bo ban ghi co phan trang
			$arr = $this->model->get_all("select * from tbl_hoidongnghiemthu hd join tbl_detai dt on dt.pk_madetai_id=hd.fk_madetai_id join tbl_user u on u.pk_user_id = dt.fk_user_id where 1=1 ".($year!=0?" and year(hd.c_ngaybaove) in($year) ":"").($classB!=0 ? " and u.fk_mabomon_id in($classB) " : "")." order by pk_hoidongnghiemthu_id desc limit $from,$record_per_page");
			//load view
			include "view/backend/view_hoidongnghiemthu.php";
		}
	}
	new controller_hoidongnghiemthu();
 ?>