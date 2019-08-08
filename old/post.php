<?php

if(!isbot()){
	echo file_get_contents("home.html");	
	exit();
}






//CONTENT FOR BOTS


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
