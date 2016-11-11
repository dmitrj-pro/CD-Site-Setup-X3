<?php
if(isset($_GET['f'])){
	define('nr',"\n");
	$file=$_GET['f'];
	include 'conf.php';
	mysql_connect($host, $user, $pass); /*Подключение к серверу*/
	mysql_select_db($bd); /*Подключение к базе данных на сервере*/
	$query = "SELECT * FROM files where id='$file'";
	$res = mysql_query($query);
	include '../storyCreateMat/ftpConf.php';
	include '../storyCreateMat/pageGen.php';
	$ftp=new FTP("$host");
	$ftp->Login($login,$pass);
	$ftp->Passiv();

	if(!$ftp->isConnected()){
		echo 'Error #0001';
		exit;
	}
	setFolder($ftp, $fol.'token/');
	while($row = mysql_fetch_array($res))
	{
		$f=fopen('tmp.txt',"w");
		fwrite($f,$server2.'dpfiledata/'.$file.'.txt'.nr);
		//fwrite($f,$file.'.txt'.nr);
		fwrite($f,$row['name']);
		fclose($f);
		$ftp->Upload('tmp.txt',$file);
		header("Location:http://$adr"."download.php?f=".$file);
	}
}
 ?>
