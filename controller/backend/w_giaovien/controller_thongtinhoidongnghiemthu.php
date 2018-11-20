<?php 
	class controller_thongtinhoidongnghiemthu{
		public $model;
		public function __construct(){
			$this->model = new model();
			if(isset($_GET['IdHoiDong'])){
				$_SESSION["ID_HOIDONG"] = $_GET['IdHoiDong'];
			}
			if(isset($_GET['IdDeTai'])){
				$_SESSION["ID_DETAI"] = $_GET['IdDeTai'];
			}
			if(isset($_GET['TenHoiDong'])){
				$_SESSION["TEN_HOIDONG"] = $_GET['TenHoiDong'];
			}
			$fk_hoidong_id = $_SESSION["ID_HOIDONG"];
			//---------
			//phan trang
			//quy dinh so ban ghi hien thi tren mot trang
			$record_per_page = 5;
			//tinh tong so ban ghi
			$total = $this->model->num_rows("select pk_hoidong_id from tbl_hoidong_detai where fk_hoidongnghiemthu_id = $fk_hoidong_id");
			//tinh so trang
			$num_page = ceil($total/$record_per_page);
			//lay bien p truyen tu url, bien nay se chi trang hien tai
			$p = (isset($_GET["p"])&&$_GET["p"]>0) ? ($_GET["p"]-1) : 0;
			//lay tu ban ghi nao trong chuoi sql
			$from = $p * $record_per_page;			
			//---------
			//lay toan bo ban ghi co phan trang
			$arr = $this->model->get_all("select * from tbl_hoidong_detai where fk_hoidongnghiemthu_id = $fk_hoidong_id order by fk_hoidongnghiemthu_id desc limit $from,$record_per_page");
			//load view
			include "view/backend/w_giaovien/view_thongtinhoidongnghiemthu.php";
		}
	}
	new controller_thongtinhoidongnghiemthu();
 ?>