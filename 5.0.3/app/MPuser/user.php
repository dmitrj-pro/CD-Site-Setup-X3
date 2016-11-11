<?php
class user{
	private $login;
	private $name;
	private $mail;
	private $id;
	private $type;
	public function __construct(){
		$this->login='0';
		if (isset($_COOKIE["token"])){
			$connect=new Connecter();
			//SSKernel::Connecter();
			if($connect->existsContext('token',$_COOKIE["token"])){
				$data=$connect->getResult('token',$_COOKIE["token"]);
				$this->id=trim($data);
				if($connect->existsContext('users',$this->id)){
					$userData=$connect->getContent('users',$this->id)->getParams();
					$this->login=$userData['login'];
					$this->name=$userData['name'];
					$this->mail=$userData['email'];
					$this->type=$userData['type'];
				} else {
					$connect->remuvContext('token',$_COOKIE["token"]);
				}
			} else {
				setcookie("token","",-1);
			}
		}
	}
	public function getUserData(){
		if($this->login=='0'){
			return 0;
		} else {
			$res=array();
			$res["name"]=$this->name;
			$res["login"]=$this->login;
			$res["mail"]=$this->mail;
			return $res;
		}
	}
	static public function getUser($id){
		$res=new user();
		$res->id=$id;
		$connect=SSKernel::Connecter();
		if($connect->existsContext('users',$this->id)){
			$userData=$connect->getContent('users',$this->id)->getParams();
			$res->login=$userData['login'];
			$res->name=$userData['name'];
			$res->mail=$userData['email'];
			$res->type=$userData['type'];
		} else {
			$res->login="NOT USER";
			$res->name="NOT USER";
			$res->mail="NOT USER";
			$res->type="-1";
		}
		return $res;
	}
	public function ID(){
		return $this->id;
	}
	public function isAutorise(){
		return $this->login!='0';
	}
	public function Name(){
		return $this->name;
	}
	public function Type(){
		return $this->type;
	}
	public function Mail(){
		return $this->mail;
	}
	public function Login(){
		return $this->login;
	}
	public function Autorisation(){

	}
}
 ?>
