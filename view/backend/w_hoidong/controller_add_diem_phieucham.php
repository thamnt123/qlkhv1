<?php 
	require "../../../config.php";
	//load file model.php
	require "../../../model/model.php";

	//echo '{"data":"'.print_r($_GET).'"}';
	//
	$ngay_hop="2018-01-01";
	if(isset($_GET["ngayHop"])){
		$ngay_hop = $_GET["ngayHop"];
		$ngay_hop = explode("-", $ngay_hop);
   		$ngay_hop = $ngay_hop[2]."-".$ngay_hop[1]."-".$ngay_hop[0];
	}
    //
    $diem_trung_binh=isset($_GET["diemTrungBinh"])?$_GET["diemTrungBinh"]:0;
	$dia_diem = isset($_GET["diaDiem"])?$_GET["diaDiem"]:"";
	$y_kien = isset($_GET["yKien"])?$_GET["yKien"]:"";	
	$ghi_chu = isset($_GET["ghiChu"])?$_GET["ghiChu"]:"";
	$xep_loai = isset($_GET["xepLoai"])?$_GET["xepLoai"]:"";
	$detaidunghan_quahan = isset($_GET["deTaiDungHan"])?$_GET["deTaiDungHan"]:0;
	$fk_madetai_id = isset($_GET["fk_madetai_id"])?$_GET["fk_madetai_id"]:0;
	$fk_user_id = isset($_GET["fk_user_id"])?$_GET["fk_user_id"]:0;
	// //echo print_r($_GET);
	 $model = new model();

	  $model->execute("INSERT INTO `tbl_detai_phieucham` (`fk_madetai_id`, `ghi_chu`, `y_kien`, `xep_loai`, `ngay_hop`, `dia_diem`, `detaidunghan_quahan`,`diem_trung_binh`) VALUES ('{$fk_madetai_id}', '{$ghi_chu}', '{$y_kien}', '{$xep_loai}', '{$ngay_hop}', '{$dia_diem}', '{$detaidunghan_quahan}','{$diem_trung_binh}')");
	 $id = $model->get_a_record('SELECT LAST_INSERT_ID() as ID');
	$fk_detai_phieucham_id=$id->ID;
	if(intval($fk_detai_phieucham_id) > 0){
		$listPoint = isset($_GET["listPoint"])?$_GET["listPoint"]:null;
		if($listPoint!=null){
			foreach ($listPoint as $key) {
				$fk_khoanmucdiem_id = $key["pk_khoanmucdiem_id"];
				$diem_chu_tich = $key["diem_chu_tich"];
				$diem_uy_vien_1 = $key["diem_uy_vien_1"];
				$diem_uy_vien_2 = $key["diem_uy_vien_2"];
				$diem_phan_bien_1 = $key["diem_phan_bien_1"];
				$diem_phan_bien_2 = $key["diem_phan_bien_2"];
				$model->execute("INSERT INTO tbl_diem_phieucham SET fk_user_id='{$fk_user_id}', fk_detai_phieucham_id='{$fk_detai_phieucham_id}', fk_khoanmucdiem_id='{$fk_khoanmucdiem_id}', diem_chu_tich='{$diem_chu_tich}',diem_uy_vien_1='{$diem_uy_vien_1}',diem_uy_vien_2='{$diem_uy_vien_2}' ,diem_phan_bien_1='{$diem_phan_bien_1}', diem_phan_bien_2='{$diem_phan_bien_2}'");
			}
			$model->execute("UPDATE `tbl_detai` SET c_trangthai = 3 WHERE pk_madetai_id =".$fk_madetai_id);
			echo '{"result":"OKE!"}';
			exit();
		}else{
			echo('{"result":"NOT OKE!"}');
			exit();
		}
	}else{
		echo('{"result":"NOT OKE!"}');
		exit();
	}
?>