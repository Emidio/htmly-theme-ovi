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
		<h1 class="post-title entry-title"><?php echo $name;?></h1>
	</header><!-- .entry-header -->
	<div class="entry-content entry-excerpt">
	    
	<img alt="<?php echo $author->name; ?>" src="<?php echo getAuthorImage($author->slug); ?>" class="authorimage">

	<?php echo $about; ?>
	<h3 class="post-index"><?php echo i18n('Post_by_author');?></h3>
	<?php if (!empty($posts)) { ?>
		<ul class="post-list">
			<?php foreach ($posts as $p): ?>
				<li class="item">
					<span><a href="<?php echo $p->url ?>"><?php echo $p->title ?></a></span> -
					<span><?php echo format_date($p->date) ?></span>. <?php echo i18n('Posted_in');?> <span class="tags-p"><?php echo $p->category;?></span>
				</li>
			<?php endforeach; ?>
		</ul>
	<?php } else {
		echo i18n('No_posts_found') . '!';
	} ?>	
	</div><!-- .entry-content -->
</article>
<?php if (!empty($pagination['prev']) || !empty($pagination['next'])): ?>
	<nav class="navigation pagination" role="navigation" aria-label="Posts" style="">
		<h2 class="screen-reader-text">Posts navigation</h2>
		<div class="nav-links"><?php echo $pagination['html'];?></div>
	</nav>
<?php endif;?>

<?php if (local() && comments_config('comments.show.author') === 'true'): ?>
<div id="comments" class="comments-area">
	<h3 id="reply-title" class="comment-reply-title"><?php echo i18n('Comments');?></h3>
    <?php
        displayCommentsSection($author->url, $author->file);
    ?>
</div>
<?php endif; ?>

