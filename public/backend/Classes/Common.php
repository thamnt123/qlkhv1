<?php 
	abstract class USER_TYPE
	{
	    const ADMIN = 0;
	    const GIAO_VIEN = 1;
	    const TRUONG_BO_MON = 2;
	    const HOI_DONG = 3;
	}
	abstract class STATUS
	{
	    const CHO_DUYET_1 = 0;//Chờ trưởng bộ phận duyệt
	    const CHO_DUYET_2 = 1;//Chờ hội dồng duyệt
	    const DANG_THUC_HIEN = 2;
	    const HOAN_THANH = 3;
	    const HUY = 4;
	    const DA_CHAM = 5;
	}
	/**
	 * Hàm hỗ trợ update ảnh
	 * @param {string} $Url [Đường dẫn folder muốn lưu: folder/folder1/]
	 * @param {string} $file [key of file in FormData]
	 */
	function Upload($file, $Url){
		$_ReturnData = new StdClass;
		//ECHO var_dump($_FILES['file']['name']);
		if(isset($_FILES[$file])){
			if($_FILES[$file]['name']!=null){//Người dũng đã chọn file
				//echo $_FILES['file']['name'];
				if($_FILES[$file]['size'] > 52428800){
					//File quá lớn
					$_ReturnData->Status = -2;
					$_ReturnData->Msg = "File quá lớn!";
					return $_ReturnData;
				}
				else{
					// file hợp lệ, tiến hành upload
					$name = $_FILES[$file]['name'];
	                $path = $Url.$name; // file sẽ lưu vào thư mục data
	                $tmp_name = $_FILES[$file]['tmp_name'];
	                $type = $_FILES[$file]['type']; 
	                $size = $_FILES[$file]['size']; 
	                // Upload file
	                move_uploaded_file($tmp_name,$path);
	                
	                $_ReturnData->Status = 1;
	                $_ReturnData->Msg = "Upload ảnh thành công.";
	                $_ReturnData->Data = $path;
	                return $_ReturnData;
				}
			}
		}
		//Chưa chọn file
		$_ReturnData->Status = -1;
		$_ReturnData->Msg = "Chưa chọn file.";
		return $_ReturnData;
		//die(json_encode(array('Status'=>-1)));
	}
?>