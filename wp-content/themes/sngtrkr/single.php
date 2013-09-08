<?php get_header(); ?>
<div class="row">
    <div class="onecol">
    </div>
    <div class="sevencol">
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
        <article class="single_post">
            <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" class="author"><div><?php echo get_avatar( get_the_author_email(), '25' ); ?><?php the_author_meta('user_firstname'); ?></div></a>
            <h1><?php the_title(); ?></h1>
            <?php the_content(); ?>
            <p><?php the_time('dS F Y') ?></p>
        </article>
        <div id="pre_nex">
            <?php previous_post_link('%link', '<i class="icon-chevron-left"></i><div>Previous post</div><span>%title</span>', FALSE, '3'); ?> 
            <?php next_post_link('%link', '<i class="icon-chevron-right"></i><div>Next post</div><span>%title</span>', FALSE, '3'); ?>
        </div>
        <?php comments_template(); ?>
    </div>
    <div class="threecol">
        <?php get_sidebar(); ?>
    </div>
    <div class="onecol last">
    </div>
</div>
    <?php endwhile; // end of the loop. ?>


<?php get_footer(); ?>