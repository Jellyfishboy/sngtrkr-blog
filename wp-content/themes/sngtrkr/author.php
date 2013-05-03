<?php 
/* 
Author template
*/ 
?>
<?php get_header(); ?>
<div class="row">
	<div class="onecol">
	</div>
	<div class="sevencol blog_loop">
		<?php
			$post_tmp = get_post($post_id);
			$user_id = $post_tmp->post_author;
		?>
		<?php $author = get_the_author(); ?>
		<h2 id="sub_title" data-author="<?php the_author_meta('ID', $user_id); ?>">Author archives: <?php the_author_meta('display_name', $user_id) ?></h2>
		<?php $wp_query = new WP_Query();
		$author = get_the_author_meta('ID',$user_id);
		$wp_query->query('&author='.$author.'');
		while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
		<article data-pcount="<?php echo $wp_query->max_num_pages; ?>">
			<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" class="author"><div><?php echo get_avatar( get_the_author_email(), '25' ); ?><?php the_author_meta('user_firstname'); ?></div></a>
			<a href="<?php the_permalink() ?>"><h1><?php the_title(); ?></h1></a>
			<?php the_content(); ?>
			<p><?php the_time('dS F Y') ?></p>
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