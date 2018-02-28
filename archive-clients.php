<?php
/**
 * The template for displaying archive pages
 * Template Name: Client Archive
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package pivotpilotcustom
 */

get_header(); ?>

<?php $curr_category = get_query_var('cat') ? get_query_var('cat') : '' ?>
<?php $curr_tag = get_query_var('tag') ? get_query_var('tag') : '' ?>
<?php $curr_taxonomy = get_query_var('taxonomy') ? get_query_var('taxonomy') : 'category' ?>

  <div id="primary" class="content-area clear-header">
    <main id="main" class="site-main" role="main"> 
      <section id="archive-portfolio" class="archive-portfolio" data-curr-taxonomy="<?php echo $curr_taxonomy ?>">
        <!-- <menu class="tabs">
          <li><a class="switch_taxonomy" href="<?php echo site_url('portfolio'); ?>" data-taxonomy="category">Services</a></li>
          <li><a class="switch_taxonomy" href="<?php echo site_url('portfolio'); ?>?taxonomy=post_tag" data-taxonomy="post_tag">Industries</a></li>
        </menu> -->
        <div class="max-width-wrapper">
        <nav class="dropdown dropdown-services">

          <!-- <?php if($curr_category): ?> -->
            <li class="state-active"><a class="filter_clients" data-tag-id="<?php echo get_term( $curr_category )->term_id ?>" href="<?php echo site_url('portfolio?cat=' . get_term( $curr_category )->term_ID); ?>"><?php echo get_term( $curr_category )->name ?></a><div class="term-description"><?php echo get_term( $curr_category )->term-description ?></div></li>
            <li><a class="filter_clients" data-tag-id="0" href="<?php echo site_url('portfolio'); ?>">All Services</a></li>
          <!-- <?php else: ?> -->
            <li class="state-active"><a class="filter_clients" data-tag-id="0" href="<?php echo site_url('portfolio'); ?>">All Services</a></li>
          <!-- <?php endif ?> -->

          <?php $terms = get_terms('category'); ?>

          <?php foreach($terms as $term): ?>
            <!-- <?php if($term->term_id != $curr_category): ?> -->
              <li><a class="filter_clients" data-tag-id="<?php echo $term->term_id; ?>" href="<?php echo site_url('portfolio?cat=' . $term->term_id); ?>"><?php echo $term->name ?></a><div class="term-description"><?php echo $term->description; ?></div></li>
            <!-- <?php endif; ?> -->
          <?php endforeach?>
        
        </nav>

        <nav class="dropdown dropdown-industries">

          <!-- <?php if($curr_tag): ?> -->
            <li class="state-active"><a class="filter_clients post_tag" data-tag-id="<?php echo get_term_by('slug', $curr_tag, 'post_tag')->term_id; ?>" href="<?php echo site_url('portfolio?taxonomy=post_tag&tag=' . get_term_by('slug', $curr_tag, 'post_tag')->slug); ?>"><?php echo get_term_by('slug', $curr_tag, 'post_tag')->name; ?></a></li>
            <li><a class="filter_clients" href="<?php echo site_url('portfolio?taxonomy=post_tag'); ?>">All Industries</a></li>
          <!-- <?php else: ?> -->
            <li class="state-active"><a class="filter_clients" data-tag-id="0">All Industries</a></li>
          <!-- <?php endif ?> -->

          <?php $terms = get_terms('post_tag'); ?>

          <?php foreach($terms as $term): ?>
            <!-- <?php if($term->slug != $curr_tag): ?> -->
              <li><a class="filter_clients post_tag" data-tag-id="<?php echo $term->term_id ?>" href="<?php echo site_url('portfolio?taxonomy=post_tag&tag=' . $term->slug); ?>"><?php echo $term->name ?></a></li>
            <!-- <?php endif; ?> -->
          <?php endforeach?>
        
        </nav>

        <div id="current-term-description">
          <p></p>
        </div>
        
        <?php if ( $wp_query->have_posts() ) : ?>

          <!-- pagination here -->

          <!-- the loop -->
          <div id="post-portfolio-container">
          <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
            <article class="post-portfolio">
              <a href="<?php the_permalink($post) ?>"><img src="<?php the_post_thumbnail_url('large'); ?>"/></a>
              <div class="post-meta">
                <h2><?php the_title(); ?></h2>
                <h3 class="hidden-excerpt"><?php the_excerpt(); ?></h3>
                <p>
                  <?php $terms = get_the_terms($post , 'category'); ?>
                  <?php foreach($terms as $term): ?>
                  <span><?php echo $term->name ?></span>
                  <?php endforeach?>
                </p>
              </div>
            </article>
          <?php endwhile; ?>

          </div>
          <!-- end of the loop -->

          <!-- pagination here -->
          <div class="pagecount" style="visibility: hidden;">
            <var id="curpage">1</var>
            <span>/</span>
            <var id="maxpage"><?php echo $wp_query->max_num_pages; ?></var>
          </div>
          <!-- <nav>
            <?php
              the_posts_pagination(array(
                'mid_size' => -1,
                'prev_text' => '',
                'next_text' => '',
              ));
            ?>
          </nav> -->

        <?php else : ?>

          <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>

        <?php endif; ?>

        </div>

      </section>
    </main><!-- #main -->
  </div><!-- #primary -->

<?php
get_footer();
