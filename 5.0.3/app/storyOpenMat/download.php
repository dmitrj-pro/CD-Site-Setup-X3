<?php
exit();
ob_start();
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
	$ar=split('/',$folder);
	for($i=0;$i<count($ar);$i++){
		if(!$ftp->File_Exist($ar[$i])){

		} else{
			$ftp->ToDir($ar[$i]);
		}

	}
	return true;
}



if(isset($_GET['f'])){
	if(!file_exists('token/'.$_GET['f'])){
		echo 'File is not found';
		exit();
	}
	$f=file('token/'.$_GET['f']);
	$filename=$f[1];
	$file_extension = strtolower(substr(strrchr($filename,"."),1));
	switch( $file_extension )
	{
		case "pdf": $ctype="application/pdf"; break;
		case "exe": $ctype="application/octet-stream"; break;
		case "zip": $ctype="application/zip"; break;
		case "doc": $ctype="application/msword"; break;
		case "xls": $ctype="application/vnd.ms-excel"; break;
		case "ppt": $ctype="application/vnd.ms-powerpoint"; break;
		case "mp3": $ctype="audio/mp3"; break;
		case "gif": $ctype="image/gif"; break;
		case "png": $ctype="image/png"; break;
		case "jpeg":
		case "jpg": $ctype="image/jpg"; break;
		default: $ctype="application/force-download";
	}
	header("Pragma: public");
	header("Expires: 0");
	header("Progma:no-cache");
	header("Cache-Control:no-store, no-cache, must-revalidate, post-check=0, pre-check=0");
	header("Cache-Control: private",false); // нужен для некоторых браузеров
	header("Content-Type: $ctype");
	header("Content-Disposition: attachment; filename=\"".basename($filename)."\";" );
	header("Content-Transfer-Encoding: binary");
print_r($f);

	$ftp_host="call-of-dead.narod.ru";
	$ftp_user="ocall-of-dead";
	$ftp_pass="lbvfy53790";
	$systemFolder="s2";

	$ftp=new FTP("$ftp_host");
	$ftp->Login($ftp_user,$ftp_pass);
	$ftp->Passiv();
	if(!$ftp->isConnected()){
		echo 'Error #0001';
		exit;
	}
	setFolder($ftp, 's2/dpfiledata');
	$ftp->Download('1.txt',$f[1]);

ob_get_clean();
	echo file_get_contents($f[1]);
unlink($f[1]);
	    exit();

	//$f1=fopen($f[1],"w");
	//fwrite($f1,file_get_contents($f[0]));
	//unlink('token/'.$_GET['f']);

}
 ?>
