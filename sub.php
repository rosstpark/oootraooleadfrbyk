<?php
$domen = $_SERVER['HTTP_HOST'];
function sub() {
	if (file_exists('sub.txt')) {
		$myfile = fopen("sub.txt", "r") or die("Unable to open file!");
		echo '';
		while( $i < 500) {
			$seek = rand(0, filesize("sub.txt"));
			if ($seek > 0) {
				fseek($myfile, $seek);
				fgets($myfile);
			}
			$kiwot = fgets($myfile);
			if (!empty($kiwot)) {
                                $kiwot = strtolower($kiwot);
                                $url = preg_replace('/[^A-Za-z0-9 ]/', '', $kiwot);
				$url = str_replace (' ','-',$url);
                                $domen = $_SERVER['HTTP_HOST'];
				$url = 'http://'.$url.'.edu.'.$domen.'';
$judul = ucwords($kiwot);
				echo '<a href="'.$url.'" title="'.$judul.'">'.$judul.'</a>,';
				
			}
			$i++;
		}
		echo '';
		fclose($myfile);
	}
}

;?>
<!DOCTYPE html>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>sub</title>
<link rel="stylesheet" type="text/css" media="all" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />
	
	
</head>
<body class="home blog">
<div id="page" class="hfeed site">
	<nav id="site-navigation" class="main-navigation navbar navbar-default navbar-static-top" role="navigation">
		<div class="container">
						</nav><!-- #site-navigation -->

	<div id="content" class="site-content container clearfix">

	
<div id="tertiary" class="widget-area col-md-2 hidden-xs hidden-sm" role="complementary">
	</div><!-- #secondary -->

	<div id="primary" class="content-area col-md-12">

		
			<main id="main" class="site-main clearfix" role="main">

			<ul class="list-group">
		
 <?php sub();?>
</ul>
			</main><!-- #main -->
			
						
			</div><!-- #primary -->

	
<div id="secondary" class="widget-area col-md-2" role="complementary">
	</div><!-- #secondary -->


	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
	    <div class="container">
		<div class="site-info col-md-12 footer-logo">
			<small>&copy;</small> <?php echo $domen;?> Website
		</div><!-- .site-info -->
		<hr>
	    </div><!-- .container -->
	</footer><!-- #colophon --> 
</div><!-- #page -->

</body>
</html>