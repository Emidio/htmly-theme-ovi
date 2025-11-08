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
		<h1 class="post-title entry-title">Page not found!</h1>
	</header><!-- .entry-header -->
	<div class="entry-content entry-excerpt">
	<p>Please search to find what you're looking for or visit our <a href="<?php echo site_url() ?>">homepage</a> instead.</p>
	<?php echo search() ?>		
	</div><!-- .entry-content -->
</article>