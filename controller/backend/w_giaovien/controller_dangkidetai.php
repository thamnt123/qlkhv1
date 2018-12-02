<?php 
	class controller_dangkidetai{
		public $model;
		public function __construct(){
			$this->model = new model();
			//---------
			//phan trang
			//quy dinh so ban ghi hien thi tren mot trang
			$record_per_page = 7;
			$pk_user_id = $_SESSION["SS_USER"]->pk_user_id;
			//tinh tong so ban ghi
			$total = $this->model->num_rows("select * from tbl_detai dt join tbl_user u on dt.fk_user_id = u.pk_user_id join tbl_bomon bm on bm.pk_mabomon_id = u.fk_mabomon_id where dt.c_trangthai < 3 and (dt.	fk_user_id=$pk_user_id OR dt.pk_madetai_id in(select fk_madetai_id from tbl_detai_user du where du.fk_user_id=$pk_user_id))");
			//tinh so trang
			$num_page = ceil($total/$record_per_page);
			//lay bien p truyen tu url, bien nay se chi trang hien tai
			$p = (isset($_GET["p"])&&$_GET["p"]>0) ? ($_GET["p"]-1) : 0;
			//lay tu ban ghi nao trong chuoi sql
			$from = $p * $record_per_page;			
			//---------
			//lay toan bo ban ghi co phan trang
			$arr = $this->model->get_all("select * from tbl_detai dt join tbl_user u on dt.fk_user_id = u.pk_user_id join tbl_bomon bm on bm.pk_mabomon_id = u.fk_mabomon_id where dt.c_trangthai < 3 and (dt.fk_user_id=$pk_user_id OR dt.pk_madetai_id in (select fk_madetai_id from tbl_detai_user du where du.fk_user_id=$pk_user_id)) order by dt.pk_madetai_id desc limit $from,$record_per_page");
			//load view
			include "view/backend/w_giaovien/view_dangkidetai.php";
		}
	}
	new controller_dangkidetai();
 ?>