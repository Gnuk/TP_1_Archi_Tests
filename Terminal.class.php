<?php

/**
 * Classe Terminal
 */
class Terminal {
	private $prepare;
	private $argv;

	/**
	* Constructeur
	*/
	public function __construct($argv, $sourceDir) {
		$this->argv = $argv;
		$this->prepare = Prepare::initialize($sourceDir);
		if(!is_dir($this->prepare->getSourceLink())){
			die('The link "'.$this->prepare->getSourceLink().'" is not valid, please create required directories' . "\n");
		}
	}
	
	/**
	* Méthode execute
	*/
	public function execute() {
		if($this->argv[1] == "create"){
			if($this->argv[2] == "class"){
				if(isset($this->argv[3]) AND isset($this->argv[4])){
					echo "Create class : \n======\n";
					$namespace = preg_replace('#\/#', '\\', $this->argv[3]);
					$path = $this->prepare->getSourceLink();
					$dirs = explode("/", $this->argv[3]);
					for($i=0; $i<count($dirs); $i++){
						$path = $path . $dirs[$i] . '/';
						if(!is_dir($path)){
							if(!mkdir($path)){
								die();
							}
						}
						
					}
					$stringFile = "<?php\nnamespace $namespace;\nclass ".$this->argv[4]."{\n\tpublic function __construct(){\n\t\techo \"Hello ".$this->argv[4]." !\\n\";\n\t}\n}\n?>\n";
					echo $stringFile;
					echo "=====\nto : $path".$this->argv[4].".class.php\n";
					if(is_file("$path/".$this->argv[4].".class.php")){
						die("The class \"".$this->argv[4]."\" already exist for this namespace\n");
					}
					else if(!file_put_contents("$path/".$this->argv[4].".class.php", $stringFile)){
						die();
					}
				}
			}
		}
	}

}

?>