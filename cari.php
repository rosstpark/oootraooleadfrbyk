<?php echo randomKeywords();?>

<?php
function randomKeywords(){
$alltxt= glob("cari/*.txt");
shuffle($alltxt);
$thistxt= $alltxt[0];

$allarray= file_get_contents($thistxt);
$allarray= array_filter(explode("\n", $allarray));
shuffle($allarray);
$data= array_slice($allarray,0,999);
$content='';
foreach($data as $items){
$items= trim($items);
$slugsq= trim(str_replace('/', '-', $items),'-');
$slugsq= trim(str_replace(' ', '-', $slugsq),'-');
$pathsq= substr(md5($slugsq),0,5);
$content .= '<a href="https://'.$_SERVER['SERVER_NAME'].'/search/books/'.$slugsq.'">https://'.$_SERVER['SERVER_NAME'].'/search/books/'.$slugsq.'</a> <br> ';
}
return $content;
}

?>
