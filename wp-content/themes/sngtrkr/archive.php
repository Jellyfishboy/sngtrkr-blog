<?php 
/* 
Archive template
*/ 
?>
<?php get_header(); ?>
<div class="row">
	<div class="onecol">
	</div>
	<div class="sevencol">
		<?php $archive_year = get_the_time('Y'); ?>
		<h2 id="year_title">Yearly archives: <?php echo $archive_year ?></h2>
		<?php $wp_query = new WP_Query();
		$wp_query->query('year='.$archive_year.'&showposts=3'.'&paged='.$paged);
		while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
		<div class="blog_posts">
			<a href="<?php the_permalink() ?>"><h1><?php the_title(); ?></h1></a>
			<?php the_content(); ?>
			<p><?php the_time('dS F Y') ?></p>
		</div>
		<?php endwhile;?>
	<div class="navigation">
		<div class="alignleft"><?php previous_posts_link('&laquo; Previous Entries') ?></div>
		<div class="alignright"><?php next_posts_link('Next Entries &raquo;','') ?></div>
	</div>
	</div>
	<div class="threecol">
		<?php get_sidebar(); ?>
	</div>
	<div class="onecol last">
	</div>
</div>
<?php get_footer(); ?>