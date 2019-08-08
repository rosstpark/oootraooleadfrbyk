<?php
function bing_template(){
$html_template= '<a href="{img_source}" title="{img_title}"><img src="{img_url}" alt="{img_title}" title="{img_title}"/></a><br>image thumb: {img_thumb}<br>url agc: http://domain.com/search{url_agc}<br>image title: {img_title}<br>image info: {img_info}<br>image source: {img_source}';
return $html_template;
}

function bing_images($opl,$jumlah=1,$nomer=0){
$url = 'http://www.bing.com:80/images/search?q='.urlencode($opl).'&qft=+filterui:imagesize-large&safe=off';
     $data = curl_init();
     curl_setopt($data, CURLOPT_RETURNTRANSFER, 1);
     curl_setopt($data, CURLOPT_URL, $url);
     $hasil = curl_exec($data);
     curl_close($data);
$senjaya = explode('class="item">',$hasil);

for ($i=1;$i<=20;$i++) {
$fokus= explode('" class="thumb"', $senjaya[$i]);
$a_a= str_replace('<a href="', '', $fokus[0]);
$k_t_t= explode('<div class="des">', $fokus[1]);
$k_t_t= explode('</div><div class="fileInfo">', $k_t_t[1]);
$t_t= trim(preg_replace('/[^a-z0-9]+/i', ' ', $k_t_t[0]),' ');
$f_i= preg_replace('/\<\/.*/i', '', $k_t_t[1]);
$t_h= explode('src="', $fokus[1]);
$t_h= preg_replace('/\"\/\>.*/i', '', $t_h[1]);
$s_c= explode('href="', $fokus[1]);
$s_c= preg_replace('/\".*/i', '', $s_c[1]);
$u_l_c= '/'.strtolower(str_replace(' ', '-', $t_t));
$hasil_all[]= array('img_url' => $a_a, 'img_title' => $t_t, 'img_info' => $f_i, 'img_thumb' => $t_h, 'img_source' => $s_c, 'url_agc' => $u_l_c);
}
$template= bing_template();
$ca_ga= array('{img_url}','{img_title}','{img_info}','{img_thumb}','{img_source}', '{url_agc}');
if($jumlah == 1 && $nomer < 20){
$cut_has= $hasil_all[$nomer];
$html_kel= str_replace($ca_ga, array($cut_has['img_url'],$cut_has['img_title'],$cut_has['img_info'],$cut_has['img_thumb'],$cut_has['img_source'],$cut_has['url_agc']), $template);
return $html_kel;
}elseif($jumlah > 1 && $jumlah <= 20){
$cut_hass= array_slice($hasil_all,0,$jumlah);
$kolp= array();
foreach($cut_hass as $cut_has){
$kolp[]= str_replace($ca_ga, array($cut_has['img_url'],$cut_has['img_title'],$cut_has['img_info'],$cut_has['img_thumb'],$cut_has['img_source'],$cut_has['url_agc']), $template);
}
return implode('', $kolp);
}else{
$cut_has= $hasil_all[0];
$html_kel= str_replace($ca_ga, array($cut_has['img_url'],$cut_has['img_title'],$cut_has['img_info'],$cut_has['img_thumb'],$cut_has['img_source'],$cut_has['url_agc']), $template);
return $html_kel;
}
}

?>