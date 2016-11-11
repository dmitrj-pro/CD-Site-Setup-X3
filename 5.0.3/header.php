<?php
define("template","template");
define("system","system");
define("appFolder","app");
define("HidePage",false);
define("pageFolder","data");

function ParseQuery(&$arr){
	$res=array();
	for($i=0; $i<count($arr);$i++){
		$tmp=split('=',$arr[$i]);
		$to=trim($tmp[0]);
		for($j=1;$j<count($tmp);$j++){
			$res[$to].=trim($tmp[$j]);
			if($j<(count($tmp)-1)){
				$res[trim($tmp[0])].='=';
			}
		}
	}
	return $res;
}
function GenText(&$str,$data){
	$res="";
	$j=0;
	for($i=0; $i<strlen($str);$i++){
		if($str[$i]=='%'){
			if ($str[$i+1]=='p'){
				$res.=$data[$j++];
				$i++;
			} else {
				$res.=$str[$i];
			}
		} else {
			$res.=$str[$i];
		}
	}
	return $res;
}

 ?>
