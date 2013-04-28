<?php 
/* 
Template Name: BlogTemp
*/ 
?>
<?php get_header(); ?>
<div class="row">
	<div class="onecol">
	</div>
	<div class="sevencol blog_loop">
		<?php $wp_query = new WP_Query();
		$wp_query->query('&showposts=3'.'&paged='.$paged);
		while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
		<div class="blog_posts">
			<a href="<?php the_permalink() ?>"><h1><?php the_title(); ?></h1></a>
			<?php the_content(); ?>
			<p><?php the_time('dS F Y') ?></p>
		</div>
		<?php endwhile;?>
	</div>
	<div class="threecol">
		<?php get_sidebar(); ?>
	</div>
	<div class="onecol last">
	</div>
</div>
<?php get_footer(); ?>