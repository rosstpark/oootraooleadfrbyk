<?php
header("Content-Type: application/rss+xml; charset=ISO-8859-1");
include('PENGATURAN/config.php');
$servername = ''.$ssl.'://'.$_SERVER['HTTP_HOST'];
$direktori = ''.$niche.'';
$today = date("D, j M Y H:m:s")." +0000";
$handle = opendir($direktori);

while (false !== ($entry = readdir($handle))) {
	if ($entry != "." && $entry != "..") {		
		$data .= $entry."\n";		
		
	}	
}
closedir($handle);

$data = trim($data);
if ($data != "") {	
$data = explode ("\n", $data);

sort($data, SORT_NATURAL | SORT_FLAG_CASE);
//echo $data[0];
}
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
echo "<rss version=\"2.0\"
	xmlns:content=\"http://purl.org/rss/1.0/modules/content/\"
	xmlns:wfw=\"http://wellformedweb.org/CommentAPI/\"
	xmlns:dc=\"http://purl.org/dc/elements/1.1/\"
	xmlns:atom=\"http://www.w3.org/2005/Atom\"
	xmlns:sy=\"http://purl.org/rss/1.0/modules/syndication/\"
	xmlns:slash=\"http://purl.org/rss/1.0/modules/slash/\"	>";
echo "\n";
echo "<channel>";
echo "\n";
echo "<title>$site_name</title>
	<atom:link href=\"$servername/feed\" rel=\"self\" type=\"application/rss+xml\" />
	<link>$servername</link>
	<description>$site_description</description>
	<lastBuildDate>$today</lastBuildDate>
	<language>en-US</language>
	<sy:updatePeriod>hourly</sy:updatePeriod>
	<sy:updateFrequency>1</sy:updateFrequency>
	<generator>https://wordpress.org/?v=4.7.3</generator>";
echo "\n";
   foreach ($data as $judul) {
$judul = str_replace('.txt', 'rss', $judul);
$judul = str_replace('index.php', 'feed', $judul);

echo "\t<item>\n";
echo "\t\t<title>".$site_name." ".ucwords($judul)."</title>\n";
echo "\t\t<description>".$site_description." ".ucwords($judul)."</description>\n";
echo "\t\t<link>".$servername."/".str_replace(".txt", "", $judul)."</link>\n";
echo "\t\t<pubDate>".date("Y-m-d\TH:m:s+00:00", getTanggal($interval*$i))."</pubDate>\n";
echo "\t</item>\n";
}
echo "</channel>
</rss>";
function getTanggal($interval) {

$h = rand(0,23);

$m = rand(10,59); 

$s = rand(10,59); 

	
	$tanggal = date("d"); $bulan = date("m"); $tahun = date("Y");
	return mktime($interval,0,$s,$bulan,$tanggal,$tahun);
}
$interval = -1; //interval -5 jam ke belakang

?>