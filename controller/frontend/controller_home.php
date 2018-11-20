<?php 
	class controller_home{
		public $model;
		public function __construct(){
			$this->model = new model();
			//load view
			include "view/frontend/view_home.php";
		}
	}
	new controller_home();
 ?>