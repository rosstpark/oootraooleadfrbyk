<?php include('siteconfig.php');
if(isset($_GET['change'])){ header("Location: ".$site_url."/search/".$_GET['entity']."/".urlencode($_GET['q'])); }
function cano($s){
	$s = $output = trim(preg_replace(array("`'`", "`[^a-z0-9]+`"),  array("", "-"), strtolower($s)), "-");
	return $s;
}
$entity_id = $_GET['entity'];
$search_term = $_GET['q'];
$encode_search_term = urlencode($search_term);
$search_term = htmlspecialchars($search_term);
$search_term = str_replace("+", " ", $search_term);
$page_title = $searchresults_title;
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width">
		<title><?php echo $page_title; ?> <?php echo $search_term; ?> - <?php echo $site_title; ?></title>
		<meta name="description" content="<?php echo $page_title; ?> <?php echo $search_term; ?> - <?php echo $site_title; ?>" />
		<meta name="keywords" content="<?php echo $site_keywords; ?>" />
		<meta property="og:site_name" content="<?php echo $site_title; ?>"/>
		<meta property="og:type" content="website"/>
		<meta property="og:title" content="<?php echo $page_title; ?> <?php echo $search_term; ?> - <?php echo $site_title; ?>"/>
		<meta property="og:description" content="<?php echo $page_title; ?> <?php echo $search_term; ?> - <?php echo $site_title; ?>"/>
		<!-- CSS and Scripts -->
		<?php include 'includes/headscripts.php'; ?>
		<?php include 'ads/head_code.php'; ?>
	</head>
<body class="whiteback">
<?php include 'includes/header.php'; ?> 

<?php 
$catad = file_get_contents("ads/category_top_ad_728x90.php",NULL);
if(isset($catad) and !empty($catad)): ?>
<div class="pagetopbox">
<center>
<?php echo $catad; ?>
</center>
</div>
<?php endif; ?>

<div class="container">
<div class="pagetitle">
<h1><?php echo $page_title; ?>: <?php echo $search_term; ?></h1>
</div>
<div class="pageresults">
<ul class="page-itemlist">
<?php
if ($entity_id == 'books') {
$data_al = file_get_contents('https://itunes.apple.com/search?term='.$encode_search_term.'&entity=ebook&country='.$site_country.'');
$response_al = json_decode($data_al);

if (isset($response_al->results) and $response_al->results == true){
foreach ($response_al->results as $result_al)
{
	$bigimage = preg_replace('/100x100bb/ms', "270x270bb", $result_al->artworkUrl100);
	echo '<li class="page-item"><div class="pagethumb"><a href="'.$site_url.'/book/'.$result_al->trackId.'/'.cano($result_al->trackName).'"><img data-src="'.$bigimage.'" src="'.$site_url.'/images/loading.svg" ></a></div>
	<div class="info"><h3><a href="'.$site_url.'/book/'.$result_al->trackId.'/'.cano($result_al->trackName).'">'.$result_al->trackName.'</a></h3>
		<h4>'.$result_al->artistName.'</h4>
		</div>
	</li>';
	
}
}
else {
		echo $search_noresults_title. '<div style="height:300px;"><div>';
	}
}

if ($entity_id == 'audiobooks') {
$data_al = file_get_contents('https://itunes.apple.com/search?term='.$encode_search_term.'&entity=audiobook&country='.$site_country.'');
$response_al = json_decode($data_al);

if (isset($response_al->results) and $response_al->results == true){
foreach ($response_al->results as $result_al)
{
	$bigimage = preg_replace('/100x100bb/ms', "180x180bb", $result_al->artworkUrl100);
	echo '<li class="page-item audiob"><div class="pagethumb"><a href="'.$site_url.'/audiobook/'.$result_al->collectionId.'/'.cano($result_al->collectionName).'"><img data-src="'.$bigimage.'" src="'.$site_url.'/images/loading.svg" ></a></div>
	<div class="info"><h3><a href="'.$site_url.'/audiobook/'.$result_al->collectionId.'/'.cano($result_al->collectionName).'">'.$result_al->collectionName.'</a></h3>
		<h4>'.$result_al->artistName.'</h4>
		</div>
	</li>';
	
}
}
else {
		echo $search_noresults_title. '<div style="height:300px;"><div>';
	}
}


?>
</ul>
</div>
</div>
<?php 
$catad = file_get_contents("ads/category_bottom_ad_728x90.php",NULL);
if(isset($catad) and !empty($catad)): ?>
<div class="pagebottombox">
<center>
<?php echo $catad; ?>
</center>
</div>
<?php endif; ?>
<script src="<?php echo $site_url;?>/js/imglazyload.js"></script>
<script>
			//lazy loading
			$('.page-itemlist img').imgLazyLoad({
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
<?php include 'includes/footer.php'; ?>
</body>
</html>