<?php
// Include custom functions
$functions_file = theme_path() . 'functions.php';
if (file_exists($functions_file)) {
    require_once $functions_file;
}
?>
<?php if (!defined('HTMLY')) die('HTMLy'); ?>
<article class="tz-magazine-post post hentry">	
	<header class="post-header entry-header">
		<h1 class="post-title entry-title">Posts not found!</h1>
	</header><!-- .entry-header -->
	<div class="entry-content entry-excerpt"></div><!-- .entry-content -->
</article>