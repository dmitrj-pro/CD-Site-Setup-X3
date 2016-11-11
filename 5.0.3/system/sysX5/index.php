<?php
class CDSS{
	private $page;
	private $user;
	public function __construct(&$params){
		if(isset($_GET['page'])){
			$this->page=new Page($_GET['page']);
		} else {
			$this->page=new Page("0");
		}
		if(isset($params['menu'])){
///!!!!!
			include_once appFolder.'/'.$params['user'].'/user.php';
			$this->user=new user();
			include_once appFolder.'/'.$params['userForm'].'/siteform.php';
		}
	}
	public function getPage(){
		return $this->page;
	}
	public function getMenu(){
		return $this->menu;
	}
	public function getAutForm(){
		$f=new OForm();
		return $f->getForm($this->user);
	}

}
 ?>
