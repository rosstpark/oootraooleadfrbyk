<?php
function canogenre($g){
	$g = str_replace(" ", "-", $g);
	$g = strtolower($g);
	return $g;
}
?>
<div class="navbar navbar-default" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<div class="navbar-brand">
			<a href="/"><img src="<?php echo $site_url;?>/images/logo.png" alt="<? echo $site_title; ?>" border="0"></a>
			</div>
		</div>
		<div class="navbar-collapse collapse navbar-responsive-collapse">
<form action="<?php echo $site_url;?>/search_main.php" class="navbar-form navbar-right hidden-sm">

    <input type="text" placeholder="<?php echo $searchf_text; ?>" name="q" class="form-control input-sm" value=""  />
	<input type="hidden" name="change" value="1">
    <select name="entity" class="form-control input-sm">
      <option value="books"><?php echo $searchf_books; ?></option>
	  <option value="audiobooks"><?php echo $searchf_aubooks; ?></option>
    </select>
	
	<button type="submit" class="searchbut"><i class="material-icons">search</i></button>
	
  </form>


		</div>
		<!--/.nav-collapse -->
	</div>
</div>