<?php

if(!isbot()){
	echo file_get_contents("home.html");	
	exit();
}






//CONTENT FOR BOTS


$alltxt= glob("kata/*.txt");
shuffle($alltxt);
$thistxt= $alltxt[0];

$allarray= file_get_contents($thistxt);
$allarray= array_filter(explode("\n", $allarray));
shuffle($allarray);
//$data= array_slice($allarray,0,20);
$data=$allarray;
$content='';
	foreach($data as $items){
		$items= trim($items);
		$slugsq= trim(str_replace('/', '-', $items),'-');
		$slugsq= trim(str_replace(' ', '-', $slugsq),'-');
		$pathsq= substr(md5($slugsq),0,5);
		$content .= '<a href="http://'.$_SERVER['SERVER_NAME'].'/'.$slugsq.'.pdf">'.$items.'</a> <BR>';
	}

echo $content;

$all= glob("kata/*.txt");
shuffle($all);

echo '<div style="display:yes">';

foreach($all as $file){
$file= str_replace(array('kata/', '.txt'), '', $file);
$file= str_replace(' ', '-_-', $file);
 echo '<a href="/page/'.$file.'" title="file '.$file.'">'.$file.'</a> | ';
}

echo '</div>';






function isbot(){
if(!isset($_SERVER['HTTP_USER_AGENT'])){
return false;
}
if(empty($_SERVER['HTTP_USER_AGENT'])){
return false;
}
return preg_match('/(google|googlebot|bing|msn|bingbot|yahoo|surlp)/i', $_SERVER['HTTP_USER_AGENT']);
}
