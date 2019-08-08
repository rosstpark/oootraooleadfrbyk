<?php
include('PENGATURAN/config.php');

function getTanggal($interval) {
$h = rand(0,23);

$m = rand(10,59); 

$s = rand(10,59); 

	
	$tanggal = date("d"); $bulan = date("m"); $tahun = date("Y");
	return mktime($interval,0,$s,$bulan,$tanggal,$tahun);
}

$today = date("D, j M Y H:m:s")." +0000";
$servername = ''.$ssl.'://'.$_SERVER['HTTP_HOST'];





function AgcFeed() {




	if (file_exists('best.txt')) {
$i=1;
$interval = -1; //interval -5 jam ke belakang

		$myfile = fopen("best.txt", "r") or die("Unable to open file!");
		include('PENGATURAN/config.php');		
		while( $i < $feed) {
			$seek = rand(0, filesize("best.txt"));
			if ($seek > 0) {
				fseek($myfile, $seek);
				fgets($myfile);
			}
			$kiwot = fgets($myfile);
			if (!empty($kiwot)) {
				include('PENGATURAN/config.php');
                		$domain = ''.$ssl.'://'.$_SERVER['HTTP_HOST'];
				$kiwot = trim(preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $kiwot), ' ');
				$kiwot = str_replace(array('@','#','$','&','%','^','*'),'',$kiwot);
				$url = $linkfont($kiwot);
				$url =  ltrim(rtrim($url));
				$url = str_replace (' ',''.$linkstyle.'',$url);
				//$judul = preg_replace("/^(\w+\s)/", "", $kiwot);	
		
		print '<item>
		<title>'.ucwords($kiwot).'</title>
		<description>'.ucwords($kiwot).'</description>
		<link>'.$domain.''.$slugpost.'/'.$url.'.html</link>
		<pubDate>'.date("Y-m-d\TH:m:s+00:00", getTanggal($interval*$i)).'</pubDate>
		</item>';
		
		
	
			}
			$i++;
		}
		
		fclose($myfile);
}


}
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
	<generator>AGCMASTERCLASS.COM</generator>';
	
	
echo AgcFeed();

print'</channel>
</rss>';

?>
