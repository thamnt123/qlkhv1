<?php 
	class controller_phieuchamdetai{
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
			$form_action = "giaovien.php?controller=phieuchamdetai&act=xem&id=$id";
			//tinh tong so ban ghi
			$pk_user_id = $_SESSION['SS_USER']->pk_user_id;
			$total = $this->model->num_rows("SELECT * from tbl_detai_phieucham dtpc JOIN tbl_detai dt ON dt.pk_madetai_id = dtpc.fk_madetai_id JOIN tbl_user u ON u.pk_user_id = dt.fk_user_id JOIN tbl_bomon bm ON bm.pk_mabomon_id = u.fk_mabomon_id where (dt.fk_user_id =$pk_user_id or EXISTS (SELECT * from tbl_detai_user where fk_madetai_id = dt.pk_madetai_id and fk_user_id=$pk_user_id) or dt.fk_user_id in(SELECT fk_user_id from tbl_hoidong_detai where fk_madetai_id = dt.pk_madetai_id and fk_user_id=$pk_user_id))".($year>0?" and year(dtpc.ngay_hop)=$year ":""));
			//tinh so trang
			$num_page = ceil($total/$record_per_page);
			//lay bien p truyen tu url, bien nay se chi trang hien tai
			$p = (isset($_GET["p"])&&$_GET["p"]>0) ? ($_GET["p"]-1) : 0;
			//lay tu ban ghi nao trong chuoi sql
			$from = $p * $record_per_page;			
			//---------
			//lay toan bo ban ghi co phan trang
			$arr = $this->model->get_all("SELECT * from tbl_detai_phieucham dtpc JOIN tbl_detai dt ON dt.pk_madetai_id = dtpc.fk_madetai_id JOIN tbl_user u ON u.pk_user_id = dt.fk_user_id JOIN tbl_bomon bm ON bm.pk_mabomon_id = u.fk_mabomon_id where (dt.fk_user_id =$pk_user_id or EXISTS (SELECT * from tbl_detai_user where fk_madetai_id = dt.pk_madetai_id and fk_user_id=$pk_user_id) or dt.fk_user_id in(SELECT fk_user_id from tbl_hoidong_detai where fk_madetai_id = dt.pk_madetai_id and fk_user_id=$pk_user_id))".($year>0?" and year(dtpc.ngay_hop) =$year ":"")." order by dt.pk_madetai_id desc limit $from,$record_per_page");
			//load view
			include "view/backend/w_giaovien/view_phieuchamdetai.php";
		}
	}
	new controller_phieuchamdetai();
 ?>