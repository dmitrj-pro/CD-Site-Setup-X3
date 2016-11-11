<?php
function storyOpenMat(&$params,&$match){
	$fil=file(appFolder.'/storyOpenMat/lang.txt');
	$lang=ParseQuery($fil);
	$res='<table>'.nr.'<tbody>'.nr;
	$res.='<tr><td>'.$params['pagetitle'].'</td></tr>'.nr;
	$res.='<tr><td>'.$match.'</td></tr>';
	//$res='<table>'.nr.'<tbody>'.nr;
	$adr='http://'.$_SERVER['SERVER_NAME'].'/'.appFolder.'/storyOpenMat/down.php?f=';
	if($params['LinuxFile']!=''){
		$res.='<tr><td>Linux:</td><td><a href="'.$adr.$params['LinuxFile'].'">Скачать</a> '.$params['LinuxInfo'].'</td>';
	}
	if($params['WinFile']!=''){
		$res.='<tr><td>Windows:</td><td><a href="'.$adr.$params['WinFile'].'">Скачать</a> '.$params['WinInfo'].'</td>';
	}
	if($params['AndroidFile']!=''){
		$res.='<tr><td>Android:</td><td><a href="'.$adr.$params['AndroidFile'].'">Скачать</a> '.$params['AndroidInfo'].'</td>';
	}
	if($params['MacFile']!=''){
		$res.='<tr><td>Mac:</td><td><a href="'.$adr.$params['MacFile'].'">Скачать</a> '.$params['MacInfo'].'</td>';
	}
	if($params['OtherFile']!=''){
		$res.='<tr><td>Other:</td><td><a href="'.$adr.$params['OtherFile'].'">Скачать</a> '.$params['OtherInfo'].'</td>';
	}
	//$res.='</tbody></table>';

$res.='</tbody></table>';
	return $res;//$lang["ADDedUSER"].user::getUser($params["userid"])->Name().nr."<br>".$match;
}
 ?>
