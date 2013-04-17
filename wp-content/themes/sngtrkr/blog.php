<?php 
/* 
Template Name: BlogTemp
*/ 
?>
<?php get_header(); ?>
<div class="row">
	<div class="eightcol">
<?php $wp_query = new WP_Query();
$wp_query->query('&showposts=5'.'&paged='.$paged);
while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
<div class="row blog_posts">
	<div class="twelvecol">
		<div class="row">
			<div class="threecol last">
				<?php if (has_post_thumbnail( $post->ID ) ): ?>
					<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
					<img src="<?php echo $image[0]; ?>" />
				<?php endif; ?>
			</div>
			<div class="ninecol last">
				<a href="<?php the_permalink() ?>"><h1><?php the_title(); ?></h1></a>
				<p class="large"><i class="icon-calendar"></i><?php the_time('dS F Y') ?></p>
				<p class="large"><i class="icon-comments-alt"></i><?php comments_number(); ?></p>
			</div>
		</div>
		<div class="row">
			<div class="elevencol">
				<p><?php the_excerpt(); ?></p>
			</div>
		</div>
	</div>
	<!-- <div class="twocol last tags">
		<?php $before = ''; the_tags($before, $separator, $after); ?>
	</div> -->
</div>
<?php endwhile;?>
</div>
	<div class="fourcol last">
		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>