<?php 
	class controller_phieuchamdetai{
		public $model;
		public function __construct(){
			$this->model = new model();
			//---------
			//phan trang
			//quy dinh so ban ghi hien thi tren mot trang
			$record_per_page = 5;
			//tinh tong so ban ghi
			$total = $this->model->num_rows("SELECT * from tbl_detai_phieucham dtpc JOIN tbl_detai dt ON dt.pk_madetai_id = dtpc.fk_madetai_id JOIN tbl_user u ON u.pk_user_id = dt.fk_user_id JOIN tbl_bomon bm ON bm.pk_mabomon_id = u.fk_mabomon_id");
			//tinh so trang
			$num_page = ceil($total/$record_per_page);
			//lay bien p truyen tu url, bien nay se chi trang hien tai
			$p = (isset($_GET["p"])&&$_GET["p"]>0) ? ($_GET["p"]-1) : 0;
			//lay tu ban ghi nao trong chuoi sql
			$from = $p * $record_per_page;			
			//---------
			//lay toan bo ban ghi co phan trang
			$arr = $this->model->get_all("SELECT * from tbl_detai_phieucham dtpc JOIN tbl_detai dt ON dt.pk_madetai_id = dtpc.fk_madetai_id JOIN tbl_user u ON u.pk_user_id = dt.fk_user_id JOIN tbl_bomon bm ON bm.pk_mabomon_id = u.fk_mabomon_id order by dt.pk_madetai_id desc limit $from,$record_per_page");
			//load view
			include "view/backend/w_hoidong/view_phieuchamdetai.php";
		}
	}
	new controller_phieuchamdetai();
 ?>