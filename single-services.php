<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package pivotpilotcustom
 */

get_header(); ?>

<div id="player">
  <button class="hamburger state-active" id="exit">
    <span></span>
    <span></span>
    <span></span>
  </button>
  <button class="forward" id="player_forward">
    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
       viewBox="0 0 56.8 42.2" style="enable-background:new 0 0 56.8 42.2;" xml:space="preserve">
    <style type="text/css">
      .st0{fill:#FFFFFF;}
    </style>
    <polygon class="st0" points="0,0 28.4,42.2 56.8,0 "/>
    </svg>
  </button>
  <iframe src="https://player.vimeo.com/video/207343737" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
  <button class="backward" id="player_backward">
    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
       viewBox="0 0 56.8 42.2" style="enable-background:new 0 0 56.8 42.2;" xml:space="preserve">
    <style type="text/css">
      .st0{fill:#FFFFFF;}
    </style>
    <polygon class="st0" points="0,0 28.4,42.2 56.8,0 "/>
    </svg>
  </button>
</div>

  <div id="primary" class="content-area clear-header">
    <main id="main" class="site-main" role="main">

      <section>
        <div class="max-width-wrapper">
        <?php while ( have_posts() ) : the_post(); ?>

          <h6 class="entry-title"><?php the_title(); ?></h6>
          <h2 class="entry-excerpt"><?php the_excerpt(); ?></h2>
          <div class="entry-content"><?php the_content(); ?></div>

        <?php endwhile; // End of the loop. ?>
        </div>
      </section>

      <section class="pd-middle margin-closer">
        <div class="max-width-wrapper">
        <h2 id="service-header">Why does it matter?</h2>

        <div id="service-slider">
          <?php foreach(range(1,6) as $number): ?>
            <?php if(get_field('benefit_' . $number)): ?>
              <article class="benefit">
                <img src="<?php the_field('benefit_icon_' . $number); ?>"/>
                <div>
                  <h3><?php the_field('benefit_' . $number); ?></h3>
                  <button class="reveal reveal-benefit">+</button>
                </div>
              </article>
            <?php endif ?>
          <?php endforeach ?>
        </div>

        <div id="service-overlay">
          <button class="hamburger toggle-benefit state-active">
            <span></span>
            <span></span>
            <span></span>
          </button>
          <div id="service-overlay-slider">
            <?php foreach(range(1,6) as $number): ?>
              <?php if(get_field('benefit_' . $number)): ?>
                <article class="benefit-meta">
                  <img src="<?php the_field('benefit_inverse_icon_' . $number); ?>"/>
                  <h6><?php the_title(); ?></h6>
                  <h2><?php the_field('benefit_' . $number); ?></h2>
                  <p><?php the_field('benefit_content_' . $number); ?></p>
                </article>
              <?php endif ?>
            <?php endforeach ?>
          </div>
        </div>

        </div>
      </section>


      <?php if(get_field('featured_work_1')): ?>
      <section class="pd-middle">
        <div class="max-width-wrapper">

        <h6>Featured Work</h6>
        <?php foreach(range(1,12) as $number): ?>
          <?php if(get_field('featured_work_' . $number)): ?>
            <a class="featured-work <?php if(get_field('featured_work_video_' . $number)){echo 'play_video';} ?>" href="<?php the_field('featured_work_page_' . $number); ?>" data-embed-id="https://player.vimeo.com/video/<?php the_field('featured_work_video_' . $number); ?>">
              <img src="<?php the_field('featured_work_' . $number); ?>"/>
              <picture>
                <svg id="featured-work-pupil" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 171.94 86.36"><path d="M112.64,44.21A26.86,26.86,0,1,1,85.78,17.34a26.86,26.86,0,0,1,26.86,26.86"/></svg>
                <svg id="featured-work-eye" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 171.94 86.36"><path d="M86,0C16.07.19,0,43.18,0,43.18s16.07,43,86,43.18c69.9-.19,86-43.18,86-43.18S155.86.19,86,0"/></svg>
              </picture>
            </a>
          <?php endif ?>
        <?php endforeach ?>

        </path>
      </section>
      <?php endif ?>
    </main><!-- #main -->
  </div><!-- #primary -->

<?php
get_footer();
