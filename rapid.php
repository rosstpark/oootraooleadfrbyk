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
				$judul = preg_replace("/^(\w+\s)/", "", $kiwot);	
		
		print '<li><a href="'.$domain.''.$slugpost.'/'.$url.'">'.$domain.''.$slugpost.'/'.$url.'</a></li>
';
		
		
	
			}
			$i++;
		}
		
		fclose($myfile);
}


}
		
echo AgcFeed();

?>
