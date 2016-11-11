<?php
class Page{
	private $idpage;
	public function __construct($id){
		$this->idpage=$id;
	}
	public function GetText(){
		$con=SSKernel::Connecter();
		$f=$con->getContent('page',$this->idpage);
		$params=$f->getParams();
		$return="<p><H1>".$params['pagetitle']."</H1></p>\n";
		if(file_exists(appFolder.'/'.$params['appid'].'/pageGen.php')){
			include_once appFolder.'/'.$params['appid'].'/pageGen.php';
			$return.=$params['appid']($params,$f->getContext());
		} else {
			$return.="Fatal Error 404";
		}
		return $return;
	}
	static public function getPage($id){
		return new Page($id);
	}
}
 ?>
