<?php
namespace Caisse;
class Caisse{
	public function __construct(){
		//echo "La caisse !\n";
		//$text = readline();
		//$this->add($text);
	}
	
	/**
	* Méthode add
	*/
	public function add($text) {
		if("Pomme"){
			$article = new Article("Pomme", 1.0);
		}
		return $article;
	}

}
?>
