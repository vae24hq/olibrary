<?php
add_file(erko::prepare('model'));

class organizer {
	public $model;
	public function __construct(){
		$model_name = erko::return_value('model');
		$this->model = new $model_name();  
	}

	public function ignite(){
		if(erko::operation()=='index'){
			// no special book is requested, we'll show a list of all available books
			$books = $this->model->Listing();
		} elseif (erko::operation()=='view') {
			// show the requested book
			$book = $this->model->Info($_GET['id']);
		}
		include(erko::prepare('view'));
	}  
}

$engine = new organizer();  
$engine->ignite(); 
?>