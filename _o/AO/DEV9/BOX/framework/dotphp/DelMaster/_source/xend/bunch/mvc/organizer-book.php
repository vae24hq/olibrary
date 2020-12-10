<?php
include 'model-book.php';

class organizer {
	public $model;
	public function __construct(){
		$model_name = 'book';
		$this->model = new $model_name();  
	}

	public function ignite(){
		$act = 'index';
		if(isset($_GET['act'])){$act = $_GET['act'];}
		if($act=='index'){
			// no special book is requested, we'll show a list of all available books
			$books = $this->model->Listing();
			$view = 'view-booklist.php';
		} elseif ($act=='details') {
			// show the requested book
			$book = $this->model->Info($_GET['id']);
			$view = 'view-bookdetails.php';
		}

		include $view;
	}  
}

$engine = new organizer();  
$start = $engine->ignite();
?>