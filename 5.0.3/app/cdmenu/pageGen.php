<?php
//!!!
function getPageName($file){
	$f=file($file);
	for($i=0; $i<count($f);$i++){
		$tmp=split('=',$f[$i]);
		if($tmp[0]=='pagetitle'){
			return trim($tmp[1]);
		}
	}
	return 'No Name';
}
class PP{
	public $name;
	public $adress;
	public $location;
	public function __construct($name,$location){
		$this->name=$name;
		$this->location=$location;
		$this->adress=substr($location,strlen('data/page'));
		if(!HidePage){
			$this->adress='index.php?page='.substr($this->adress,0,strlen($this->adress)-4);
		}
	}
}
function getFull(&$arr,$folder){
	$f=scandir($folder,SCANDIR_SORT_DESCENDING);
	for($i=0;$i<count($f);$i++){
		if(!strstr($f[$i],'.php')){
			if(($f[$i]=='.') || ($f[$i]=='..')){
				continue;
			}
			$this->getFull($arr,$folder.'/'.$f[$i]);
		} else {
			$f[$i]=$folder.'/'.$f[$i];
			array_push($arr, new PP(getPageName($f[$i]),$f[$i]));
		}
	}
	return $arr;
}
function cdmenu(&$params,&$match){
	$arr=array();
	getFull($arr,'data/page');
	//$ret='<div class="well "><div id="nextend-accordion-menu-89" class="noscript ">'."\n".'<div class="nextend-accordion-menu-inner ">'."\n".'<div class="nextend-accordion-menu-inner-container">'."\n".'<dl class="level1">'."\n";
	for($i=0;$i<count($arr);$i++){
		$ret.='<a href="'.$arr[$i]->adress.'">'.$arr[$i]->name.'</a>'."\n";
	}
	return $ret;
}
?>
