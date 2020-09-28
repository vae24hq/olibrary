<?php
class Spet {
	private $tags = array();
	private $content;

	public function __construct($file){
		$this->content = $this->content($file);
	}

	public function display(){
		$this->swapTag();
		echo $this->content;
	}

	public function doTag($name, $value){
		$this->tags[$name] = $value;
	}

	public function doTags($tags){
		if(is_array($tags)){
			foreach($tags as $name => $value){
				$this->doTag($name, $value);
			}
		}
	}

	public function content($file){
		if(is_file($file)){
			$contents = file_get_contents($file);
			return $contents;
		}
		else {
			exit('Missing File: ['.$file.']');
		}
	}

	private function swapTag(){
		foreach ($this->tags as $name => $value) {
			$this->content = str_replace('{'.$name.'}', $value, $this->content);
		}
		return true;
	}
}
?>