<?php get_header(); ?>
<div class="row">
    <div class="onecol">
    </div>
    <div class="sevencol">
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
        <div class="blog_posts">
            <a href="<?php the_permalink() ?>"><h1><?php the_title(); ?></h1></a>
            <?php the_content(); ?>
            <p><?php the_time('dS F Y') ?></p>
        </div>
        <?php comments_template(); ?>
    </div>
    <div class="threecol last">
        <?php get_sidebar(); ?>
    </div>
    <div class="onecol last">
    </div>
</div>
    <?php endwhile; // end of the loop. ?>


<?php get_footer(); ?>