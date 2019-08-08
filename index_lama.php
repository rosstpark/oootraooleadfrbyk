<?php
//settings
$cache_ext  = '.html'; //file extension
$cache_time     = 43200;  //Cache file expires after these seconds (1 hour = 3600 sec) (8 hour = 28800 sec) (12 hour = 43200 sec) (24 hour = 86400 sec)
$cache_folder   = 'cache/'; //folder to store Cache files
$ignore_pages   = array('', '');

$dynamic_url    = 'http://'.$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . $_SERVER['QUERY_STRING']; // requested dynamic page (full url)
$cache_file     = $cache_folder.md5($dynamic_url).$cache_ext; // construct a cache file
$ignore = (in_array($dynamic_url,$ignore_pages))?true:false; //check if url is in ignore list

if (!$ignore && file_exists($cache_file) && time() - $cache_time < filemtime($cache_file)) { //check Cache exist and it's not expired.
    ob_start('ob_gzhandler'); //Turn on output buffering, "ob_gzhandler" for the compressed page with gzip.
    readfile($cache_file); //read Cache file
    echo '<!-- cached page - '.date('l jS \of F Y h:i:s A', filemtime($cache_file)).', Page : '.$dynamic_url.' -->';
    ob_end_flush(); //Flush and turn off output buffering
    exit(); //no need to proceed further, exit the flow.
}
//Turn on output buffering with gzip compression.
ob_start('ob_gzhandler');
?>
<?php include('siteconfig.php'); ?>
<!doctype html>
<html>
    <head>
		<!-- Meta -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width">
		<title><?php echo $homepage_title; ?></title>
		<meta name="description" content="<?php echo $homepage_desc; ?>" />
		<meta name="keywords" content="<?php echo $site_keywords; ?>" />
		<meta property="og:site_name" content="<?php echo $site_title; ?>"/>
		<meta property="og:type" content="website"/>
		<meta property="og:title" content="<?php echo $homepage_title; ?>"/>
		<meta property="og:description" content="<?php echo $homepage_desc; ?>"/>
		<!-- CSS and Scripts -->
		<?php include 'includes/headscripts.php'; ?>
		<?php include 'ads/head_code.php'; ?>
    </head>
<body class="whiteback">
<?php include 'includes/header.php'; ?>
<?php
function cano($s){
	$s = $output = trim(preg_replace(array("`'`", "`[^a-z0-9]+`"),  array("", "-"), strtolower($s)), "-");
	return $s;
}
?> 




<div class="pagetitle" style="clear: both;">
<h1><?php echo $featbooks_title;?></h1>
</div>
<?php 
$data = file_get_contents('https://itunes.apple.com/lookup?id='.$featbook_id1.'&entity=ebook&country='.$site_country.'');
$response = json_decode($data);

$artist_title = $response->results[0]->artistName;
$coll_title = $response->results[0]->trackName;
$main_image = preg_replace('/100x100bb.jpg/ms', "270x270bb.jpg", $response->results[0]->artworkUrl100);
?>
<div class="col-md-6" style="padding: 0px;">
<div class="featbox box1">
<div class="featimage">
<a href="<?php echo $site_url;?>/book/<?php echo $response->results[0]->trackId;?>/<?php echo cano($response->results[0]->trackName);?>"><img data-src="<?php echo $main_image?>" src="<?php echo $site_url?>/images/loading.svg" width="180px" height="270px" alt="<?php echo $response->results[0]->trackName;?>"></a>
<?php if(isset($response->results[0]->averageUserRating) and !empty($response->results[0]->averageUserRating)): ?>
        <div class="feat-rating">
		<div class="score"><span><?php echo $score_mpage;?>: <?php echo $response->results[0]->averageUserRating;?></span></div>
		<div class="bigstarbox">
        <span class="bigstars"><?php echo $response->results[0]->averageUserRating;?></span>
		</div>
		<div class="scorecount"><span><?php echo $from_mpage;?> <?php echo number_format($response->results[0]->userRatingCount);?> <?php echo $ratings_mpage;?></span></div>
		</div>
<?php endif; ?>
</div>
<h3><?php echo $coll_title;?></h1>
<h4><?php echo $byartist_mpage?> <?php echo $artist_title;?></h2>
<ul style="list-style:none;padding: 0px;">
<li><b><?php echo $release_mpage;?>:</b> <?php echo substr($response->results[0]->releaseDate,0,10);?></li>
<li><b><?php echo $genre_mpage;?>:</b> <?php echo $response->results[0]->genres[0];?></li>
</ul>
<p>
<?php $feat_descr = strip_tags($response->results[0]->description); ?>
<?php echo substr($feat_descr,0,530); ?>...
</p>
<a href="<?php echo $site_url;?>/book/<?php echo $response->results[0]->trackId;?>/<?php echo cano($response->results[0]->trackName);?>" style="margin-right: 10px;" class="btn btn-raised btn-warning"><?php echo $rmore_title;?></a>
</div>
</div>
<!--end col-md-6 -->

<?php 
$data = file_get_contents('https://itunes.apple.com/lookup?id='.$featbook_id2.'&entity=ebook&country='.$site_country.'');
$response = json_decode($data);

$artist_title = $response->results[0]->artistName;
$coll_title = $response->results[0]->trackName;
$main_image = preg_replace('/100x100bb.jpg/ms', "270x270bb.jpg", $response->results[0]->artworkUrl100);
?>
<div class="col-md-6" style="padding: 0px;">
<div class="featbox box2">
<div class="featimage">
<a href="<?php echo $site_url;?>/book/<?php echo $response->results[0]->trackId;?>/<?php echo cano($response->results[0]->trackName);?>"><img data-src="<?php echo $main_image?>" src="<?php echo $site_url?>/images/loading.svg" width="180px" height="270px" alt="<?php echo $response->results[0]->trackName;?>"></a>
<?php if(isset($response->results[0]->averageUserRating) and !empty($response->results[0]->averageUserRating)): ?>
        <div class="feat-rating">
		<div class="score"><span><?php echo $score_mpage;?>: <?php echo $response->results[0]->averageUserRating;?></span></div>
		<div class="bigstarbox">
        <span class="bigstars"><?php echo $response->results[0]->averageUserRating;?></span>
		</div>
		<div class="scorecount"><span><?php echo $from_mpage;?> <?php echo number_format($response->results[0]->userRatingCount);?> <?php echo $ratings_mpage;?></span></div>
		</div>
<?php endif; ?>
</div>
<h3><?php echo $coll_title;?></h1>
<h4><?php echo $byartist_mpage?> <?php echo $artist_title;?></h2>
<ul style="list-style:none;padding: 0px;">
<li><b><?php echo $release_mpage;?>:</b> <?php echo substr($response->results[0]->releaseDate,0,10);?></li>
<li><b><?php echo $genre_mpage;?>:</b> <?php echo $response->results[0]->genres[0];?></li>
</ul>
<p>
<?php $feat_descr = strip_tags($response->results[0]->description); ?>
<?php echo substr($feat_descr,0,530); ?>...
</p>
<a href="<?php echo $site_url;?>/book/<?php echo $response->results[0]->trackId;?>/<?php echo cano($response->results[0]->trackName);?>" style="margin-right: 10px;" class="btn btn-raised btn-warning"><?php echo $rmore_title;?></a>
</div>
</div>
<!--end col-md-6 -->

<?php 
$data = file_get_contents('https://itunes.apple.com/lookup?id='.$featbook_id3.'&entity=ebook&country='.$site_country.'');
$response = json_decode($data);

$artist_title = $response->results[0]->artistName;
$coll_title = $response->results[0]->trackName;
$main_image = preg_replace('/100x100bb.jpg/ms', "270x270bb.jpg", $response->results[0]->artworkUrl100);
?>
<div class="col-md-6" style="padding: 0px;">
<div class="featbox box3">
<div class="featimage">
<a href="<?php echo $site_url;?>/book/<?php echo $response->results[0]->trackId;?>/<?php echo cano($response->results[0]->trackName);?>"><img data-src="<?php echo $main_image?>" src="<?php echo $site_url?>/images/loading.svg" width="180px" height="270px" alt="<?php echo $response->results[0]->trackName;?>"></a>
<?php if(isset($response->results[0]->averageUserRating) and !empty($response->results[0]->averageUserRating)): ?>
        <div class="feat-rating">
		<div class="score"><span><?php echo $score_mpage;?>: <?php echo $response->results[0]->averageUserRating;?></span></div>
		<div class="bigstarbox">
        <span class="bigstars"><?php echo $response->results[0]->averageUserRating;?></span>
		</div>
		<div class="scorecount"><span><?php echo $from_mpage;?> <?php echo number_format($response->results[0]->userRatingCount);?> <?php echo $ratings_mpage;?></span></div>
		</div>
<?php endif; ?>
</div>
<h3><?php echo $coll_title;?></h1>
<h4><?php echo $byartist_mpage?> <?php echo $artist_title;?></h2>
<ul style="list-style:none;padding: 0px;">
<li><b><?php echo $release_mpage;?>:</b> <?php echo substr($response->results[0]->releaseDate,0,10);?></li>
<li><b><?php echo $genre_mpage;?>:</b> <?php echo $response->results[0]->genres[0];?></li>
</ul>
<p>
<?php $feat_descr = strip_tags($response->results[0]->description); ?>
<?php echo substr($feat_descr,0,530); ?>...
</p>
<a href="<?php echo $site_url;?>/book/<?php echo $response->results[0]->trackId;?>/<?php echo cano($response->results[0]->trackName);?>" style="margin-right: 10px;" class="btn btn-raised btn-warning"><?php echo $rmore_title;?></a>
</div>
</div>
<!--end col-md-6 -->

<?php 
$data = file_get_contents('https://itunes.apple.com/lookup?id='.$featbook_id4.'&entity=ebook&country='.$site_country.'');
$response = json_decode($data);

$artist_title = $response->results[0]->artistName;
$coll_title = $response->results[0]->trackName;
$main_image = preg_replace('/100x100bb.jpg/ms', "270x270bb.jpg", $response->results[0]->artworkUrl100);
?>
<div class="col-md-6" style="padding: 0px;">
<div class="featbox box4">
<div class="featimage">
<a href="<?php echo $site_url;?>/book/<?php echo $response->results[0]->trackId;?>/<?php echo cano($response->results[0]->trackName);?>"><img data-src="<?php echo $main_image?>" src="<?php echo $site_url?>/images/loading.svg" width="180px" height="270px" alt="<?php echo $response->results[0]->trackName;?>"></a>
<?php if(isset($response->results[0]->averageUserRating) and !empty($response->results[0]->averageUserRating)): ?>
        <div class="feat-rating">
		<div class="score"><span><?php echo $score_mpage;?>: <?php echo $response->results[0]->averageUserRating;?></span></div>
		<div class="bigstarbox">
        <span class="bigstars"><?php echo $response->results[0]->averageUserRating;?></span>
		</div>
		<div class="scorecount"><span><?php echo $from_mpage;?> <?php echo number_format($response->results[0]->userRatingCount);?> <?php echo $ratings_mpage;?></span></div>
		</div>
<?php endif; ?>
</div>
<h3><?php echo $coll_title;?></h1>
<h4><?php echo $byartist_mpage?> <?php echo $artist_title;?></h2>
<ul style="list-style:none;padding: 0px;">
<li><b><?php echo $release_mpage;?>:</b> <?php echo substr($response->results[0]->releaseDate,0,10);?></li>
<li><b><?php echo $genre_mpage;?>:</b> <?php echo $response->results[0]->genres[0];?></li>
</ul>
<p>
<?php $feat_descr = strip_tags($response->results[0]->description); ?>
<?php echo substr($feat_descr,0,530); ?>...
</p>
<a href="<?php echo $site_url;?>/book/<?php echo $response->results[0]->trackId;?>/<?php echo cano($response->results[0]->trackName);?>" style="margin-right: 10px;" class="btn btn-raised btn-warning"><?php echo $rmore_title;?></a>
</div>
</div>
<!--end col-md-6 -->

<?php 
$data = file_get_contents('https://itunes.apple.com/lookup?id='.$featbook_id5.'&entity=ebook&country='.$site_country.'');
$response = json_decode($data);

$artist_title = $response->results[0]->artistName;
$coll_title = $response->results[0]->trackName;
$main_image = preg_replace('/100x100bb.jpg/ms', "270x270bb.jpg", $response->results[0]->artworkUrl100);
?>
<div class="col-md-6" style="padding: 0px;">
<div class="featbox box5">
<div class="featimage">
<a href="<?php echo $site_url;?>/book/<?php echo $response->results[0]->trackId;?>/<?php echo cano($response->results[0]->trackName);?>"><img data-src="<?php echo $main_image?>" src="<?php echo $site_url?>/images/loading.svg" width="180px" height="270px" alt="<?php echo $response->results[0]->trackName;?>"></a>
<?php if(isset($response->results[0]->averageUserRating) and !empty($response->results[0]->averageUserRating)): ?>
        <div class="feat-rating">
		<div class="score"><span><?php echo $score_mpage;?>: <?php echo $response->results[0]->averageUserRating;?></span></div>
		<div class="bigstarbox">
        <span class="bigstars"><?php echo $response->results[0]->averageUserRating;?></span>
		</div>
		<div class="scorecount"><span><?php echo $from_mpage;?> <?php echo number_format($response->results[0]->userRatingCount);?> <?php echo $ratings_mpage;?></span></div>
		</div>
<?php endif; ?>
</div>
<h3><?php echo $coll_title;?></h1>
<h4><?php echo $byartist_mpage?> <?php echo $artist_title;?></h2>
<ul style="list-style:none;padding: 0px;">
<li><b><?php echo $release_mpage;?>:</b> <?php echo substr($response->results[0]->releaseDate,0,10);?></li>
<li><b><?php echo $genre_mpage;?>:</b> <?php echo $response->results[0]->genres[0];?></li>
</ul>
<p>
<?php $feat_descr = strip_tags($response->results[0]->description); ?>
<?php echo substr($feat_descr,0,530); ?>...
</p>
<a href="<?php echo $site_url;?>/book/<?php echo $response->results[0]->trackId;?>/<?php echo cano($response->results[0]->trackName);?>" style="margin-right: 10px;" class="btn btn-raised btn-warning"><?php echo $rmore_title;?></a>
</div>
</div>
<!--end col-md-6 -->

<?php 
$data = file_get_contents('https://itunes.apple.com/lookup?id='.$featbook_id6.'&entity=ebook&country='.$site_country.'');
$response = json_decode($data);

$artist_title = $response->results[0]->artistName;
$coll_title = $response->results[0]->trackName;
$main_image = preg_replace('/100x100bb.jpg/ms', "270x270bb.jpg", $response->results[0]->artworkUrl100);
?>
<div class="col-md-6" style="padding: 0px;">
<div class="featbox box6">
<div class="featimage">
<a href="<?php echo $site_url;?>/book/<?php echo $response->results[0]->trackId;?>/<?php echo cano($response->results[0]->trackName);?>"><img data-src="<?php echo $main_image?>" src="<?php echo $site_url?>/images/loading.svg" width="180px" height="270px" alt="<?php echo $response->results[0]->trackName;?>"></a>
<?php if(isset($response->results[0]->averageUserRating) and !empty($response->results[0]->averageUserRating)): ?>
        <div class="feat-rating">
		<div class="score"><span><?php echo $score_mpage;?>: <?php echo $response->results[0]->averageUserRating;?></span></div>
		<div class="bigstarbox">
        <span class="bigstars"><?php echo $response->results[0]->averageUserRating;?></span>
		</div>
		<div class="scorecount"><span><?php echo $from_mpage;?> <?php echo number_format($response->results[0]->userRatingCount);?> <?php echo $ratings_mpage;?></span></div>
		</div>
<?php endif; ?>
</div>
<h3><?php echo $coll_title;?></h1>
<h4><?php echo $byartist_mpage?> <?php echo $artist_title;?></h2>
<ul style="list-style:none;padding: 0px;">
<li><b><?php echo $release_mpage;?>:</b> <?php echo substr($response->results[0]->releaseDate,0,10);?></li>
<li><b><?php echo $genre_mpage;?>:</b> <?php echo $response->results[0]->genres[0];?></li>
</ul>
<p>
<?php $feat_descr = strip_tags($response->results[0]->description); ?>
<?php echo substr($feat_descr,0,530); ?>...
</p>
<a href="<?php echo $site_url;?>/book/<?php echo $response->results[0]->trackId;?>/<?php echo cano($response->results[0]->trackName);?>" style="margin-right: 10px;" class="btn btn-raised btn-warning"><?php echo $rmore_title;?></a>
</div>
</div>
<!--end col-md-6 -->
<script src="<?php echo $site_url;?>/js/imglazyload.js"></script>
<script>
			//lazy loading
			$('.col-md-6 img').imgLazyLoad({
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
<script language="JavaScript" type="text/javascript" src="<?php echo $site_url;?>/js/bigstar-rating.js"></script>
<script type="text/javascript" language="JavaScript">
jQuery(function() {
           jQuery('span.bigstars').bigstars();
      });
</script>
<script>
$(document).ready(function(){

	// hide #back-top first
	$("#back-top").hide();
	
	// fade in #back-top
	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 200) {
				$('#back-top').fadeIn();
			} else {
				$('#back-top').fadeOut();
			}
		});

		// scroll body to 0px on click
		$('#back-top a').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});

});
</script>
<p id="back-top"><a href="#top"><i class="material-icons">keyboard_arrow_up</i></a></p>
</div><!-- end .container -->
<?php include 'includes/footer.php'; ?>

<?php
$root = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
$site_url = parse_url($root);
$domain = str_replace('www.','',$site_url['host']); 


$file = 'domain.txt';
if (!file_exists($file)){
	fopen($file, 'w') or die('Cannot open file:  '.$file); //implicitly creates file
}


$arr = file($file,FILE_IGNORE_NEW_LINES);
if (!in_array($domain,$arr))
{
	$docp = file_put_contents($file, $domain. PHP_EOL, FILE_APPEND);
}

?>
</body>
</html>
<?php
######## Your Website Content Ends here #########

if (!is_dir($cache_folder)) { //create a new folder if we need to
    mkdir($cache_folder);
}
if(!$ignore){
    $fp = fopen($cache_file, 'w');  //open file for writing
    fwrite($fp, ob_get_contents()); //write contents of the output buffer in Cache file
    fclose($fp); //Close file pointer
}
ob_end_flush(); //Flush and turn off output buffering

?>