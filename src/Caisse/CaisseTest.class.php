<?php
namespace Caisse;
class CaisseTest extends \PHPUnit_Framework_TestCase{
	
	/**
	* Méthode setUp
	*/
	public function setUp() {
		require_once("Caisse.class.php");
		require_once("Article.class.php");
	}

	
	/**
	* 
	*/
	public function testAdd()
    {
		$caisse = new Caisse();
		$pomme = $caisse->add("Pomme");
		$this->assertEquals($pomme->getPrice(), 1.0);
    }

}
?>
