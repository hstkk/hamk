<?php
ini_set('display_errors','Off');
ini_set('log_errors','On');
error_reporting(E_ALL);

//Vakioiden määrittelyt, cahce ja haettavat tiedostot
define('RUOKALISTA','http://hyria.fi/opiskelu/lounaskahvilat/ruokakellon_ruokalista?printer=1');
define('RUOKALISTA_CACHE','/home/users/smi/sites/h.01.fi/cache/ruokalista');
define('RUOKALISTA_XPATH','/html/body/div[@class="content"]');
define('SYOTTEET','http://pipes.yahoo.com/pipes/pipe.run?_id=615dd12bd5324cf2588087a0aa9a5b59&_render=json');
define('SYOTTEET_CACHE','/home/users/smi/sites/h.01.fi/cache/syotteet');

//funktiot
function hae($url){
	$ch=curl_init();
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,30);
	curl_setopt($ch,CURLOPT_TIMEOUT,30);
	$result=curl_exec($ch);
	curl_close($ch);
	if($result) return $result;
	return false;
}

function tulostaRuokalista(){
	$html=hae(RUOKALISTA);
	if($html && !empty($html) && !strpos($html,'äivitetään') && strpos($html,'vk '.date('W')*1)){
		$html=str_replace(array('<br></p><p>','<br>','<br/>','</p><p>'),"\n",$html);
		$html=str_replace("\n\n\n","\n\n",$html);
		$dom=new DOMDocument();
		if(@$dom->loadHTML($html)){
			$xpath=new DOMXPath($dom);
			if($xpath->evaluate(RUOKALISTA_XPATH)->length===1){
				$content=$xpath->query(RUOKALISTA_XPATH);
				if($content && !empty($content->item(0)->nodeValue)){
					ob_start();
					echo '<pre>',htmlspecialchars(strip_tags(trim($content->item(0)->nodeValue)),ENT_QUOTES,'UTF-8'),"</pre>\n";
					$ruokalista=ob_get_contents();
					ob_end_clean();
					return $ruokalista;		
				}
			}
		}
	}
	return false;
}

function kirjoitaRuokalistaCache(){
	$day=date("N");
	if($day!=6 && $day!=7 && is_writable(RUOKALISTA_CACHE)){
		$ruokalista=tulostaRuokalista();
		if($ruokalista && !empty($ruokalista)) file_put_contents(RUOKALISTA_CACHE,$ruokalista);
	}
}

function haeRuokalista(){
	if(is_readable(RUOKALISTA_CACHE) && time()-filemtime(RUOKALISTA_CACHE)<604800){
		$ruokalista=file_get_contents(RUOKALISTA_CACHE);
		if($ruokalista && strpos($ruokalista,'vk '.date('W')*1)) echo $ruokalista;
	}
}

function tulostaSyotteet(){
	$json=hae(SYOTTEET);
	if($json && !empty($json)){
		$json=json_decode($json);
		if(isset($json->{'count'}) && $json->{'count'}>0 && isset($json->{'value'}->{'items'})){
			ob_start();
			echo "\t\t<ul>";
			foreach($json->{'value'}->{'items'} as $item){
				if(isset($item->title) && !empty($item->title) && isset($item->date) && !empty($item->date) && is_numeric(str_replace('-','',$item->date)) && isset($item->time) && !empty($item->time) && is_numeric(str_replace(array(':',' ','.'),'',$item->time))){
					$date=htmlspecialchars($item->date,ENT_QUOTES,'UTF-8');
					$time=htmlspecialchars($item->time,ENT_QUOTES,'UTF-8');
					$title=htmlspecialchars($item->title,ENT_QUOTES,'UTF-8');
					if(isset($item->link) && filter_var($item->link,FILTER_VALIDATE_URL)){
						$link=htmlspecialchars($item->link,ENT_QUOTES,'UTF-8');
						echo "\t\t\t<li><a href=\"$link\" title=\"$title\">$title <time datetime=\"$date\">$time</time></a></li>\n";
					}elseif(!isset($item->link)){
						echo "\t\t\t<li class=\"cal\"><time datetime=\"$date\">$time</time> $title</li>\n";
					}
				}
			}
			echo "\t\t</ul>";
			$syotteet=ob_get_contents();
			ob_end_clean();
			return $syotteet;
		}
	}
	return false;
}

function kirjoitaSyotteetCache(){
	if(is_writable(SYOTTEET_CACHE)){
		$syotteet=tulostaSyotteet();
		if($syotteet && !empty($syotteet)) file_put_contents(SYOTTEET_CACHE,$syotteet);
	}
}

function haeSyotteet(){
	if(is_readable(SYOTTEET_CACHE) && time()-filemtime(SYOTTEET_CACHE)<3600){
		$syotteet=file_get_contents(SYOTTEET_CACHE);
		if($syotteet && !empty($syotteet)) echo $syotteet;
	}
}

function cron(){
	$day=date("N");
	if($day!=6 && $day!=7){
		if(is_readable(RUOKALISTA_CACHE) && time()-filemtime(RUOKALISTA_CACHE)<604800){
			$ruokalista=file_get_contents(RUOKALISTA_CACHE);
			if(empty($ruokalista) || !strpos($ruokalista,'vk '.date('W')*1)) kirjoitaRuokalistaCache();
		}else kirjoitaRuokalistaCache();
	}
	kirjoitaSyotteetCache();
}
?>
