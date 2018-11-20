<?php 
	class controller_detaithamkhao{
		public $model;
		public function __construct(){
			$this->model = new model();
			//---------
			//phan trang
			//quy dinh so ban ghi hien thi tren mot trang
			$record_per_page = 15;
			$pk_user_id = $_SESSION["SS_USER"]->pk_user_id;
			$pk_mabomon_id = $_SESSION["SS_USER"]->fk_mabomon_id;
			//tinh tong so ban ghi
			$total = $this->model->num_rows("select dt.pk_madetai_id from tbl_user u join tbl_detai dt on u.pk_user_id = dt.fk_user_id where u.fk_mabomon_id='$pk_mabomon_id' and dt.c_trangthai = 3");
			//tinh so trang
			$num_page = ceil($total/$record_per_page);
			//lay bien p truyen tu url, bien nay se chi trang hien tai
			$p = (isset($_GET["p"])&&$_GET["p"]>0) ? ($_GET["p"]-1) : 0;
			//lay tu ban ghi nao trong chuoi sql
			$from = $p * $record_per_page;			
			//---------
			//lay toan bo ban ghi co phan trang
			$arr = $this->model->get_all("select * from tbl_user u join tbl_detai dt on u.pk_user_id = dt.fk_user_id where u.fk_mabomon_id=$pk_mabomon_id and dt.c_trangthai = 3 order by pk_madetai_id desc limit $from,$record_per_page");
			//load view
			include "view/backend/w_giaovien/view_detaithamkhao.php";
		}
	}
	new controller_detaithamkhao();
 ?>