<?php 
	class controller_hoidongnghiemthu{
		public $model;
		public function __construct(){
			$this->model = new model();
			//---------
			$fk_user_id = $_SESSION['SS_USER']->pk_user_id;
			//phan trang
			//quy dinh so ban ghi hien thi tren mot trang
			$record_per_page = 5;
			//tinh tong so ban ghi
			$total = $this->model->num_rows("select pk_hoidongnghiemthu_id from tbl_hoidongnghiemthu hd join tbl_detai dt on hd.fk_madetai_id = dt.pk_madetai_id where dt.c_trangthai < 3 and hd.pk_hoidongnghiemthu_id in(SELECT distinct fk_hoidongnghiemthu_id FROM tbl_hoidong_detai WHERE fk_hoidongnghiemthu_id > 0 and fk_user_id = $fk_user_id)");
			//tinh so trang
			$num_page = ceil($total/$record_per_page);
			//lay bien p truyen tu url, bien nay se chi trang hien tai
			$p = (isset($_GET["p"])&&$_GET["p"]>0) ? ($_GET["p"]-1) : 0;
			//lay tu ban ghi nao trong chuoi sql
			$from = $p * $record_per_page;
			//---------
			//lay toan bo ban ghi co phan trang
			$arr = $this->model->get_all("select * from tbl_hoidongnghiemthu hd join tbl_detai dt on hd.fk_madetai_id = dt.pk_madetai_id where dt.c_trangthai < 3 and hd.pk_hoidongnghiemthu_id in (SELECT distinct fk_hoidongnghiemthu_id FROM tbl_hoidong_detai WHERE fk_hoidongnghiemthu_id > 0 and fk_user_id = $fk_user_id) order by hd.pk_hoidongnghiemthu_id desc limit $from,$record_per_page");
			//load view
			include "view/backend/w_hoidong/view_hoidongnghiemthu.php";
		}
	}
	new controller_hoidongnghiemthu();
 ?>