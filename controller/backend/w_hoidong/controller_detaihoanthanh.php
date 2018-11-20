<?php 
	class controller_detaihoanthanh{
		public $model;
		public function __construct(){
			$this->model = new model();
			//---------
			//phan trang
			//quy dinh so ban ghi hien thi tren mot trang
			$record_per_page = 5;
			//tinh tong so ban ghi
			$total = $this->model->num_rows("select * from tbl_detai dt join tbl_user u on dt.fk_user_id = u.pk_user_id join tbl_bomon bm on bm.pk_mabomon_id = u.fk_mabomon_id where c_trangthai in (3)");
			//tinh so trang
			$num_page = ceil($total/$record_per_page);
			//lay bien p truyen tu url, bien nay se chi trang hien tai
			$p = (isset($_GET["p"])&&$_GET["p"]>0) ? ($_GET["p"]-1) : 0;
			//lay tu ban ghi nao trong chuoi sql
			$from = $p * $record_per_page;			
			//---------
			//lay toan bo ban ghi co phan trang
			$arr = $this->model->get_all("select * from tbl_detai dt join tbl_user u on dt.fk_user_id = u.pk_user_id join tbl_bomon bm on bm.pk_mabomon_id = u.fk_mabomon_id where c_trangthai in (3) order by pk_madetai_id desc limit $from,$record_per_page");
			//load view
			include "view/backend/w_hoidong/view_detaihoanthanh.php";
		}
	}
	new controller_detaihoanthanh();
 ?>