<?php 
	class controller_add_edit_slide{
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
					$record = $this->model->get_a_record("select * from tbl_slide where pk_slide_id=$id");
					$form_action = "admin.php?controller=add_edit_slide&act=do_edit&id=$id";
					//load view
					include "view/backend/view_add_edit_slide.php";
				break;
				case "do_edit":
					$c_name = $_POST["c_name"];
					$c_img = "";
					//-----
					//replace ky tu dac biet
					$c_name = str_replace("'", "\'", $c_name);
					//-----
					//update ban ghi
					$this->model->execute("update tbl_slide set c_name='$c_name' where pk_slide_id=$id");
					//-----
					//thuc hien upload file neu user chon file upload
					if($_FILES["c_img"]["name"] != ""){
						//xoa file cu
						$old_file = $this->model->get_a_record("select c_img from tbl_slide where pk_slide_id=$id");
						if(file_exists("public/upload/slide/".$old_file->c_img))
							unlink("public/upload/slide/".$old_file->c_img);
						//--------
						//thuc hien upload file moi
						$c_img = time().$_FILES["c_img"]["name"];
						move_uploaded_file($_FILES["c_img"]["tmp_name"], "public/upload/slide/".$c_img);
						//update cot c_img
						$this->model->execute("update tbl_slide set c_img='$c_img' where pk_slide_id=$id");
					}
					//di chuyen den trang slide
					header("location:admin.php?controller=slide");
				break;
				//----
				case "add":
					$form_action = "admin.php?controller=add_edit_slide&act=do_add";
					//load view
					include "view/backend/view_add_edit_slide.php";
				break;
				//----
				case "do_add":
					$c_name = $_POST["c_name"];
					$c_img = "";
					//thuc hien upload file neu user chon file upload
					if($_FILES["c_img"]["name"] != ""){
						//thuc hien upload file moi
						$c_img = time().$_FILES["c_img"]["name"];
						move_uploaded_file($_FILES["c_img"]["tmp_name"], "public/upload/slide/".$c_img);
					}
					$this->model->execute("insert into tbl_slide set c_name='$c_name',c_img='$c_img'");
					//di chuyen den trang slide
					header("location:admin.php?controller=slide");
				break;
				//----
				case "delete":
					//xoa file cu
					$old_file = $this->model->get_a_record("select c_img from tbl_slide where pk_slide_id=$id");
					if(file_exists("public/upload/slide/".$old_file->c_img)){
						unlink("public/upload/slide/".$old_file->c_img);
					}
					//--------
					$this->model->execute("delete from tbl_slide where pk_slide_id=$id");
					//di chuyen den trang news
					header("location:admin.php?controller=slide");
				break;
				//----
				default:
					//di chuyen den trang news
					header("location:admin.php?controller=slide");
				break;
				//----
			}
		}
	}
	new controller_add_edit_slide();
 ?>