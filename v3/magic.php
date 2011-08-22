<?php

ini_set('display_errors','Off');
ini_set('log_errors','On');
error_reporting(E_ALL);

date_default_timezone_set('Europe/Helsinki');
define('RUOKALISTA_XPATH','/html/body/div[@class="content"]');

class Base{
	protected $html=NULL;
	protected $file=NULL;
	protected $url=NULL;

	public function getHtml(){
		return $this->html;
	}

	protected function getContent(){
		if(filter_var($this->url,FILTER_VALIDATE_URL)){
			$ch=curl_init();
			curl_setopt($ch,CURLOPT_URL,$this->url);
			curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
			curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,30);
			curl_setopt($ch,CURLOPT_TIMEOUT,30);
			$result=curl_exec($ch);
			curl_close($ch);
			if($result) return $result;
		}
	}

	protected function writeFile(){
		if(is_writable($this->file) && !empty($this->html)) file_put_contents($this->file,$this->html);
	}
}

class Menu extends Base{
	public function __construct(){
		$this->file='/home/sami/scripts/hamk.01.fi/menu.html';
		$this->url='http://hyria.fi/opiskelu/lounaskahvilat/ruokakellon_ruokalista/?printer=1';
		$this->fetch();
		if(empty($this->html)) $this->parse();
	}

	private function fetch(){
		if(is_readable($this->file) && time()-filemtime($this->file)<604800){
			$content=file_get_contents($this->file);
			if($content && !empty($content) && strpos($content,'vk '.date('W')*1)) $this->html=$content;
		}
	}

	private function parse(){
		$html=$this->getContent();
		if($html && !empty($html) && !strpos($html,'äivitetään') && strpos($html,'vk '.date('W')*1)){
			$html=str_replace(array('<br></p><p>','<br>','<br/>','</p><p>','</h1>','<BR>'),"\n",$html);
			$html=str_replace(array("\n\n\n","\n\n\n\n"),"\n\n",$html);
			$dom=new DOMDocument();
			if(@$dom->loadHTML($html)){
				$xpath=new DOMXPath($dom);
				if($xpath->evaluate(RUOKALISTA_XPATH)->length===1){
					$content=$xpath->query(RUOKALISTA_XPATH);
					if($content && !empty($content->item(0)->nodeValue)){
						$this->html="\t<section id=\"ruokalista\">\n\t\t<h2>Ruokalista</h2>\n<pre>".htmlspecialchars(strip_tags(trim($content->item(0)->nodeValue)),ENT_QUOTES,'UTF-8')."</pre>\n\t</section>\n";
						$this->writeFile();
					} else $this->html=NULL;
				}
			}
		}
	}
}

class Feeds extends Base{
	public function __construct(){
		$this->url='http://pipes.yahoo.com/pipes/pipe.run?_id=fe68c090fb31116cf15465324248b013&_render=json';
		$this->parse();
	}

	function parse(){
		$json=$this->getContent();
		if($json && !empty($json)){
			$json=json_decode($json);
			if(isset($json->{'count'}) && $json->{'count'}>0 && isset($json->{'value'}->{'items'})){
				ob_start();
				echo "\t<section id=\"ajankohtaista\">\n\t\t<h2>Ajankohtaista</h2>\n\t\t<ul>\n";
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
				echo "\t\t</ul>\n\t</section>\n";
				$this->html=ob_get_contents();
				ob_end_clean();
			}
		}
	}
}

class Page extends base{
	private $content;
	private $menu;
	private $feeds;
	public function __construct($menu=NULL,$feeds=NULL,$file='/var/www/hamk.01.fi/html/index.html'){
		$this->content=$menu.$feeds;
		$this->file=$file;
		$this->feeds=$feeds;
		$this->menu=$menu;
		if(!empty($this->content)) $this->doMagic();
	}

	public function __set($name,$value){
		$this->$name=$value;
	}

	private function parse(){
		ob_start();
		require 'template.php';
		$html=ob_get_clean();
		$this->html=$html;
	}

	public function doMagic(){
		$this->parse();
		$this->writeFile();
	}
}

try{
	$menu=new Menu();
	$feeds=new Feeds();
	if($menu->getHtml()!=NULL || $feeds->getHtml()!=NULL){
		$page=new Page($menu->getHtml(),$feeds->getHtml());
	} else throw new Exception('Feed and menu can\'t be null.');
} catch(Exception $e){
	file_get_contents('http://run.orangeapi.com/mail/sendMail.xml?id=1849d3c68d2&from=mail@orange.fr&to=smi@ovi.com&subject=HAMK&body='.urlencode($e->getMessage()));
}
?>