<?php 
	class controller_user{
		public $model;
		public function __construct(){
			$this->model = new model();
			
			//---------
			//phan trang
			//quy dinh so ban ghi hien thi tren mot trang
			//$id=isset($_GET['id'])?$_GET['id']:0;
			//$id = isset($_GET["id"])&&is_numeric($_GET["id"]) ? $_GET["id"] : 0;
			$classB =0;
			if(isset($_GET["classB"])){
				$classB = $_GET["classB"];
			}
			if(isset($_POST['Process'])){
				$classB =  $_POST['bomon'];
			}

			$record_per_page = 10;
			//tinh tong so ban ghi
			// $total = $this->model->num_rows("select pk_user_id from tbl_user".($classB!=0 ? " and fk_mabomon_id in($classB) " : ""));
			$total = $this->model->num_rows("select pk_user_id from tbl_user");
			//tinh so trang
			$num_page = ceil($total/$record_per_page);
			//lay bien p truyen tu url, bien nay se chi trang hien tai
			$p = (isset($_GET["p"])&&$_GET["p"]>0) ? ($_GET["p"]-1) : 0;
			//lay tu ban ghi nao trong chuoi sql
			$from = $p * $record_per_page;			
			//---------
			//lay toan bo ban ghi co phan trang
			$arr = $this->model->get_all("select * from tbl_user order by pk_user_id desc limit $from,$record_per_page");
			//load view
			include "view/backend/view_user.php";
		}
	}
	new controller_user();
 ?>