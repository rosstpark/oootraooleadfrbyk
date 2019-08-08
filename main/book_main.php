<?php 
include('siteconfig.php');
function cano($s){
	$s = $output = trim(preg_replace(array("`'`", "`[^a-z0-9]+`"),  array("", "-"), strtolower($s)), "-");
	return $s;
}
$link = $_GET['link'];
$link = explode("/", $link);

$link_id = $link[0];
$data = file_get_contents('https://itunes.apple.com/lookup?id='.$link_id.'&entity=ebook&country='.$site_country.'');
$response = json_decode($data);

if ($response->resultCount == '0') {
$data = file_get_contents('https://itunes.apple.com/lookup?id='.$link_id.'&entity=ebook');
$response = json_decode($data);
}

$item_title = $response->results[0]->trackName . ' - ' .$response->results[0]->artistName;
$artist_id = $response->results[0]->artistId;
$artist_title = $response->results[0]->artistName;
$coll_title = $response->results[0]->trackName;
$coll_title2 = $response->results[0]->trackName;
$coll_title2 = str_replace(' ', '-', $coll_title2);

$genre_title = $response->results[0]->primaryGenreName;
$main_image = preg_replace('/100x100bb.jpg/ms', "270x270bb.jpg", $response->results[0]->artworkUrl100);
$geo_link = preg_replace('/itunes/ms', "geo.itunes", $response->results[0]->trackViewUrl);
?>
<!doctype html>
<html>
    <head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width">
		<title>Telecharger <?php echo $item_title;?> PDF EPUB <?php echo $bookpage_title;?> - <?php echo $site_title;?></title>
		<meta name="description" content="Telecharger  <?php echo $item_title;?> <?php echo $bookpage_title?> - <?php echo $site_title;?>" />
		<meta name="keywords" content="<?php echo $item_title;?>, <?php echo $site_keywords;?>" />
		<meta property="og:site_name" content="<?php echo $site_title; ?>"/>
		<meta property="og:type" content="website"/>
		<meta property="og:title" content="Telecharger <?php echo $item_title;?> PDF EPUB <?php echo $bookpage_title;?> - <?php echo $site_title;?>"/>
		<meta property="og:description" content="[PDF EPUB] Telecharger <?php echo $item_title;?> <?php echo $bookpage_title;?> - <?php echo $site_title;?>"/>
		<meta property="og:image" content="<?php echo $main_image;?>">
                <meta name="googlebot-image" content="noindex, nofollow">

		<!-- CSS and Scripts -->
		<?php include 'includes/headscripts.php'; ?>
		<?php include 'ads/head_code.php'; ?>
	  
    </head>    
<body>

<?php include 'includes/header.php'; ?>

<div class="container">
<div class="col-md-8" style="margin-top: 30px;padding-left:0px;">
<div class="postmain">

<div class="headpageimage">
<img data-src="<?php echo $main_image?>" src="<?php echo $site_url?>/images/loading.svg" width="180px" height="270px" alt="<?php echo $item_title?>">
</div>
<div class="headpageinfo">
<h1 class="product-title"><?php echo $coll_title;?></h1>
<h2 class="product-stock"><?php echo $byartist_mpage?> <?php echo $artist_title;?></h2>
<ul style="list-style:none;padding: 0px;">
<li><b><?php echo $release_mpage;?>:</b> <?php echo substr($response->results[0]->releaseDate,0,10);?></li>
<li><b><?php echo $genre_mpage;?>:</b> <?php echo $response->results[0]->genres[0];?></li>
</ul>
</div>
<?php if(isset($response->results[0]->averageUserRating) and !empty($response->results[0]->averageUserRating)): ?>
        <div class="product-rating">
		<div class="score"><span>Score: <?php echo $response->results[0]->averageUserRating;?></span></div>
		<div class="bigstarbox">
        <span class="bigstars"><?php echo $response->results[0]->averageUserRating;?></span>
		</div>
		<div class="scorecount"><span>From <?php echo number_format($response->results[0]->userRatingCount);?> Ratings</span></div>
		</div>
<?php endif; ?>



<div class="postactions">
<?php if(isset($itunes_id) and !empty($itunes_id)): ?>
<a href="<?php echo $geo_link; ?>&at=<?php echo $itunes_id;?>" target="_blank" style="margin-right: 10px;" class="btn btn-raised btn-warning"><?php echo $response->results[0]->formattedPrice;?> <?php echo $itunelink_mpage;?></a>
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

<div class="postmaintitle" style="margin-bottom: 15px;">
<h3><?php echo $descriphead_mpage;?></h3>
</div>
<div class="postmaindescr">
<p>
<?php echo $response->results[0]->description;?>
</p>
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

<?php 
$jsonurl = "https://itunes.apple.com/$site_country/rss/customerreviews/page=1/id=$link_id/sortBy=mostRecent/json";
$json = file_get_contents($jsonurl,0,null,null);
$json_output = json_decode($json);

$counter = 0;
$max = 21;
if (!empty($json_output->feed->entry)) {
echo '<div class="postmain">
<div class="postmaintitle">
<h3>'.$reviewshead_mpage.'</h3>
</div>

<div id="reviews">
<ul style="list-style:none;padding: 0px;">';
foreach ( $json_output->feed->entry as $entry )
{
if ($counter++ == 0) continue;
	if ($counter < $max) {
	echo "<li>";
	echo "<h4 class=\"tit\">{$entry->title->label}</h4>\n";
	echo '<div class="starbox"><span class="stars">'.$entry->{'im:rating'}->label.'</span></div>';
	echo "<div class=\"auth\">{$reviewsby_mpage} {$entry->author->name->label}</div>\n";
	echo "<div class=\"cont\">{$entry->content->label}</div>\n";
	echo "</li>\n";
	}
    $counter++;	
}
echo '</ul>
</div>
</div>
<!-- end .postmain -->';
}
else {}
?>


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
<h3><?php echo $morebyartist_mpage;?> : <?php echo $artist_title;?></h3>
<ul class="side-itemlist">
<?php
$data_al = file_get_contents('https://itunes.apple.com/lookup?id='.$artist_id.'&entity=ebook');
$response_al = json_decode($data_al);

if (isset($response_al->results) and $response_al->results == true){
foreach ($response_al->results as $result_al)
{
	if ($result_al->kind == 'ebook') {
	echo '<li class="side-item"><div class="side-thumb"><a href="'.$site_url.'/book/'.$result_al->trackId.'/'.cano($result_al->trackName).'"><img data-src="'.$result_al->artworkUrl100.'" src="'.$site_url.'/images/loading.svg" ></a></div>
	<div class="info"><h3><a href="'.$site_url.'/book/'.$result_al->trackId.'/'.cano($result_al->trackName).'">'.$result_al->trackName.'</a></h3>
		<h4>'.$result_al->artistName.'</h4>';
		if (isset($result_al->averageUserRating) and $result_al->averageUserRating == true){
		echo '<div class="starbox"><span class="stars">'.$result_al->averageUserRating.'</span></div>';
		}
	echo '</div>
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
<script language="JavaScript" type="text/javascript" src="<?php echo $site_url;?>/js/bigstar-rating.js"></script>
<script type="text/javascript" language="JavaScript">
jQuery(function() {
           jQuery('span.bigstars').bigstars();
      });
</script>
<script language="JavaScript" type="text/javascript" src="<?php echo $site_url;?>/js/star-rating.js"></script>
<script type="text/javascript" language="JavaScript">
      jQuery(function() {
           jQuery('span.stars').stars();
      });
</script>
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