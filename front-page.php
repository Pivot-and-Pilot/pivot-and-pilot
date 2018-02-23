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

      <section class="pd-none">
        <div id="accordion-slider" data-index="0">
          <?php foreach(range(1,4) as $number): ?>
            <figure class="<?php if($number==1){echo 'state-active';} ?>">
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

      <?php
      $posts = get_posts(
        array(
        'post_type' => 'clients',
        'numberposts' => 3
        )
      );
      ?>

      <section>
        <div class="max-width-wrapper">
          <a href="<?php echo site_url('/portfolio'); ?>" class="align-center"><button>Featured Case Studies</button></a>
          <div id="featured-case-studies">
            <?php foreach($posts as $post): ?>
            <article class="post-portfolio">
              <a href="<?php echo get_permalink($post) ?>"><img src="<?php echo get_the_post_thumbnail_url($post, 'large'); ?>"/></a>
              <div class="post-meta">
                <h2><?php echo $post->post_excerpt ?></h2>
                <p>
                  <?php $terms = get_the_terms($post , 'category'); ?>
                  <?php foreach($terms as $term): ?>
                  <span><?php echo $term->name ?></span>
                  <?php endforeach?>
                </p>
              </div>
            </article>
            <?php endforeach ?>
          </div>
        </div>
      </section>

    </main><!-- #main -->
  </div><!-- #primary -->

<?php
get_footer();
