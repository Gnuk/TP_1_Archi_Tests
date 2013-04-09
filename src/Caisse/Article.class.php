<?php
namespace Caisse;
class Article{
	private $name;
	private $price;
	public function __construct($name, $price){
		$this->name = $name;
		$this->price = $price;
	}
	
	/**
	* Méthode getPrice
	*/
	public function getPrice() {
		return $this->price;
	}

}
?>
