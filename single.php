<?php get_header(); ?>


<section class="main2 wrapper">
    <section class="content">
        <?php
        /* Start the Loop */
        while ( have_posts() ) : the_post();

          get_template_part( 'template-parts/content', get_post_format() );
        endwhile; // End of the loop.
      ?>

    </section><!-- Content End -->


<?php get_sidebar(); ?>


<?php get_footer(); ?>