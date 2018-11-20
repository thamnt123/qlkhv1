<?php 
	class controller_slide{
		public $model;
		public function __construct(){
			$this->model = new model();
			//load view
			include "view/frontend/view_slide.php";
		}
	}
	new controller_slide();
 ?>