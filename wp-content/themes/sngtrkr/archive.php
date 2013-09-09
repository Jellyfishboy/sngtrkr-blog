<?php 
/* 
Archive template
*/ 
?>
<?php get_header(); ?>
<div class="row">
	<div class="onecol">
	</div>
	<div class="sevencol blog_loop">
		<?php $archive_year = get_the_time('Y'); ?>
		<h2 id="sub_title" data-year="<?php echo $archive_year?>">Yearly archives: <?php echo $archive_year; ?></h2>
		<?php $wp_query = new WP_Query();
		$wp_query->query('&year='.$archive_year.'');
		while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
		<article data-pcount="<?php echo $wp_query->max_num_pages; ?>">
			<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" class="author_icon desktop_author">
				<div>
					<?php echo get_avatar( get_the_author_email(), '25' ); ?>
					<?php the_author_meta('user_firstname'); ?>
				</div>
			</a>
			<a href="<?php the_permalink() ?>"><h1><?php the_title(); ?></h1></a>
			<?php the_content(); ?>
			<p><?php the_time('dS F Y') ?></p>
			<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" class="author_icon mobile_author">
				<div>
					<?php echo get_avatar( get_the_author_email(), '25' ); ?>
					<?php the_author_meta('user_firstname'); ?>
				</div>
			</a>
		</article>
		<?php endwhile;?>
	</div>
	<div class="threecol">
		<?php get_sidebar(); ?>
	</div>
	<div class="onecol last">
	</div>
</div>
<?php get_footer(); ?>