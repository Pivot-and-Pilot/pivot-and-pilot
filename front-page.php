<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package pivotpilotcustom
 */

get_header(); ?>

  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

      <?php while(have_posts()): the_post(); ?>
      <section id="landing" class="bg-light-purple pd-extra">
        <canvas id="gradient"></canvas>
        <div class="max-width-wrapper">
          <h1><?php the_excerpt(); ?></h1>
          <a href="<?php echo site_url('/portfolio'); ?>"><button id="viewwork" class="alternate">View Our Work</button></a>
        </div>
      </section>
      <?php endwhile ?>

      <section class="front-page__how-we-do-it">
        <div class="front-page__how-we-do-it-header">how we do it</div>
        <?php
        if( have_rows('front_page_how_we_do_it') ):
          while ( have_rows('front_page_how_we_do_it') ) : the_row(); 
        ?>
        <div class="how-we-do-it-single-wrap">
          <div class="how-we-do-it-title">
          <?php the_sub_field('how_we_do_it_title'); ?>
            <div class="open-and-close-button">
              <div class="line-one"></div>
              <div class="line-two"></div>
            </div>
          </div>
          <div class="how-we-do-it-content-toggle">
            <div class="how-we-do-it-single-content-toggle">
            <?php
            if( have_rows('how_we_do_it_content') ):
              while ( have_rows('how_we_do_it_content') ) : the_row(); 
            ?>  
              <div>
                <div class="how-we-do-it-content-title">
                <?php the_sub_field('how_we_do_it_content_title'); ?>
                </div>
                <div class="how-we-do-it-content-detail">
                <?php the_sub_field('how_we_do_it_content_detail'); ?>
                </div>
              </div>
            <?php
              endwhile;
            endif;
            ?>
            </div>
            <a href="<?php echo get_site_url() . '/portfolio'?>" class="how-we-do-it-content-view-projects">view projects</a>
          </div> 
        </div>
          
        <?php
          endwhile;
        endif;
        ?>
      </section>
     

      <section>
        <div class="featured-projects-background-square rellax" data-rellax-speed="-3"></div>
        <div class="featured-projects-background-circle rellax" data-rellax-speed="2"></div>
        <div>
          <div class="featured-projects-header">Featured projects</div>  
          <div id="featured-case-studies">
            <?php 
            $projects = get_posts(
              array(
              'post_type' => 'clients',
              'numberposts' => 6,
              )
            );
            foreach($projects as $project): ?>
            <article class="post-portfolio">
              <a href="<?php echo get_permalink($project) ?>"><img src="<?php echo get_the_post_thumbnail_url($project, 'large'); ?>"/></a>
              <div class="post-meta">
                <h2><?php echo $project->post_title ?></h2>
                <p>
                  <?php $terms = get_the_terms($project , 'category'); ?>
                  <?php foreach($terms as $term): ?>
                  <span><?php echo $term->name ?></span>
                  <?php endforeach?>
                </p>
              </div>
            </article>
            <?php endforeach ?>
          </div>
          <button class="font-page-view-more-projects">
            <a href="<?php echo get_site_url() . '/portfolio'?>">view more projects</a>
          </button>
        </div>
      </section>

       <?php while(have_posts()): the_post(); ?>
      <section class="pd-none">
        <div id="accordion-slider" data-index="0">
          <?php foreach(range(1,4) as $number): ?>
            <figure class="<?php if($number == 1){echo 'state-active';} ?>">
              <div class="max-width-wrapper">
                <img src="<?php the_field('slide_gif_' . $number); ?>"/>
                <?php if(get_field('slide_gif_' . $number . '_desktop')): ?><img src="<?php the_field('slide_gif_' . $number . '_desktop'); ?>"/><?php endif ?>
                <?php the_field('slide_content_' . $number); ?>
              </div>
            </figure>
          <?php endforeach ?>
          <button class="prev"></button>
          <button class="next"></button>
        </div>

        <menu id="accordion-nav">
          <menuitem class="state-active">1</menuitem>
          <menuitem>2</menuitem>
          <menuitem>3</menuitem>
          <menuitem>4</menuitem>
        </menu>

      </section>
      <?php endwhile ?>

    </main><!-- #main -->
  </div><!-- #primary -->

<?php
get_footer();
