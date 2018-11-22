<?php 
	class controller_add_edit_thongtinhoidong{
		public $model;
		public function __construct(){
			//------
			$this->model = new model();
			//------
			$act = isset($_GET["act"]) ? $_GET["act"] : "";
			$id = isset($_GET["id"])&&is_numeric($_GET["id"]) ? $_GET["id"] : 0;
			if(isset($_GET["id"])){
				$_SESSION['ID_HOIDONG_DT'] = $_GET["id"];
			}
			$id_hd_dt = isset($_SESSION['ID_HOIDONG_DT'])?$_SESSION['ID_HOIDONG_DT']:0;
			$fk_hoidong_id = isset($_SESSION["ID_HOIDONG"])?$_SESSION["ID_HOIDONG"]:0;

			//print '<script>alert("'.$fk_hoidong_id.'");</script>';
			switch($act){
				//----
				case "edit":
					//lay 1 ban ghi truong ung voi id truyen vao
					$record = $this->model->get_a_record("select * from tbl_hoidong_detai where pk_hoidong_id=$id");
					$form_action = "admin.php?controller=add_edit_thongtinhoidong&act=do_edit&id=$id";
					//load view
					include "view/backend/view_add_edit_thongtinhoidong.php";
				break;
				case "do_edit":
					$id_hd_dt = $_POST["pk_hd_detai_id"];
					$fk_user_id = $_POST["fk_user_id"];
					$fk_vaitro_id = $_POST["fk_vaitro_id"];
					if($fk_vaitro_id != 1){
						$hdrc = $this->model->get_a_record("select * from tbl_hoidong_detai where pk_hoidong_id=$id_hd_dt");
						$usty = $hdrc->UserType_backup;
						print '<script>console.log('.$usty.')</script>';
						$this->model->execute("UPDATE `tbl_user` SET `UserType` =$usty  WHERE `tbl_user`.`pk_user_id` = $fk_user_id ");
					}else{
						$this->model->execute("UPDATE `tbl_user` SET `UserType` = '3' WHERE `tbl_user`.`pk_user_id` = $fk_user_id ");
					}
					//update ban ghi
					$this->model->execute("update tbl_hoidong_detai set fk_user_id=$fk_user_id, fk_vaitro_id=$fk_vaitro_id where pk_hoidong_id=$id_hd_dt");
					//di chuyen den trang 
					header("location:admin.php?controller=thongtinhoidong");
				break;
				//----
				case "add":
					$form_action = "admin.php?controller=add_edit_thongtinhoidong&act=do_add";
					//load view
					include "view/backend/view_add_edit_thongtinhoidong.php";
				break;
				//----
				case "do_add":
					
					$fk_user_id = $_POST["fk_user_id"];
					$fk_vaitro_id = $_POST["fk_vaitro_id"];
					$userRc = $this->model->get_a_record("select * from tbl_user where pk_user_id=$fk_user_id");
					$this->model->execute("insert into tbl_hoidong_detai set fk_user_id=$fk_user_id, fk_vaitro_id=$fk_vaitro_id, fk_hoidong_id = $fk_hoidong_id, UserType_backup=$userRc->UserType ");
					if($fk_vaitro_id == 1){
						$this->model->execute("UPDATE `tbl_user` SET `UserType` = '3' WHERE `tbl_user`.`pk_user_id` = $fk_user_id ");
					}
					//di chuyen den trang 
					header("location:admin.php?controller=thongtinhoidong");
				break;
				//----
				case "delete":
					$hdrc = $this->model->get_a_record("select * from tbl_hoidong_detai where pk_hoidong_id=$id");
					if($hdrc->fk_vaitro_id == 1){
						$this->model->execute("UPDATE `tbl_user` SET `UserType` = $hdrc->UserType_backup WHERE `tbl_user`.`pk_user_id` = $hdrc->fk_user_id ");
					}
					//--------
					$this->model->execute("delete from tbl_hoidong_detai where pk_hoidong_id=$id");
					//di chuyen den trang 
					header("location:admin.php?controller=thongtinhoidong");
				break;
				//----
				default:
					//di chuyen den trang 
					header("location:admin.php?controller=thongtinhoidong");
				break;
				//----
			}
		}
	}
	new controller_add_edit_thongtinhoidong();
 ?>