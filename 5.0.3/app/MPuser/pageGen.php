<?php
function MPuser(&$params,&$match){
	if(isset($params['usertype'])){
		$user=new user();
		if($params['usertype']>$user->Type()){
			return "not Assess";
		} else {
			if(isset($params['secapp'])){
				include_once appFolder.'/'.$params['secapp'].'/pageGen.php';
				return $params['secapp']($params,$match);
			} else {
				return $match;
			}
		}
	} else {
		if(isset($params['secapp'])){
			include_once appFolder.'/'.$params['secapp'].'/pageGen.php';
			return $params['secapp']($params,$match);
		} else {
			return $match;
		}
	}

}
 ?>
