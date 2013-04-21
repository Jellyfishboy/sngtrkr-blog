<?php get_header(); ?>
<div class="row">
    <div class="ninecol">
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
        <div class="row blog_posts">
            <div class="twelvecol">
                <div class="row">
                    <div class="threecol last">
                        <?php if (has_post_thumbnail( $post->ID ) ): ?>
                            <a href="<?php the_permalink() ?>"><?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                            <img src="<?php echo $image[0]; ?>" /></a>
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
        <div class="row">
            <div class="elevencol">
                <?php comments_template(); ?>
            </div>
        </div>
</div>
    <div class="threecol last">
        <?php get_sidebar(); ?>
    </div>
</div>
    <?php endwhile; // end of the loop. ?>


<?php get_footer(); ?>