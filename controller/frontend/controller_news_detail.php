<?php 
	class controller_news_detail{
		public $model;
		public function __construct(){
			$this->model = new model();
			//load view
			include "view/frontend/view_news_detail.php";
		}
	}
	new controller_news_detail();
 ?>