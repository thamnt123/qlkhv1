<?php 
	class model{
		//ham lay tat cac cac ban ghi
		public function get_all($sql){
			global $db;
			$result = mysqli_query($db,$sql);
			$arr = array();
			while($rows = mysqli_fetch_object($result))
				$arr[] = $rows;
			return $arr;
		}
		//ham lay mot ban ghi
		public function get_a_record($sql){
			global $db;
			$result = mysqli_query($db,$sql);
			$rows = mysqli_fetch_object($result);
			return $rows;
		}
		//ham thuc thi cau truy van
		public function execute($sql){
			global $db;
			mysqli_query($db,$sql);
		}
		//dem so ban ghi
		public function num_rows($sql){
			global $db;
			$result = mysqli_query($db,$sql);
			return mysqli_num_rows($result);
		}
	}
 ?>