<?php while ( have_posts() ) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>">
                    <a href="<?php the_permalink() ?>"><h1><?php the_title(); ?></h1></a>
                    <?php the_content(); ?>
                    <p><?php the_time('dS F Y') ?></p>
                </article>
<?php endwhile; ?>
