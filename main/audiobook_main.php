<?php 
include('siteconfig.php');
function cano($s){
	$s = $output = trim(preg_replace(array("`'`", "`[^a-z0-9]+`"),  array("", "-"), strtolower($s)), "-");
	return $s;
}
$link = $_GET['link'];
$link = explode("/", $link);

$link_id = $link[0];
$data = file_get_contents('https://itunes.apple.com/lookup?id='.$link_id.'&entity=audiobook&country='.$site_country.'');
$response = json_decode($data);

if ($response->resultCount == '0') {
$data = file_get_contents('https://itunes.apple.com/lookup?id='.$link_id.'&entity=audiobook');
$response = json_decode($data);
}

$item_title = $response->results[0]->collectionName . ' - ' .$response->results[0]->artistName;
$artist_id = $response->results[0]->artistId;
$artist_title = $response->results[0]->artistName;
$coll_title = $response->results[0]->collectionName;
$coll_title2 = $response->results[0]->collectionName;
$coll_title2 = str_replace(' ', '-', $coll_title2);

$genre_title = $response->results[0]->primaryGenreName;
$main_image = preg_replace('/100x100bb.jpg/ms', "180x180bb.jpg", $response->results[0]->artworkUrl100);
$geo_link = preg_replace('/itunes/ms', "geo.itunes", $response->results[0]->collectionViewUrl);
?>
<!doctype html>
<html>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width">
		<title><?php echo $item_title;?> PDF EPUB AUDIOBOOK TELECHARGER DOWNLOAD - <?php echo $audiobpage_title;?> - <?php echo $site_title;?></title>
		<meta name="description" content="Telecharger <?php echo $item_title;?> PDF EPUB MP3 DOWNLOAD <?php echo $audiobpage_title?> - <?php echo $site_title;?>" />
		<meta name="keywords" content="<?php echo $item_title;?>, <?php echo $site_keywords;?>" />
		<meta property="og:site_name" content="<?php echo $site_title; ?>"/>
		<meta property="og:type" content="website"/>
		<meta property="og:title" content="<?php echo $item_title;?> PDF EPUB AUDIOBOOK TELECHARGER DOWNLOAD - <?php echo $audiobpage_title;?> - <?php echo $site_title;?>"/>
		<meta property="og:description" content="Telecharger <?php echo $item_title;?>  PDF EPUB MP3 DOWNLOAD - <?php echo $audiobpage_title;?> - <?php echo $site_title;?>"/>
		<meta property="og:image" content="<?php echo $main_image;?>">
		<!-- CSS and Scripts -->
		<?php include 'includes/headscripts.php'; ?>
		<!-- Player -->
		<link rel="stylesheet" type="text/css" href="<?php echo $site_url;?>/player/360player.css" />
		<script type="text/javascript" src="<?php echo $site_url;?>/player/script/berniecode-animator.js"></script>
		<script type="text/javascript" src="<?php echo $site_url;?>/player/script/soundmanager2.js"></script>
		<script type="text/javascript" src="<?php echo $site_url;?>/player/script/360player.js"></script>
		<script type="text/javascript">
		soundManager.url = '<?php echo $site_url;?>/player/swf/';
		soundManager.defaultOptions.volume = 50;
		</script>
		<?php include 'ads/head_code.php'; ?>
	  
    </head>
<body>

<?php include 'includes/header.php'; ?>

<div class="container">
<div class="col-md-8" style="margin-top: 30px;padding-left:0px;">
<div class="postmain">

<div class="headpageimage">
<img data-src="<?php echo $main_image?>" src="<?php echo $site_url?>/images/loading.svg" width="180px" height="180px" alt="<?php echo $item_title?>">
</div>
<div class="headpageinfo">
<h1 class="product-title"><?php echo $coll_title;?></h1>
<h2 class="product-stock"><?php echo $byartist_mpage?> <?php echo $artist_title;?></h2>
<ul style="list-style:none;padding: 0px;">
<li><b><?php echo $release_mpage;?>:</b> <?php echo substr($response->results[0]->releaseDate,0,10);?></li>
<li><b><?php echo $genre_mpage;?>:</b> <?php echo $response->results[0]->primaryGenreName;?></li>
<li style="color: #777777;"><?php echo substr($response->results[0]->copyright,0,90);?></a></li>
</ul>
</div>
<div class="postactions">
<?php if(isset($itunes_id) and !empty($itunes_id)): ?>
<a href="<?php echo $geo_link; ?>&at=<?php echo $itunes_id;?>" target="_blank" style="margin-right: 10px;" class="btn btn-raised btn-warning"><?php echo $response->results[0]->collectionPrice;?> <?php echo $itunelink_mpage;?></a>
<?php endif; ?>
<?php if(isset($amazon_id) and !empty($amazon_id)): ?>

<a href="/<?php echo $coll_title2;?>.pdf" target="_blank" class="btn btn-raised btn-danger"><?php echo $amazonlink_mpage2;?></a>
<a href="/<?php echo $coll_title2;?>.rtf" target="_blank" class="btn btn-raised btn-danger"><?php echo $amazonlink_mpage3;?></a>
<a href="/<?php echo $coll_title2;?>.doc" target="_blank" class="btn btn-raised btn-danger"><?php echo $amazonlink_mpage4;?></a>
<a href="/<?php echo $coll_title2;?>.pdf" target="_blank" class="btn btn-raised btn-danger"><?php echo $amazonlink_mpage5;?></a>
<?php endif; ?>
<div style="margin-top: 10px;display: inline-block;float: right;">
<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
<a class="addthis_button_preferred_1"></a>
<a class="addthis_button_preferred_2"></a>
<a class="addthis_button_preferred_3"></a>
<a class="addthis_button_compact"></a>
</div>
</div>
</div>


<div class="postmaintitle" style="margin-top: 20px;margin-bottom: 15px;">
<h3><?php echo $prevhead_mpage;?></h3>
</div>

<div class="table-responsive">
<table class="table table-hover">
    <thead>
      <tr>
		<th></th>
		<th></th>
        <th style="font-weight: 500;"><?php echo $previewtitle_mpage;?></th>
		<th style="font-weight: 500;"><?php echo $previewartist_mpage;?></th>
        <th></th>
      </tr>
    </thead>
    <tbody>  

<tr>
	<td>1</td>
	<td><div class="ui360"><a href="<?php echo $response->results[0]->previewUrl;?>"></a></div></td>
	<td><?php echo substr($coll_title,0,40); ?></td>
	<td><?php echo $artist_title; ?></td>
	<?php if(isset($itunes_id) and !empty($itunes_id)): ?>
	<td><a style="margin: 0px 0px;float: right;" class="btn btn-raised btn-warning btn-sm" href="<?php echo $geo_link; ?>&at=<?php echo $itunes_id;?>" target="_blank"><?php echo $response->results[0]->currency;?> <?php echo $response->results[0]->collectionPrice; ?></a></td>
	<?php endif; ?>
</tr>

</tbody>
</table> 
</div>

</div>
<!-- end .postmain -->

<?php 
$postad = file_get_contents("ads/singlepage_ad_728x90.php",NULL);
if(isset($postad) and !empty($postad)): ?>
<div style="margin:0px 0px 20px 0px;">
<?php echo $postad; ?>
</div>
<?php endif; ?>

<?php if(isset($disqus_shortname) and !empty($disqus_shortname)): ?>
<div class="postmain">
<div class="postmaintitle">
<h3><?php echo $commentbox_mpage;?></h3>
</div>
<div class="videocomments">
<div id="disqus_thread"></div>
<script type="text/javascript">
    /* * * CONFIGURATION VARIABLES * * */
    var disqus_shortname = '<?php echo $disqus_shortname;?>';
    
    /* * * DON'T EDIT BELOW THIS LINE * * */
    (function() {
        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
        dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
</div>
</div>
<?php endif; ?>

<!-- end .postmain -->
</div>
<!-- .post-sidebar -->
<div class="col-md-4" style="padding-right:0px;">
<div class="post-sidebar">
<div class="post-sidebar-box">
<?php 
$sidead = file_get_contents("ads/sidebar_ad_336x280.php",NULL);
if(isset($sidead) and !empty($sidead)): ?>
<div style="margin:0px 0px 20px 0px;">
<?php echo $sidead; ?>
</div>
<?php endif; ?>
<h3><?php echo $morebyartist_mpage;?> <?php echo $artist_title;?></h3>
<ul class="side-itemlist">
<?php
$data_al = file_get_contents('https://itunes.apple.com/lookup?id='.$artist_id.'&entity=audiobook');
$response_al = json_decode($data_al);

if (isset($response_al->results) and $response_al->results == true){
foreach ($response_al->results as $result_al)
{
	if ($result_al->wrapperType == 'audiobook') {
	echo '<li class="side-item audiob-item"><div class="side-thumb" style="width:100px;"><a href="'.$site_url.'/audiobook/'.$result_al->collectionId.'/'.cano($result_al->collectionName).'"><img data-src="'.$result_al->artworkUrl100.'" src="'.$site_url.'/images/loading.svg"></a></div>
	<div class="info"><h3><a href="'.$site_url.'/audiobook/'.$result_al->collectionId.'/'.cano($result_al->collectionName).'">'.$result_al->collectionName.'</a></h3>
		<h4>'.$result_al->artistName.'</h4>
		</div>
	</li>';
	}
}
}
?>
</ul>

</div>

</div>
</div>
<!-- end .post-sidebar -->
</div>
<script src="<?php echo $site_url;?>/js/imglazyload.js"></script>
<script>
			//lazy loading
			$('.container img').imgLazyLoad({
				// jquery selector or JS object
				container: window,
				// jQuery animations: fadeIn, show, slideDown
				effect: 'fadeIn',
				// animation speed
				speed: 600,
				// animation delay
				delay: 400,
				// callback function
				callback: function(){}
			});
</script>
<?php include "includes/footer.php"; ?>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=<?php echo $addthis_id;?>"></script>
</body>
</html>