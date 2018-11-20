<?php 
	class controller_slide{
		public $model;
		public function __construct(){
			$this->model = new model();
			//---------
			//phan trang
			//quy dinh so ban ghi hien thi tren mot trang
			$record_per_page = 15;
			//tinh tong so ban ghi
			$total = $this->model->num_rows("select pk_slide_id from tbl_slide");
			//tinh so trang
			$num_page = ceil($total/$record_per_page);
			//lay bien p truyen tu url, bien nay se chi trang hien tai
			$p = (isset($_GET["p"])&&$_GET["p"]>0) ? ($_GET["p"]-1) : 0;
			//lay tu ban ghi nao trong chuoi sql
			$from = $p * $record_per_page;			
			//---------
			//lay toan bo ban ghi co phan trang
			$arr = $this->model->get_all("select * from tbl_slide order by pk_slide_id desc limit $from,$record_per_page");
			//load view
			include "view/backend/view_slide.php";
		}
	}
	new controller_slide();
 ?>