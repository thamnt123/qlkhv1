<?php 
	class controller_add_edit_bomon{
		public $model;
		public function __construct(){
			//------
			$this->model = new model();
			//------
			$act = isset($_GET["act"]) ? $_GET["act"] : "";
			$id = isset($_GET["id"])&&is_numeric($_GET["id"]) ? $_GET["id"] : 0;
			switch($act){
				//----
				case "edit":
					//lay 1 ban ghi truong ung voi id truyen vao
					$record = $this->model->get_a_record("select * from tbl_bomon where pk_mabomon_id=$id");
					$form_action = "admin.php?controller=add_edit_bomon&act=do_edit&id=$id";
					//load view
					include "view/backend/view_add_edit_bomon.php";
				break;
				case "do_edit":
					$c_tenbomon = $_POST["c_tenbomon"];
					$c_truongbomon = $_POST["c_truongbomon"];
					$fk_user_id = $_POST["fk_user_id"];
					
					//-----
					//replace ky tu dac biet
					$c_tenbomon = str_replace("'", "\'", $c_tenbomon);
					$c_truongbomon = str_replace("'", "\'", $c_truongbomon);
				
					//-----
					//update ban ghi
					$this->model->execute("update tbl_bomon set c_tenbomon='$c_tenbomon', c_truongbomon='$c_truongbomon', fk_user_id=$fk_user_id where pk_mabomon_id=$id");
					//di chuyen den trang 
					header("location:admin.php?controller=bomon");
				break;
				//----
				case "add":
					$form_action = "admin.php?controller=add_edit_bomon&act=do_add";
					//load view
					include "view/backend/view_add_edit_bomon.php";
				break;
				//----
				case "do_add":
					$c_tenbomon = $_POST["c_tenbomon"];
					$c_truongbomon = $_POST["c_truongbomon"];
					$fk_user_id = $_POST["fk_user_id"];
					$this->model->execute("insert into tbl_bomon set c_tenbomon='$c_tenbomon', c_truongbomon='$c_truongbomon',fk_user_id=$fk_user_id ");
					//di chuyen den trang 
					header("location:admin.php?controller=bomon");
				break;
				//----
				case "delete":
					
					//--------
					$this->model->execute("delete from tbl_bomon where pk_mabomon_id=$id");
					//di chuyen den trang news
					header("location:admin.php?controller=bomon");
				break;
				//----
				default:
					//di chuyen den trang news
					header("location:admin.php?controller=bomon");
				break;
				//----
			}
		}
	}
	new controller_add_edit_bomon();
 ?>