<?php
function storyCreateMat(&$params,&$match){
	$fil=file(appFolder.'/storyCreateMat/lang.txt');
	$lang=ParseQuery($fil);
	$user=new user();
	if(!$user->isAutorise()){
		return $lang["NOTUSER"];
	}
	if($user->Type()<1){
		return $lang["USERBANED"];
	}
	return 'Add is Close.';
	if(isset($_POST['create'])){
		$user=new user();
		$params=array();
		$params['appid']='storyOpenMat';
		$params['pagetitle']=$_POST['poName'];
		$params['userid']=$user->ID();

		$imgName=array();
		$k=0;
		for ($i=0; $i<=count($_FILES['imgFile']['name']); $i++) {
    		$uploadfile ='files/'.basename($_FILES['imgFile']['name'][$i]);
			$name=$_FILES['imgFile']['name'][$i];
			$type='';
			for($j=strlen($name)-1;$j>0;$j--){
				if($name[$j]=='.'){
					break;
				}
				$type=$name[$j].$type;
			}
			if(($type=='jpg') || ($type=='png')){
				$imgName[$k++]=$name;
			    copy($_FILES['imgFile']['tmp_name'][$i], $uploadfile);
			}
		}
		$str='';
		for($i=0;$i<$k;$i++){
			$str.=$imgName[$i];
			if($i!=($k-1)){
				$str.=':';
			}
		}




		$params['imageFiles']=$str;
		if ($_FILES['lfile']['name']!=''){
			$uploadfile = 'files/'.basename($_FILES['lfile']['name']);
			$name=$_FILES['lfile']['name'];
			$type='';
			for($i=strlen($name)-1;$i>0;$i--){
				if($name[$i]=='.'){
					break;
				}
				$type=$name[$i].$type;
			}
			if(($type=='rar') || ($type=='zip')){
				copy($_FILES['lfile']['tmp_name'], $uploadfile);

				fwrite($f,'LinuxFile='.$uploadfile.nr);
				fwrite($f,"LinuxInfo=".$_POST['ltext'].nr);
			}
		}
		if ($_FILES['wfile']['name']!=''){
			$uploadfile = 'files/'.basename($_FILES['wfile']['name']);
			$name=$_FILES['wfile']['name'];
			$type='';
			for($i=strlen($name)-1;$i>0;$i--){
				if($name[$i]=='.'){
					break;
				}
				$type=$name[$i].$type;
			}
			if(($type=='rar') || ($type=='zip')){
				copy($_FILES['wfile']['tmp_name'], $uploadfile);
				fwrite($f,'WinFile='.$uploadfile.nr);
				fwrite($f,"WinInfo=".$_POST['wtext'].nr);
			}
		}
		if ($_FILES['afile']['name']!=''){
			$uploadfile = 'files/'.basename($_FILES['afile']['name']);
			$name=$_FILES['afile']['name'];
			$type='';
			for($i=strlen($name)-1;$i>0;$i--){
				if($name[$i]=='.'){
					break;
				}
				$type=$name[$i].$type;
			}
			if(($type=='rar') || ($type=='zip')){
				copy($_FILES['afile']['tmp_name'], $uploadfile);
				fwrite($f,'AndroidFile='.$uploadfile.nr);
				fwrite($f,"AndroidInfo=".$_POST['atext'].nr);
			}
		}
		if ($_FILES['mfile']['name']!=''){
			$uploadfile = 'files/'.basename($_FILES['mfile']['name']);
			$name=$_FILES['mfile']['name'];
			$type='';
			for($i=strlen($name)-1;$i>0;$i--){
				if($name[$i]=='.'){
					break;
				}
				$type=$name[$i].$type;
			}
			if(($type=='rar') || ($type=='zip')){
				copy($_FILES['mfile']['tmp_name'], $uploadfile);
				fwrite($f,'MacFile='.$uploadfile.nr);
				fwrite($f,"MacInfo=".$_POST['mtext'].nr);
			}
		}
		if ($_FILES['ofile']['name']!=''){
			$uploadfile = 'files/'.basename($_FILES['ofile']['name']);
			$name=$_FILES['ofile']['name'];
			$type='';
			for($i=strlen($name)-1;$i>0;$i--){
				if($name[$i]=='.'){
					break;
				}
				$type=$name[$i].$type;
			}
			if(($type=='rar') || ($type=='zip')){
				copy($_FILES['ofile']['tmp_name'], $uploadfile);
				fwrite($f,'OtherFile='.$uploadfile.nr);
				fwrite($f,"OtherInfo=".$_POST['otext'].nr);
			}
		}


		fwrite($f,"{pagedata}".nr);
		fwrite($f,$_POST["PODATA"]);
		fclose($f);
		echo 'Material is Created';
	} else {
			$res=
				//form
				GenText($lang['formheader'],array(0=>'POST')).nr.
				//Input Name Program
				$lang['PONAME'].':'.GenText($lang['input'],array(0=>'text',1=>"poName",2=>$data['pagetitle'])).nr.$lang['endl'].
				//Add Image
				$lang['POImage'].':'.GenText($lang['uploadimage'],array(0=>'imgFile')).nr.$lang['endl'].
				//Detals
				$lang['PODetals'].GenText($lang['textarea'],array(0=>'30',1=>"30",2=>"PODATA",3=>'')).nr.$lang['endl'];
				//Language

				//link
				//$lang['POLINK'].GenText($lang['input'],array(0=>'hidden',1=>"MAX_FILE_SIZE",2=>"60000")).nr.
				if($data['LinuxFile']!=''){
					$res.=$lang['Linux'].GenText($lang['input'],array(0=>'text',1=>"lfile",2=>$data['LinuxFile'])).nr.
						$lang['Info'].GenText($lang['input'],array(0=>'text',1=>"ltext",2=>$data['LinuxInfo'])).nr.$lang['endl'];
				} else {
					$res.=$lang['Linux'].GenText($lang['input'],array(0=>'file',1=>"lfile",2=>$data['LinuxFile'])).nr.
						$lang['Info'].GenText($lang['input'],array(0=>'text',1=>"ltext",2=>'')).nr.$lang['endl'];
				}
				if ($data['WinFile']!=''){
					$res.=$lang['Windows'].GenText($lang['input'],array(0=>'text',1=>"wfile",2=>$data['WinFile'])).nr.
						$lang['Info'].GenText($lang['input'],array(0=>'text',1=>"wtext",2=>$data['WinInfo'])).nr.$lang['endl'];
				}else {
					$res.=$lang['Windows'].GenText($lang['input'],array(0=>'file',1=>"wfile",2=>'')).nr.
						$lang['Info'].GenText($lang['input'],array(0=>'text',1=>"wtext",2=>$data['WinInfo'])).nr.$lang['endl'];
				}
				if($data['AndroidFile']!=''){
					$res.=$lang['Android'].GenText($lang['input'],array(0=>'text',1=>"afile",2=>$data['AndroidFile'])).nr.
						$lang['Info'].GenText($lang['input'],array(0=>'text',1=>"atext",2=>$data['AndroidInfo'])).nr.$lang['endl'];
				} else {
					$res.=$lang['Android'].GenText($lang['input'],array(0=>'file',1=>"afile",2=>'')).nr.
						$lang['Info'].GenText($lang['input'],array(0=>'text',1=>"atext",2=>'')).nr.$lang['endl'];
				}
				if($data['MacFile']!=''){
					$res.=$lang['Mac'].GenText($lang['input'],array(0=>'text',1=>"mfile",2=>$data['MacFile'])).nr.
						$lang['Info'].GenText($lang['input'],array(0=>'text',1=>"mtext",2=>$data['MacInfo'])).nr.$lang['endl'];
				}else {
					$res.=$lang['Mac'].GenText($lang['input'],array(0=>'file',1=>"mfile",2=>'')).nr.
						$lang['Info'].GenText($lang['input'],array(0=>'text',1=>"mtext",2=>'')).nr.$lang['endl'];
				}
				if($data['OtherFile']!=''){
					$res.=$lang['Other'].GenText($lang['input'],array(0=>'text',1=>"ofile",2=>$data['OtherFile'])).nr.
						$lang['Info'].GenText($lang['input'],array(0=>'text',1=>"otext",2=>$data['OtherInfo'])).nr.$lang['endl'];
				} else {
					$res.=$lang['Other'].GenText($lang['input'],array(0=>'file',1=>"ofile",2=>'')).nr.
						$lang['Info'].GenText($lang['input'],array(0=>'text',1=>"otext",2=>'')).nr.$lang['endl'];
				}
				$res.=GenText($lang['input'],array(0=>'submit',1=>"create",2=>$lang['ADD'])).nr.
				$lang['formend'];
				echo $res;
	}

}
 ?>
