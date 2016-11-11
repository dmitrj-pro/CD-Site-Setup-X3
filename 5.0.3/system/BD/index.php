<?php
// class BD{
// 	private $folder;
// 	function __constructor($f){
// 		$this->folder=$f;
// 	}
// 	public function getData($bd,$)
// }
define("delim","{pagedata}");
define("nr","\n");
include system.'/BD/ConPAC.php';
class Connecter{
	private $f;
	public function __construct(){
		$this->f='data';
	}
	public function getContent($table,$id){
		if($table!=''){
			$fileName=$this->f.'/'.$table.'/'.$id.'.php';
		} else {
			$fileName=$this->f.'/'.$id.'.php';
		}
		if(file_exists($fileName)){
			$f=file_get_contents($fileName);
			$match=split(delim,$f);
			$tmp=split(nr,$match[0]);
			for($i=0;$i<count($tmp);$i++){
				$t=split("=",$tmp[$i]);
				$params[trim($t[0])]='';//trim($t[1]);
				for($j=1;$j<count($t);$j++){
					$params[trim($t[0])].=trim($t[$j]);
					if($j<(count($t)-1)){
						$params[trim($t[0])].='=';
					}
				}
			}
			return new Con_ParamsAndContext($params,$match[1]);

		} else {
			$ar=array();
			$mat='';
			return new Con_ParamsAndContext($ar,$mat);
		}
	}
	private function ConArrToString(&$arr){
		$res='';
		foreach ($arr as $key => $value) {
		    // $arr[3] будет перезаписываться значениями $arr при каждой итерации цикла
		    $res.=$key.'='.$value.nr;
		}
		return $res;
	}
	public function setContext($table,$id,$PAC){
		if($PAC->isExpty()){
			return false;
		}
		if($table!=''){
			$fileName=$this->f.'/'.$table.'/'.$id.'.php';
		} else {
			$fileName=$this->f.'/'.$id.'.php';
		}
		$f=open($filename,"w");
		fwrite($f,$this->ConArrToString($PAC->getParams()));
		fwrite($f,delim.nr);
		fwrite($f,$PAC->getContext());
		fclose($f);
	}
	public function cteateTable($tab){
		if(file_exists($this->f.'/'.$tab.'/')){
			return;
		}
		mkdir($this->f.'/'.$tab);
	}
	public function remuvContext($table,$id){
		if($table!=''){
			if (file_exists($this->f.'/'.$table.'/'.$id.'.php')){
				unlink($this->f.'/'.$table.'/'.$id.'.php');
			}
		} else {
			if (file_exists($this->f.'/'.$id.'.php')){
				unlink($this->f.'/'.$id.'.php');
			}
		}
	}
	public function getResult($table,$id){
		if($table!=''){
			return file_get_contents($this->f.'/'.$table.'/'.$id.'.php');
		} else {
			$fileName=$this->f.'/'.$id.'.php';
			return file_get_contents($this->f.'/'.$id.'.php');
		}
	}
	public function existsContext($table,$id){
		if($table!=''){
			return file_exists($this->f.'/'.$table.'/'.$id.'.php');
		} else {
			return file_exists($this->f.'/'.$id.'.php');
		}
	}
	public function existsTable($tab){
		return file_exists($this->f.'/'.$tab.'/');
	}
	// public function getAllIdInTeble($tab){
	// 	return
	// }
}
// function getMat($id){
// 	if(file_exists("data".'/'.$id.'.php')){
// 		return file_get_contents("data".'/'.$id.'.php');
// 	} else {
// 		return file_get_contents("data".'/404er.php');
// 	}
// }
 ?>
