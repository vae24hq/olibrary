<?php
class Populate {  
	public $serial;  
	public $title;  
	public $author;  
	public $description;  

	public function __construct($serial, $title, $author, $description){
		$this->serial = $serial;
		$this->title = $title;
		$this->author = $author;
		$this->description = $description;  
	}
}

class sample {  
	public function Listing(){
		// here goes some hardcoded values to simulate the database
		return array(
			"0606" => new Populate("0606", "Jungle Book", "R. Kipling", "A classic book."),
			"0707" => new Populate("0707", "Moonwalker", "J. Walker", ""),
			"0808" => new Populate("0808", "PHP for Dummies", "Some Smart Guy", "PHP tutorial for novice")  
	  );  
	}

	public function Info($specs){
		// we use the previous function to get all the books and then we return the requested one.
		// in a real life scenario this will be done through a db select command
		$allBooks = $this->Listing();
		return $allBooks[$specs];  
	}   
}
?>