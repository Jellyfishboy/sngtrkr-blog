<?php 
/* 
Search results
*/ 
?>
<?php get_header(); ?>
<div class="row">
	<div class="onecol">
	</div>
	<div class="sevencol blog_loop">
		<?php if ( have_posts() ) : ?>
			<?php $s_query = get_search_query(); ?>
			<h2 id="sub_title" data-search="<?php echo $s_query ?>">Search results for: <?php echo $s_query; ?></h2>
			<?php $wp_query = new WP_Query();
			$wp_query->query('&s='.$s_query.'');
			while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
			<article>
				<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" class="author"><div><?php echo get_avatar( get_the_author_email(), '25' ); ?><?php the_author_meta('user_firstname'); ?></div></a>
				<a href="<?php the_permalink() ?>"><h1><?php the_title(); ?></h1></a>
				<?php the_content(); ?>
				<p><?php the_time('dS F Y') ?></p>
			</article>
			<?php endwhile;?>
		<?php else : ?>
			<p> Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>
		<?php endif; ?>
	</div>
	<div class="threecol">
		<?php get_sidebar(); ?>
	</div>
	<div class="onecol last">
	</div>
</div>
<?php get_footer(); ?>