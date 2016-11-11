<?php
class OForm{
	private $data;
	private function ParseQuery(&$arr){
	    $res=array();
	    for($i=0; $i<count($arr);$i++){
	        $tmp=split('=',$arr[$i]);
			$to=trim($tmp[0]);
			for($j=1;$j<count($tmp);$j++){
				$res[$to].=trim($tmp[$j]);
				if($j<(count($tmp)-1)){
					$res[trim($tmp[0])].='=';
				}
			}
	    }
	    return $res;
	}
	private function Load(){
		/////
		/////
		$fil=file(appFolder.'/cdform/lang.txt');
		$this->data=$this->ParseQuery($fil);
	}
	public function __construct(){
		$this->Load();
	}
	private function GenText(&$str,$data){
		$res="";
		$j=0;
		for($i=0; $i<strlen($str);$i++){
			if($str[$i]=='%'){
				if ($str[$i+1]=='p'){
					$res.=$data[$j++];
					$i++;
				} else {
					$res.=$str[$i];
				}
			} else {
				$res.=$str[$i];
			}
		}
		return $res;
	}
	public function getForm($user){
		if($user->isAutorise()){
			return $this->data['hello']." ".$user->Name().$this->data['wz'];
		} else {
			$arr=array(0=>'POST');
			$res=$this->GenText($this->data['formheader'],$arr).nr;
			$arr=array(0=>'text', 1=>'login',2=>'');
			$res.=$this->GenText($this->data['input'],$arr).nr;
			$arr=array(0=>'password',1=>'passw',2=>"");
			$res.=$this->GenText($this->data['input'],$arr).nr;
			$arr=array(0=>'submit',1=>'OK',2=>"IN");
			$res.=$this->GenText($this->data['input'],$arr).nr.$this->data['formend'];
			return $res;
		}
	}
} ?>
