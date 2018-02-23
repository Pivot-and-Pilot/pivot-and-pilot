<?php
/**
 * Template Name: About
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package pivotpilotcustom
 */

get_header(); ?>

  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
      <section id="page-about" class="bg-gradient">
      <div class="max-width-wrapper">
      <?php while ( have_posts() ) : the_post(); ?>
        <div id="about-us-slider">
          <?php if(get_field('about_us_image_1')): ?><div><img class='img-responsive' src='<?php the_field('about_us_image_1') ?>'/></div><?php endif ?>
          <?php if(get_field('about_us_image_2')): ?><div><img class='img-responsive' src='<?php the_field('about_us_image_2') ?>'/></div><?php endif ?>
          <?php if(get_field('about_us_image_3')): ?><div><img class='img-responsive' src='<?php the_field('about_us_image_3') ?>'/></div><?php endif ?>
        </div>
        <h1><?php the_excerpt(); ?></h1>
        <?php the_content(); ?>
        <?php $query = new WP_Query( array( 'post_type' => 'members', 'posts_per_page' => -1 ) ) ?>
      </div>
        <div id="about-us-team-slider">
          <?php while ( $query->have_posts() ) : $query->the_post(); ?>
            <article class="post-member">
              <img class="hobby-icon" src="<?php the_field('hobby_icon'); ?>"/>
              <img src="<?php the_post_thumbnail_url('large'); ?>"/>
              <h1><?php the_title(); ?></h1>
              <h6><?php echo get_post_meta($post->ID, 'title_one', true) ?></h6>
              <h6><?php echo get_post_meta($post->ID, 'title_two', true) ?></h6>
              <?php the_excerpt(); ?>
            </article>
          <?php endwhile ?>
        </div>
        <menu id="about-us-menu">
          <svg version="1.1" id="member-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 110 44" style="enable-background:new 0 0 110 44;" xml:space="preserve"><style type="text/css">.st0{fill:#F0EFFF;stroke:#453DFF;stroke-width:4;stroke-miterlimit:10;}</style><g><path class="st0" d="M58.4,23.2L58.4,23.2c0-0.7,0.4-1.4,1.1-1.8c3.4-1.8,5.7-5.3,5.7-9.3c-0.1-5.3-4.5-9.8-10-10 c-6.1-0.3-11,4.4-11,10.2c0,4,2.3,7.3,5.7,9.1c0.7,0.3,1.1,1,1.1,1.8c0,0.9-0.6,1.6-1.4,1.9c-6.3,2-11.1,7.5-11.8,14.1 c-0.1,0.9,0.6,1.8,1.6,1.8h30.7c0.9,0,1.7-0.8,1.6-1.7c-0.7-6.7-5.4-12.2-11.8-14.2C58.9,24.8,58.4,24.1,58.4,23.2"/></g></svg>
        </menu>
      <? endwhile; // End of the loop. ?>
      </section>
    </main><!-- #main -->
  </div><!-- #primary -->

<?php
get_footer();