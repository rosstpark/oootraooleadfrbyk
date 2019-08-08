<script src="<?php echo $site_url;?>/material/js/bootstrap.min.js"></script>
<script src="<?php echo $site_url;?>/material/js/ripples.min.js"></script>
<script src="<?php echo $site_url;?>/material/js/material.min.js"></script>
<script>
$.material.init();
</script>
<script src="<?php echo $site_url;?>/material/js/jquery.dropdown.js"></script>
<script>
  $(".navbar-form select").dropdown();
</script>
<footer>
<div class="footcontent">
<div class="pull-left">
Copyright &copy; <?php echo date("Y"); ?> <span><?php echo $site_title;?></span>.
</div>
<div class="pull-right">
<a href="<?php echo $site_url;?>"><?php echo $footnav_home; ?></a><span class="footsep"></span><a href="<?php echo $site_url;?>/privacy"><?php echo $footnav_privacy; ?></a><span class="footsep"></span><a href="<?php echo $site_url;?>/dmca"><?php echo $footnav_dmca; ?></a><span class="footsep"></span><a href="<?php echo $site_url;?>/contact"><?php echo $footnav_contact; ?></a>
<a href="<?php echo $site_url;?>/sitemap.xml">.</a><a href="<?php echo $site_url;?>/feed">.</a>
</div>
</div>
</footer>
