<?php
$sitemap='https://myprogram.us/sitemap.xml';

$data=file_get_contents($sitemap);
$tmp=split('<loc>',$data);
$fullAdr=array();
$adr=array();
$j=0;
function rus2translit($string) {
    $converter = array(
        'а' => 'a',   'б' => 'b',   'в' => 'v',
        'г' => 'g',   'д' => 'd',   'е' => 'e',
        'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
        'и' => 'i',   'й' => 'y',   'к' => 'k',
        'л' => 'l',   'м' => 'm',   'н' => 'n',
        'о' => 'o',   'п' => 'p',   'р' => 'r',
        'с' => 's',   'т' => 't',   'у' => 'u',
        'ф' => 'f',   'х' => 'h',   'ц' => 'c',
        'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
        'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',
        'э' => 'e',   'ю' => 'yu',  'я' => 'ya',

        'А' => 'A',   'Б' => 'B',   'В' => 'V',
        'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
        'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
        'И' => 'I',   'Й' => 'Y',   'К' => 'K',
        'Л' => 'L',   'М' => 'M',   'Н' => 'N',
        'О' => 'O',   'П' => 'P',   'Р' => 'R',
        'С' => 'S',   'Т' => 'T',   'У' => 'U',
        'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
        'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
        'Ь' => '\'',  'Ы' => 'Y',   'Ъ' => '\'',
        'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
    );
    return strtr($string, $converter);
}
for($i=1;$i<count($tmp);$i++){
	$r=split('</loc>',$tmp[$i]);
	$fullAdr[$j++]=$r[0];
	if(stristr($r[0],'https://myprogram.us/money/')){
		$name=substr($r[0],strlen('https://myprogram.us/money/'));
		$page=$r[0];
		if(strstr($name,'/')){
			$iks=split('/',$name);
			$ttmp='data';
			for($ii=0;$ii<count($iks)-1;$ii++){
				$ttmp.='/'.rus2translit($iks[$ii]);
				if(!file_exists($ttmp)){
					mkdir($ttmp);
				}
			}
			$ttmp.='/'.rus2translit($iks[count($iks)-1]).'.php';
			if(file_exists($ttmp)){
				continue;
			} else {
				$page=file_get_contents($page);
				$f=fopen($ttmp,"w");
				fwrite($f,"appid=cdcontent\n");
				fwrite($f,"pagetitle=".trim(split('</h2>',(split('<h2 itemprop="name">',$page)[1]))[0])."\n");
				fwrite($f,"{pagedata}\n");
				fwrite($f,split('</div>',(split('<div itemprop="articleBody">',$page)[1]))[0]);
				fclose($f);
			}
		} else {
			$ttmp='data/'.rus2translit($name).'.php';
			if(file_exists($ttmp)){
				continue;
			} else {
				$page=file_get_contents($page);
				$f=fopen($ttmp,"w");
				fwrite($f,"appid=cdcontent\n");
				fwrite($f,"pagetitle=".trim(split('</h2>',(split('<h2 itemprop="name">',$page)[1]))[0])."\n");
				fwrite($f,"{pagedata}\n");
				fwrite($f,split('</div>',(split('<div itemprop="articleBody">',$page)[1]))[0]);
				fclose($f);
			}
		}

	}
}



?>
