<?php
include system.'/sysX5/index.php';
include system.'/BD/index.php';
include system.'/page/index.php';
include system.'/app/application.php';
class SSKernel{
	private static $Site;
	private static $connect;
	public static function Init(&$params){
		SSKernel::$Site=new CDSS($params);
		SSKernel::$connect=new Connecter();
	}
	public static function version(){
		return '5.0.3';
	}
	public static function Site(){
		return SSKernel::$Site;
	}
	public static function Connecter(){
		return SSKernel::$connect;
	}
}
 ?>
