<article>
        <div class="article_image">
          <?php if ( has_post_thumbnail()) :?>
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
                    <?php the_post_thumbnail(); ?>
                </a>
            <?php else:  ?>
                <img src="http://dummyimage.com/800x250/f3f3f3/d1d1d1.jpg&text=Featured+Image" alt="Featured Image" itemprop="image">
            <?php endif; ?>
        </div>
        <div class="post">
          <h1 class="title">
            <a href="<?php the_permalink(); ?>"><?php the_title() ;?></a>
          </h1>
          <div class="categories">
            <span>Categories:
            <?php the_category(' ');?>
            </span> <!-- .post-categories -->
          </div>
          <?php the_content('Continue reading...'); ?>
          
        </div>
      </article>