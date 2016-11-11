<?php
class FTP{
  private $ftp;
  function __construct($server,$port=21){
    $this->ftp=ftp_connect("$server",$port);
  }
  function __destruct(){
    if($this->ftp){
      ftp_quit($this->ftp);
    }
  }
  ///Выполнение посторонней команды на сервере
  public function CMD($cmd){
    return ftp_site($this->ftp,$cmd);
  }
  public function Connect($server,$port=21){
    $this->ftp=ftp_connect("$server",$port);
  }
  public function CreateDir($str){
    return ftp_mkdir($this->ftp,$str);
  }
  public function Disconnect(){
    if($this->ftp){
      ftp_quit($this->ftp);
      $ftp=0;
    }
  }
  public function Download($file,$local,$mode=FTP_BINARY){
    return ftp_get($this->ftp,$local,$file,$mode);
  }
  public function Downloada($file,$mode=FTP_BINARY){
    $str="";
    for($i=strlen($file)-1;$i>=0;$i--){
      $x=$file[$i];
      if(($x=="\\")||($x=="/")){
        break;
      }
      $str=$x.$str;
    }
    return $this->Download($file,$str,$mode);
  }
  ///Функция загружает удаленный файл с сервера FTP и сохраняет его содержимое в открытом файле
  public function DownloadInFile($file,$open,$mode=FTP_ASCII){
    return ftp_fget($this->ftp,$open,$file,$mode);
  }
  ///Дата последней модификации
  public function File_Date($file){
    return ftp_mdtm($this->ftp,$str);
  }
  public function File_Delete($file){
    return ftp_delete($this->ftp,$file);
  }
  //Проверка на существование файла/директории
  public function File_Exist($file,$dir=""){
    $ar=ftp_nlist($this->ftp,$dir);
    if(count($ar)==0){
      return false;
    }
    for($i=0;$i<count($ar);$i++){
      if($file==$ar[$i]){
        return true;
      }
    }
    return false;
  }
  public function File_Rename($file,$newName){
    return ftp_rename($this->ftp,$file,$newName);
  }
  public function File_Size($file){
    return ftp_size($this->ftp,$file);
  }
  public function Files($dir=""){
    return ftp_nlist($this->ftp,$dir);
  }
  public function FilesMax($dir=""){
    return ftp_rawlist($this->ftp,$dir);
  }
  public function isConnected(){
    return !(!$this->ftp);
  }
  public function Login($login,$password){
    return ftp_login($this->ftp, $login, $password);
  }
  public function Passiv($t=true){
    return ftp_pasv($this->ftp, $t);
  }
  public function RemoveDir($str){
    return ftp_rmdir($this->ftp,$str);
  }
  public function ThisDir(){
    return ftp_pwd($this->ftp);
  }
  public function ToHeadDir(){
    return ftp_cdup($this->ftp);
  }
  public function ToDir($str){
    return ftp_chdir($this->ftp,$str);
  }
  public function Upload($local,$file,$mode=FTP_BINARY){
    return ftp_put($this->ftp,$file,$local,$mode);
  }
  public function Uploada($local,$mode=FTP_BINARY){
    $str="";
    for($i=strlen($local)-1;$i>=0;$i--){
      $x=$local[$i];
      if(($x=="\\")||($x=="/")){
        break;
      }
      $str=$x.$str;
    }
    return $this->Upload($local,$str,$mode);
  }
  public function UploadDataFile($istream,$file,$mode=FTP_ASCII){
    return ftp_fput($this->ftp,$file,$istream,$mode);
  }
}
function setFolder(&$ftp,$folder){
	$ar=split("/",$folder);
	for($i=0;$i<count($ar);$i++){
		if(!$ftp->File_Exist($ar[$i])){

		} else{
			$ftp->ToDir($ar[$i]);
		}

	}
	return true;
}
function storyCreateMat(&$params,&$match){
	$user=new user();
	if(!$user->isAutorise()){
		return $lang["NOTUSER"];
	}
	if($user->Type()<1){
		return $lang["USERBANED"];
	}
	include appFolder.'/storyCreateMat/ftpConf.php';
	$ftp=new FTP("$host");
	$ftp->Login($login,$pass);
	$ftp->Passiv();

	if(!$ftp->isConnected()){
		echo 'Error #0001';
		exit;
	}
	setFolder($ftp, $fol.'token/');
	if (isset($_GET['token'])){
		if(!file_exists(pageFolder.'/'.$_GET['token'].'.php')){
			return 'You are not access.';
		}
		$f=file(pageFolder.'/'.$_GET['token'].'.php');
		$dat=ParseQuery($f);
		if($dat['userid']!=$user->ID()){
			if (user::getUser($dat['user'])->Type()>=$user->ID()){
				return 'You are not access.';
			}
		}
		$ftp->Upload(pageFolder.'/'.$_GET['token'].'.php',$_GET['token'].'.txt');
		return '<iframe src="http://'.$adr.'/pageGen.php?token='.$_GET['token'].'" width="100%" height="100%"></iframe>';
	}
	$name=md5(time());
	while(true){
		if(file_exists(pageFolder.'/'.$name.'.php')){
			$name=md5($name.'1');
		} else {
			break;
		}
	}
	$f=fopen(appFolder.'/storyCreateMat/'.$name.'.txt',"w");
	fwrite($f,'userid='.$user->ID().nr);
	fclose($f);
	$ftp->Uploada(appFolder.'/storyCreateMat/'.$name.'.txt');
	unlink(appFolder.'/storyCreateMat/'.$name.'.txt');
	return '<iframe src="http://'.$adr.'/pageGen.php?token='.$name.'" width="100%" height="100%"></iframe>';
}
 ?>
