<?php
date_default_timezone_set('Europe/Luxembourg');
include('config.php');

function random_keyword(){
$all_file= glob("kata/*.txt");
$one_file= $all_file[array_rand($all_file)];
$get_file= explode("\n", file_get_contents($one_file));
$in_file= array_unique(array_filter($get_file));
shuffle($in_file);
return $in_file;
}

function is_bot(){
	if(!isset($_SERVER['HTTP_USER_AGENT'])){
	return false;
	}
	if(empty($_SERVER['HTTP_USER_AGENT'])){
	return false;
	}
$patern= 'duckduckgo|bot|google|bing|yahoo|msn|image|preview|partner|bingpreview|bingbot|msnbot|woobot|internetVista|openlinkprofiler|spbot|baidu|acunetix|fhscan';
return preg_match('/('.$patern.')/i', $_SERVER['HTTP_USER_AGENT']);
}

function canonical(){
if (isset($_SERVER['HTTPS']) &&
    ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||
    isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
    $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
  $protokol = 'https://';
}
else {
  $protokol = 'http://';
}
return $protokol.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
}

function tanggal($kurang=1, $tipe='Y m d'){
return date($tipe, mktime(0, 0, 0, date("m"), date("d")-$kurang, date("Y")));
}




function rss_curl($keyword){
$folder= dirname(__FILE__)."/SAMPAHKU";
//bikin folder
  if(!file_exists($folder)){
$oldmask = umask(0);
mkdir($folder, 0777);
umask($oldmask);
  }
//end bikin folder
	$second_folder= $folder.'/'.substr(md5($keyword),0,2);
//bikin folder
  if(!file_exists($second_folder)){
$oldmask = umask(0);
mkdir($second_folder, 0777);
umask($oldmask);
  }
//end bikin folder
$posisi_cache= $second_folder.'/'.md5($keyword).'.cache';
	if(file_exists($posisi_cache)){
		$cache= unserialize(file_get_contents($posisi_cache));
		return $cache;
	}
      
    $data = curl_init();
	$header[0] = "Accept: text/xml,application/xml,application/xhtml+xml,";
	$header[0] .= "text/html;q=0.9,text/plain;q=0.8,image/png,*/*;q=0.5";
	$header[] = "Cache-Control: max-age=0";
	$header[] = "Connection: keep-alive";
	$header[] = "Keep-Alive: 300";
	$header[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
	$header[] = "Accept-Language: en-us,en;q=0.5";
	$header[] = "Pragma: "; // browsers keep this blank.
	
         curl_setopt($data, CURLOPT_SSL_VERIFYHOST, FALSE);
         curl_setopt($data, CURLOPT_SSL_VERIFYPEER, FALSE);
         curl_setopt($data, CURLOPT_URL, 'http://www.bing.com:80/search?q='.urlencode($keyword).'&format=rss&count=50');
	 curl_setopt($data, CURLOPT_USERAGENT, 'msnbot/1.1 (+http://search.msn.com/msnbot.htm)');
	 curl_setopt($data, CURLOPT_HTTPHEADER, $header);
	 curl_setopt($data, CURLOPT_REFERER, 'https://www.ask.com');
	 curl_setopt($data, CURLOPT_ENCODING, 'gzip,deflate');
	 curl_setopt($data, CURLOPT_AUTOREFERER, true);
	 curl_setopt($data, CURLOPT_RETURNTRANSFER, 1);
	 curl_setopt($data, CURLOPT_CONNECTTIMEOUT, 8);
	 curl_setopt($data, CURLOPT_TIMEOUT, 8);
	 curl_setopt($data, CURLOPT_MAXREDIRS, 2);

     $hasil = @simplexml_load_string(curl_exec($data));
     curl_close($data);	

	 if(!isset($hasil->channel->item->{0}->title)){
	 return NULL;
	 }
	 
	 if(empty($hasil->channel->item->{0}->title)){
	 return NULL;
	 }
	 
$has_arr= array();	 
foreach($hasil->channel->item as $item){
$clean_titleku= trim(preg_replace("![^a-z0-9]+!i", " ", $item->title));
$jumjum_title= str_word_count($clean_titleku);
	if($jumjum_title > 3){
$has['title']= strtolower($clean_titleku);
$has['description']= strtolower(trim(preg_replace("![^a-z0-9]+!i", " ", $item->description)));
$has_arr[]= $has;
	}
}
		$ffff= fopen($posisi_cache, "w");
		fwrite($ffff, serialize($has_arr));
		fclose($ffff);
		
    return $has_arr;
}


function home_url(){
if (isset($_SERVER['HTTPS']) &&
    ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||
    isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
    $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
  $protokol = 'https://';
}
else {
  $protokol = 'http://';
}
	if(isset($_SERVER['HTTP_HOST']) && !empty($_SERVER['HTTP_HOST'])){
	return $protokol.$_SERVER['HTTP_HOST'];
	}else{
	return $protokol.$_SERVER['SERVER_NAME'];
	}
}


function getDomainFromUrl($url) {//buat referer
    if (preg_match('/(?:https?:\/\/)?(?:(?:[^@]*@)|(?:[^:]*:[^@]*@))?(?:www\.)?([^\/:]+)/', $url, $parts)) {
        return $parts[0];
    }
    return false;
}

function bad_bots(){
if(!isset($_SERVER['HTTP_USER_AGENT'])){
return true;
}
if(empty($_SERVER['HTTP_USER_AGENT'])){
return true;
}
return preg_match('/(wget|curl|yandex)/i', $_SERVER['HTTP_USER_AGENT']);
}

//blockir bad bots
	if(bad_bots()){
	exit();
	}

//get kw
