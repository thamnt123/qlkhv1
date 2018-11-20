<?php 
	require "../../../config.php";
	//load file model.php
	require "../../../model/model.php";

	//echo '{"data":"'.print_r($_GET).'"}';
	$ngay_hop = isset($_GET["ngay_hop"])?$_GET["ngay_hop"]:"";
	$dia_diem = isset($_GET["dia_diem"])?$_GET["dia_diem"]:"";
	$y_kien = isset($_GET["yKien"])?$_GET["yKien"]:"";	
	$ghi_chu = isset($_GET["ghiChu"])?$_GET["ghiChu"]:"";
	$xep_loai = isset($_GET["xep_loai"])?$_GET["xep_loai"]:"";
	$fk_madetai_id = isset($_GET["fk_madetai_id"])?$_GET["fk_madetai_id"]:0;
	$fk_user_id = isset($_GET["fk_user_id"])?$_GET["fk_user_id"]:0;
	//echo print_r($_GET);
	$model = new model();
	$model->execute("insert into tbl_detai_phieucham set fk_madetai_id={$fk_madetai_id}, y_kien='{$y_kien}', ghi_chu='{$ghi_chu}', xep_loai='{$xep_loai}'");
	$id = $model->get_a_record('SELECT LAST_INSERT_ID() as ID');
	$fk_detai_phieucham_id=$id->ID;
	if($fk_detai_phieucham_id > 0){
		$listPoint = isset($_GET["listPoint"])?$_GET["listPoint"]:null;
		if($listPoint!=null){
			foreach ($listPoint as $key) {
				$fk_khoanmucdiem_id = $key["pk_khoanmucdiem_id"];
				$diem_chu_tich = $key["diem_chu_tich"];
				$diem_phan_bien_1 = $key["diem_phan_bien_1"];
				$diem_phan_bien_2 = $key["diem_phan_bien_2"];
				$model->execute("INSERT INTO tbl_diem_phieucham SET fk_user_id={$fk_user_id}, fk_detai_phieucham_id={$fk_detai_phieucham_id}, fk_khoanmucdiem_id={$fk_khoanmucdiem_id}, diem_chu_tich={$diem_chu_tich}, diem_phan_bien_1={$diem_phan_bien_1}, diem_phan_bien_2={$diem_phan_bien_2}");
			}
			echo '{"result":"OKE!"}';
		}
	}else{
		echo print_r($id);
	}
	
?>