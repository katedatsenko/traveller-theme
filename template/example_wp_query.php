<?php 
/**
 * Template name: Example WP_Query
 */
 ?>
 <?php get_header(); ?>


<section class="main2 wrapper">
    <section class="content">
        <h2>Знакомство с WP_Query</h2>
                    <br/>
                    <?php
                $my_posts = new WP_Query;
                $myposts = $my_posts->query(array(
                    'post_type' => 'post'
                ));
                var_dump($myposts);
                foreach ($myposts as $post) {
                    echo $post->post_title . '<br/>';
                    echo '<p>'. $post->post_content . '<p/>';
                }
//                print_r(the_content());
                wp_reset_postdata();
                ?>
                    <hr/>


<?php get_sidebar(); ?>


<?php get_footer(); ?>