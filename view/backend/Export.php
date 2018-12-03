<?php 

	require "../../config.php";
	//load file model.php
	require "../../model/model.php";

	header("Content-type: application/octet-stream");
	header("Content-Disposition: attachment; filename=ketqua.xls");
	header("Pragma: no-cache");
	header("Expires: 0");
	session_start();
	$total = $_SESSION['export_kq'];
	//$total = $_POST['export_kq'];
	//print_r($_SESSION['export_kq']);
	$i=1;
?>
<?php if(isset($total)){ ?>
<meta charset="utf-8" />
<table border="1">
    <thead>
        <tr>
        	<td style="font-weight: bold;">STT</td>
        	<td style="font-weight: bold;">Tên đề tài </td>
            <td style="font-weight: bold;">Chủ nhiệm đề tài </td>
            <td style="font-weight: bold;">Bộ môn </td>
            <td style="font-weight: bold;">Kinh phí đề tài </td>
            <td style="font-weight: bold;">Điểm trung bình </td>
            <td style="font-weight: bold;">Xếp loại </td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($total as $rows):?>
        <tr>
        	<td style="text-align: center;"><?=$i++?></td>
            <td><?php echo ($rows->c_tendetai);?></td>
            <td><?php echo $rows->c_fullname;?></td>
            <td><?php echo $rows->c_tenbomon;?></td>
            <td><?php echo $rows->c_kinhphi;?> VNĐ</td>
            <td style="text-align: right;"><?php echo $rows->diem_trung_binh;?></td>
            <td><?php echo $rows->xep_loai;?></td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>  
<?php } ?>