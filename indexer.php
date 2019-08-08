<?php
$today = date("D, j M Y H:m:s")." +0000";
include('PENGATURAN/config.php');
$servername = ''.$ssl.'://'.$_SERVER['HTTP_HOST'];
$direktori = $_SERVER['DOCUMENT_ROOT'].'/'.$niche.'/';

$url = $_SERVER['REQUEST_URI'];

$xml = explode('/', $url);

$xml = str_replace('rss', '.txt', $xml[1]);


$interval = -1; //interval -5 jam ke belakang


$urls=@file($direktori.$xml,FILE_IGNORE_NEW_LINES|FILE_SKIP_EMPTY_LINES) or die('gagal baca list');


header("Content-Type: application/rss+xml; charset=ISO-8859-1");
print '<?xml version="1.0" encoding="UTF-8"?><rss version="2.0"
	xmlns:content="http://purl.org/rss/1.0/modules/content/"
	xmlns:wfw="http://wellformedweb.org/CommentAPI/"
	xmlns:dc="http://purl.org/dc/elements/1.1/"
	xmlns:atom="http://www.w3.org/2005/Atom"
	xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
	xmlns:slash="http://purl.org/rss/1.0/modules/slash/"	>

<channel>
	<title>'.$site_name.'</title>
	<atom:link href="'.$servername.'/feed" rel="self" type="application/rss+xml" />
	<link>'.$servername.'</link>
	<description>'.$site_description.'</description>
	<lastBuildDate>'.$today.'</lastBuildDate>
	<language>en-US</language>
	<sy:updatePeriod>hourly</sy:updatePeriod>
	<sy:updateFrequency>1</sy:updateFrequency>
	<generator>https://wordpress.org/?v=4.7.3</generator>';
echo "\n";
$priority = '0.5';
foreach ($urls as $link) {

echo "\t<item>\n";
echo "\t\t<title>".ucwords($link)."</title>\n";
echo "\t\t<description>".ucwords($link)."</description>\n";
echo "\t\t<link>".$servername."/".seo_friendly_url($link).".pdf</link>\n";
echo "\t\t<pubDate>".date("Y-m-d\TH:m:s+00:00", getTanggal($interval*$i))."</pubDate>\n";
echo "\t</item>\n";
}
print'</channel>
</rss>';

		
		
		
		
		
function seo_friendly_url($string) {    
include('PENGATURAN/config.php');
$string = $linkfont($string);  
return 	str_replace (' ',''.$linkstyle.'',$string);
}

function getTanggal($interval) {

$h = rand(0,23);

$m = rand(10,59); 

$s = rand(10,59); 

	
	$tanggal = date("d"); $bulan = date("m"); $tahun = date("Y");
	return mktime($interval,0,$s,$bulan,$tanggal,$tahun);
}

?>