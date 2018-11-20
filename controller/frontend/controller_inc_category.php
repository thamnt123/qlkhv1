<?php 
	class controller_inc_category{
		public $model;
		public function __construct(){
			$this->model = new model();
			//load view
			include "view/frontend/view_inc_category.php";
		}
	}
	new controller_inc_category();
 ?>