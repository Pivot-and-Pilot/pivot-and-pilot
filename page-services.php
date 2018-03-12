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

      <section class="services-page-intro">
        <div class="services-page__intro-wrap">
          <div class="services-page-intro-title">
          <?php the_field('services_page_intro_title')?>
          </div>
          <div class="services-page-intro-detail">
          <?php the_field('services_page_intro_detail')?>
          </div>
        </div>
      </section>

      <section class="front-page__how-we-do-it">
        <div class="front-page__how-we-do-it-header">how we do it</div>
        <?php
        if( have_rows('services_page_how_we_do_it') ):
          while ( have_rows('services_page_how_we_do_it') ) : the_row(); 
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
                <h3 class="hidden-excerpt"><?php echo $project->post_excerpt; ?></h3>
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


    </main><!-- #main -->
  </div><!-- #primary -->

<?php
get_footer();
