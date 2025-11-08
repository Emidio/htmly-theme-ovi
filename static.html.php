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
		<h1 class="post-title entry-title"><?php echo $p->title;?></h1>
		<?php if (authorized($p)) { echo ' <span class="edit-post"><a href="'. $p->url .'/edit?destination=post">Edit</a></span>'; } ?>
	</header><!-- .entry-header -->
	<div class="entry-content entry-excerpt <?php echo $static->slug; ?>-class">
	<?php echo $p->body; ?>		
	</div><!-- .entry-content -->
</article>

<!-- disabled navigation in static page Emidio 20251104
<nav class="navigation post-navigation" role="navigation" aria-label="Posts">
	<h2 class="screen-reader-text">Post navigation</h2>
	<div class="nav-links">
		<?php if (!empty($prev)): ?>
		<div class="nav-previous"><a href="<?php echo($prev['url']); ?>" rel="prev"><span class="nav-link-text"><?php echo i18n('Prev');?></span><h3 class="entry-title"><?php echo($prev['title']); ?></h3></a></div>
		<?php endif;?>
		<?php if (!empty($next)): ?>
		<div class="nav-next"><a href="<?php echo($next['url']); ?>" rel="next"><span class="nav-link-text"><?php echo i18n('Next');?></span><h3 class="entry-title"><?php echo($next['title']); ?></h3></a></div>
		<?php endif;?>
	</div>
</nav>
-->
<p>&nbsp;</p>

<?php if ($static->slug == "downloads") { ?>
<!-- only added for "downloads" slug - needed to force download of files instead of opening in browser -->
<script language="JavaScript">
    function forceDownloadLinks() {
        // Select all <a> tags within .downloads-class > p > a
        const links = document.querySelectorAll('.downloads-class > p > a');

        links.forEach(link => {
            // Add the download attribute to force download
            const filename = link.href.split('/').pop(); // Extract filename from URL
            link.setAttribute('download', filename);
            // link.textContent = `Download ${filename}`;

            // Alternative: Set download to empty string to use original filename
            // link.setAttribute('download', '');
        });
    }
    // Run the function when DOM is ready
    document.addEventListener('DOMContentLoaded', forceDownloadLinks);
</script>
<?php } ?>
