<?php
class Prepare{
	private static $initialized = false;
	private $root;
	private $sourceDir;

	private function requireDir($dirName, $extension) {
		if ($handle = opendir($dirName)) {
			while (false !== ($entry = readdir($handle))) {
				if($entry != "." AND $entry != ".."){
					if (is_dir($dirName . $entry)) {
						$this->requireDir($dirName . $entry . '/', $extension);
// 					}
					else if(preg_match('#\.class\.php$#', $entry AND !preg_match('#Test\.class\.php$#', $entry))){
						include($dirName.$entry);
					}
				}
			}
			closedir($handle);
		}
	}

	/**
	* Récupère toutes les classes
	*/
	private function __construct($src, $root = null){
		$this->sourceDir = $src;
		if(isset($root)){
			$this->root = $root;
		}
		else{
			$this->root = realpath(dirname(__FILE__)).'/';
		}
		
		$this->requireDir($this->root . $this->sourceDir . '/', '.class.php');
	}

	/**
	* Prépare l'orientation objet
	*/
	public static function initialize($appLink) {
		if(!self::$initialized){
			$prepare = new Prepare($appLink);
			self::$initialized = true;
		}
		return $prepare;
	}
	
	/**
	* Fonction getSource
	*/
	public function getSourceLink() {
		return $this->root.$this->sourceDir.'/';
	}


}
?>