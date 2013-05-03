<?php while ( have_posts() ) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>">
                	<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" class="author"><div><?php echo get_avatar( get_the_author_email(), '25' ); ?><?php the_author_meta('user_firstname'); ?></div></a>
                    <a href="<?php the_permalink() ?>"><h1><?php the_title(); ?></h1></a>
                    <?php the_content(); ?>
                    <p><?php the_time('dS F Y') ?></p>
                </article>
<?php endwhile; ?>
