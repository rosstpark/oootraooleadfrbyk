<?php
$all= glob("kata/*.txt");
shuffle($all);

echo '<div style="display:none">';

foreach($all as $file){
$file= str_replace(array('kata/', '.txt'), '', $file);
$file= str_replace(' ', '-_-', $file);
 echo '<a href="/page/'.$file.'" title="file '.$file.'">'.$file.'</a> | ';
}

echo '</div>';
?>