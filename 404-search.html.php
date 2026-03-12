<?php
// Include custom functions
$functions_file = theme_path() . 'functions.php';
if (file_exists($functions_file)) {
    require_once $functions_file;
}
?>
<?php if (!defined('HTMLY')) die('HTMLy'); ?>
<?php $pageTitle = i18n('search_results_not_found'); ?>
<article class="tz-magazine-post post hentry">
	<header class="post-header entry-header">
		<h1 class="post-title entry-title"><?php echo i18n('search_results_not_found');?></h1>
	</header><!-- .entry-header -->
	<div class="entry-content entry-excerpt">
	<p><?php echo i18n('search_again'); ?> <a href="<?php echo site_url() ?>"><?php echo i18n('homepage'); ?></a>?</p>
	<?php echo search(); ?>	
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	</div><!-- .entry-content -->
</article>