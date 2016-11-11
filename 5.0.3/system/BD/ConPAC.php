<?php
class Con_ParamsAndContext{
	private $params;
	private $mat;
	public function __construct(&$params,&$con){
		$this->params=$params;
		$this->mat=$con;
	}
	public function getParams(){
		return $this->params;
	}
	public function getContext(){
		return $this->mat;
	}
	public function setParams(&$params){
		return $this->params=$params;
	}
	public function setContext(&$con){
		return $this->mat=$con;
	}
	public function isEmpty(){
		return (count($this->params)==0) && ($mat=='');
	}
}
 ?>
