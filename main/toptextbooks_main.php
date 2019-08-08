<?php include('siteconfig.php');
function cano($s){
	$s = $output = trim(preg_replace(array("`'`", "`[^a-z0-9]+`"),  array("", "-"), strtolower($s)), "-");
	return $s;
}
$page_title = $toptext_title;
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width">
		<title><?php echo $page_title; ?> - <?php echo $site_title; ?></title>
		<meta name="description" content="<?php echo $page_title; ?> - <?php echo $site_title; ?>" />
		<meta name="keywords" content="<?php echo $site_keywords; ?>" />
		<meta property="og:site_name" content="<?php echo $site_title; ?>"/>
		<meta property="og:type" content="website"/>
		<meta property="og:title" content="<?php echo $page_title; ?> - <?php echo $site_title; ?>"/>
		<meta property="og:description" content="<?php echo $page_title; ?> - <?php echo $site_title; ?>"/>
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
<h1><?php echo $page_title; ?></h1>
</div>
<div class="pageresults">
<ul class="page-itemlist">
<?php
$string = file_get_contents('https://itunes.apple.com/'.$site_country.'/rss/toptextbooks/limit=100/xml');
// Remove the colon ":" in the <xxx:yyy> to be <xxxyyy>
$string = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $string);
$xml = simplexml_load_string($string);

// Output
$rssresults = '';

foreach ($xml->entry as $val) {
    
	// edit foreach
	$musicid = $val->id;
	$musicid = str_replace("/id/","xxx",$musicid);
	$musicid=explode('/id',$musicid);
	$musicid=explode('?',$musicid[1]);
	$bigimage = preg_replace('/170x170/ms', "270x270", $val->imimage[2]);
	
    $rssresults .= '<li class="page-item"><div class="pagethumb"><a href="'.$site_url.'/book/'.$musicid[0].'/'.cano($val->imname).'"><img data-src="'.$bigimage.'" src="'.$site_url.'/images/loading.svg" alt="'.$val->imname.'"></a></div>
	<div class="info"><h3><a href="'.$site_url.'/book/'.$musicid[0].'/'.cano($val->imname).'">'.$val->imname.'</a></h3>
		<h4>'.$val->impublisher.'</h4>
		<h4 class="genretit">'.$val->category->attributes()->label.'</h4>
		</div>
	</li>';
   
}
echo $rssresults;

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