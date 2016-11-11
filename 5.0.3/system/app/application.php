<?php
class Application{
	private $appName;
	public function __construct($name){
		if (file_exists(appFolder.'/'.$name)){
			$this->appName=appFolder.'/'.$name;
		} else {
			$this->appName='';
		}
	}
	public function isExists(){
		return $this->appName!='';
	}
	public function Exists($name){
		return file_exists(appFolder.'/'.$name);
	}
	public function isPageGen(){
		return file_exists($this->appFolder.'/pageGen.php');
	}
	public function AppName(){
		if (file_exists($this->appFolder.'/appInfo.txt')){
			$fil=file($this->appFolder.'/appInfo.txt');
			$lang=ParseQuery($fil);
			return $lang['AppName'];
		} else {
			return 'NoName';
		}
	}
	// public function Unlink(){
	// 	if (file_exists($this->appFolder.'/appInfo.txt')){
	// 		$fil=file($this->appFolder.'/appInfo.txt');
	// 		$lang=ParseQuery($fil);
	// 		return $lang['AppName'];
	// 	} else {
	// 		return 'NoName';
	// 	}
	// }
}
 ?>
