<?php
/**
 * The template for displaying all portfolio posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package pivotpilotcustom
 */

get_header(); ?>

<?php if(get_field(film_animation) && get_field(film_animation_video)): ?>
  <div id="player">
    <iframe src="https://player.vimeo.com/video/207343737" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
  </div>
<?php endif ?>  

  <div id="primary" class="content-area clear-header">
    <main id="main" class="site-main" role="main">

    <menu id="portfolio-menu" class="<?php if(!get_field('website_link')){echo 'no-website-link';} ?>">
      <button id="portfolio-menu-toggle" class="hamburger state-active">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <h6>Services</h6>
      <?php if(get_field('branding')): ?><menuitem><a href="#branding-and-identity">Branding & Identity</a></menuitem><?php endif ?>
      <?php if(get_field('web')): ?><menuitem><a href="#web-and-seo">Website & SEO</a></menuitem><?php endif ?>
      <?php if(get_field('film_animation')): ?><menuitem><a href="#film-and-animation">Film & Animation</a></menuitem><?php endif ?>
      <?php if(get_field('print')): ?><menuitem><a href="#print-and-packaging">Print & Packaging</a></menuitem><?php endif ?>
      <?php if(get_field('website_link')): ?><menuitem class="website-link"><a href="<?php the_field('website_link') ?>" target="_blank">Visit Website</a></menuitem><?php endif ?>
    </menu>

    <?php while ( have_posts() ) : the_post(); ?>

    <section style="background-color:<?php the_field('primary_color'); ?>;color:<?php the_field('secondary_color'); ?>">
      <div class="max-width-wrapper">
        <article>
          <h6 class="entry-title"><?php the_title(); ?></h6>
          <h2 class="entry-excerpt"><?php the_excerpt(); ?></h2>
          <div class="entry-content"><?php the_content(); ?></div>
          <?php if(get_field('primary_mobile_image')): ?><img class="entry-mobile-image" src="<?php the_field('primary_mobile_image'); ?>"/><?php endif ?>
          <img class="entry-primary-image" src="<?php the_field('primary_image'); ?>"/>
          <picture class="entry-secondary-images">
            <?php if(get_field('secondary_image_1')): ?><img src="<?php the_field('secondary_image_1') ?>"/><?php endif ?>
            <?php if(get_field('secondary_image_2')): ?><img src="<?php the_field('secondary_image_2') ?>"/><?php endif ?>
            <?php if(get_field('secondary_image_3')): ?><img src="<?php the_field('secondary_image_3') ?>"/><?php endif ?>
          </picture>
          <?php if(get_field('testimonial')): ?>
            <blockquote>
              <?php the_field('testimonial'); ?>
            </blockquote>
          <?php endif ?>
        </article>
      </div>
    </section>



    <?php if(get_field('branding')): ?>
    <section id="branding-and-identity" class="pd-middle" style="background-color:<?php the_field('primary_color'); ?>;color:<?php the_field('secondary_color'); ?>">
      <div class="max-width-wrapper client-wrapper">
        <h6>Branding &amp; Identity</h6>
        <?php the_field('branding_content'); ?>
        <?php foreach(range(1,4) as $number): ?>
          <?php if(get_field('branding_font_' . $number)): ?>
          <div class="branding-font">
            <img class="branding-font-image" src="<?php the_field('branding_font_' . $number) ?>"/>
            <div class="branding-font-content" style="background-color:<?php the_field('primary_color'); ?>; border-color:<?php the_field('secondary_color'); ?>">
              <?php the_field('branding_font_content_' . $number) ?>
            </div>
          </div>
          <?php endif ?>
        <?php endforeach ?>
      </div>
    </section>
    <?php endif ?>



    <?php if(get_field('web')): ?>
    <section id="web-and-seo" class="pd-middle" style="background-color:<?php the_field('secondary_color'); ?>;color:<?php the_field('primary_color'); ?>">

      <canvas style="background-color:<?php the_field('primary_color'); ?>"></canvas>
      
      <figure class="web-desktop">
        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1729.2 97.1" enable-background="new 0 0 1729.2 97.1" xml:space="preserve"><g><g><path fill="#E6E6E6" d="M1693.2,0H36C16.2,0,0,16.2,0,36v61.1h1729.2V36C1729.2,16.2,1713,0,1693.2,0z"/></g><circle fill="#F1615D" cx="59.6" cy="48.2" r="17.2"/><circle fill="#FCC242" cx="118.2" cy="48.2" r="17.2"/><circle fill="#53B94C" cx="178.2" cy="48.2" r="17.2"/></g></svg>
        <div class="web-desktop-inner">
          <img src="<?php the_field('web_desktop_render') ?>"/>
        </div>
      </figure>
      
      <div class="max-width-wrapper client-wrapper">
      <h6>Web Development & SEO</h6>
      <?php the_field('web_content'); ?>

      <div class="web-mobile-container">
        <?php foreach(range(1,3) as $number): ?>
          <?php if(get_field('web_mobile_render_' . $number)): ?>
          <figure class="web-mobile">
            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 720.5 107.1" enable-background="new 0 0 720.5 107.1" xml:space="preserve"><g><path fill="#E6E6E6" d="M684.5,0h-333H36C16.2,0,0,16.2,0,36v71.1h351.5h369V36C720.5,16.2,704.3,0,684.5,0z"/><g><circle fill="#D1D3D4" cx="259.7" cy="56.6" r="16.8"/><line fill="none" stroke="#D1D3D4" stroke-width="12" stroke-linecap="round" stroke-miterlimit="10" x1="304" y1="56.6" x2="475" y2="56.6"/></g></g></svg>
            <div class="web-mobile-inner">
              <img src="<?php the_field('web_mobile_render_' . $number) ?>"/>
            </div>
            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 720.5 157.1" enable-background="new 0 0 720.5 157.1" xml:space="preserve"><g><path fill="#E6E6E6" d="M369,0H0v121.1c0,19.8,16.2,36,36,36h333h315.5c19.8,0,36-16.2,36-36V0H369z"/><circle fill="#D1D3D4" cx="360.3" cy="78.6" r="50.3"/></g></svg>
          </figure>
          <?php endif ?>
        <?php endforeach ?>
      </div>

      </div>

    </section>
    <?php endif ?>



    <?php if(get_field('film_animation')): ?>
    <section id="film-and-animation" style="background-color:<?php the_field('primary_color'); ?>;color:<?php the_field('secondary_color'); ?>">
      
      <?php if(get_field('gif_1')): ?>
        <picture class="film-animation-gifs">
        <?php foreach(range(1,6) as $number): ?>
          <img src="<?php the_field('gif_' . $number); ?>"/>
        <?php endforeach ?>
        </picture>
      <?php endif ?>

        <div class="max-width-wrapper client-wrapper">

        <?php if(get_field('film_animation_video')): ?>
          <a class="play_video film-animation-video" data-embed-id="https://player.vimeo.com/video/<?php the_field('film_animation_video'); ?>" href="https://vimeo.com/<?php the_field('film_animation_video'); ?>" target="_blank">
            <img src="<?php the_field('film_animation_thumbnail'); ?>"/>
          </a>
        <?php endif ?>

        <h6>Film & Animation</h6>
        <?php the_field('film_animation_content'); ?>
      </div>
    </section>
    <?php endif ?>



    <?php if(get_field('print')): ?>
    <section id="print-and-packaging" class="pd-middle" style="background-color:<?php the_field('primary_color'); ?>;color:<?php the_field('secondary_color'); ?>">
      <div class="max-width-wrapper client-wrapper">
        <picture class="print-header-image"><img src="<?php the_field('print_header_image') ?>"/></picture>
        <?php if(get_field('print_sub_header_image')): ?><picture class="print-sub-header-image"><img src="<?php the_field('print_sub_header_image') ?>"/></picture><?php endif ?>
        <h6>Print & Packaging</h6>
        <?php the_field('print_content'); ?>
      </div>
    </section>
    <?php endif ?>

    <?php endwhile; ?>

    <?php $prev_post = get_previous_post() ? get_previous_post(): get_posts(array('post_type' => 'clients','numberposts' => 1,))[0] ?>
    <?php $next_post = get_next_post() ? get_next_post(): get_posts(array('post_type' => 'clients','numberposts' => 1, 'order' => 'ASC'))[0]; ?>
    
    <nav class="nav-client" style="background-color:<?php the_field('primary_color'); ?>;">
      <a class="prev-client" href="<?php echo get_permalink($prev_post) ?>" style="background-image:url(<?php echo get_the_post_thumbnail_url($prev_post)?>);background-color:<?php the_field('primary_color', $prev_post->ID); ?>;color:<?php the_field('secondary_color', $prev_post->ID); ?>">
        <h6><?php echo $prev_post->post_title; ?></h6>
        <figure style="background-color:<?php the_field('secondary_color', $prev_post->ID); ?>">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26.39 19.86"><defs><style>.prev-client-poly{fill:<?php the_field('primary_color', $prev_post->ID); ?>;}</style></defs><title>navigation</title><polygon class="prev-client-poly" points="26.39 9.4 2.32 9.4 13.75 0.8 13.15 0 0 9.9 13.15 19.86 13.75 19.06 2.32 10.4 26.39 10.4 26.39 9.4"/></svg>
        </figure>
      </a>
      <a class="next-client" href="<?php echo get_permalink($next_post) ?>" style="background-image:url(<?php echo get_the_post_thumbnail_url($next_post)?>);background-color:<?php the_field('primary_color', $next_post->ID); ?>;color:<?php the_field('secondary_color', $next_post->ID); ?>">
        <h6><?php echo $next_post->post_title; ?></h6>
        <figure style="background-color:<?php the_field('secondary_color', $next_post->ID); ?>">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26.39 19.86"><defs><style>.next-client-poly{fill:<?php the_field('primary_color', $next_post->ID); ?>;}</style></defs><title>navigation</title><polygon class="next-client-poly" points="26.39 9.96 13.24 0 12.64 0.8 24.07 9.46 0 9.46 0 10.46 24.06 10.46 12.64 19.06 13.24 19.86 26.39 9.96"/></svg>
        </figure>
      </a>
    </nav>

    </main><!-- #main -->
  </div><!-- #primary -->

<?php
get_footer();
