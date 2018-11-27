<?php 
	class controller_detaiquahan{
		public $model;
		public function __construct(){
			$this->model = new model();
			//---------
			//phan trang
			//quy dinh so ban ghi hien thi tren mot trang
			$id=isset($_GET['id'])?$_GET['id']:0;
			$id = isset($_GET["id"])&&is_numeric($_GET["id"]) ? $_GET["id"] : 0;
			$record_per_page = 10;
			$year = date("Y");
			
			if(isset($_GET["year"])){
				$year = $_GET["year"];
			}
			
			if(isset($_POST['Process'])){
				$year = $_POST['nam'];
				
			}
			$form_action = "admin.php?controller=detaiquahan&act=xem&id=$id";
			//tinh tong so ban ghi
			$total = $this->model->num_rows("select * from tbl_detai dt join tbl_user u on dt.fk_user_id = u.pk_user_id join tbl_bomon bm on u.fk_mabomon_id = bm.pk_mabomon_id join tbl_detai_phieucham dtpc on dtpc.fk_madetai_id = dt.pk_madetai_id where dt.c_trangthai in (3) and dtpc.detaidunghan_quahan = 0 ".($year!=0?" and year(dt.c_denngay) in($year) ":""));
			//tinh so trang
			$num_page = ceil($total/$record_per_page);
			//lay bien p truyen tu url, bien nay se chi trang hien tai
			$p = (isset($_GET["p"])&&$_GET["p"]>0) ? ($_GET["p"]-1) : 0;
			//lay tu ban ghi nao trong chuoi sql
			$from = $p * $record_per_page;
			$record = $this->model->get_a_record("select * from tbl_detai where pk_madetai_id=$id");			
			//---------
			//lay toan bo ban ghi co phan trang
			$arr = $this->model->get_all("select * from tbl_detai dt join tbl_user u on dt.fk_user_id = u.pk_user_id join tbl_bomon bm on u.fk_mabomon_id = bm.pk_mabomon_id join tbl_detai_phieucham dtpc on dtpc.fk_madetai_id = dt.pk_madetai_id where dt.c_trangthai in (3) and dtpc.detaidunghan_quahan = 0 ".($year!=0?" and year(dt.c_denngay) in($year) ":"")." order by pk_madetai_id desc limit $from,$record_per_page");
			//load view
			include "view/backend/view_detaiquahan.php";
		}
	}
	new controller_detaiquahan();
 ?>