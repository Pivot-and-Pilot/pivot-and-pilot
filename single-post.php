<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package pivotpilotcustom
 */

get_header(); ?>

<?php
  //gets the data from a URL  
  function get_tiny_url($url)  {  
    $ch = curl_init();  
    $timeout = 5;  
    curl_setopt($ch,CURLOPT_URL,'http://tinyurl.com/api-create.php?url='.$url);  
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);  
    curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);  
    $data = curl_exec($ch);  
    curl_close($ch);  
    return $data;  
  }

  //test it out!
  $tinyurl = get_tiny_url(get_permalink());
?>

  <div id="primary" class="content-area clear-header">
    <main id="main" class="site-main" role="main">

    <?php while ( have_posts() ) : the_post(); ?>

    <section>
      <div class="max-width-wrapper">
      <article id="post-<?php the_ID(); ?>" <?php post_class('single-post'); ?>>
        <?php $terms = get_the_terms($post , 'blog_tag'); ?>
        <ul class="term-container">
          <?php foreach($terms as $term): ?>
            <li><?php echo $term->name; ?></li>
          <?php endforeach ?>
        </ul>
        <h3 class="entry-title"><?php the_title(); ?></h3>
        <div class="entry-meta"><?php pivotpilotcustom_posted_on(); ?></div>
        <div id="entry-share-icons" class="state-hidden">
          <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode($tinyurl); ?>" target="_blank"><svg version="1.1" id="icon-facebook" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 27.4 59.3" style="enable-background:new 0 0 27.4 59.3;" xml:space="preserve"><path d="M27.4,8.7c-1.3-0.3-2.6-0.6-4-0.6c-2.9,0-6.2,0-6.2,6.1v5.9h10.2v7.6H17.1v31.5H8V27.8H0v-7.6h8v-4.9 C8,0.3,17.6,0,22.1,0c2.3,0,4.3,0.5,5.3,1V8.7z"/></svg></a>
          <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode($tinyurl); ?>" target="_blank"><svg version="1.1" id="icon-twitter" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 73.7 59.9" style="enable-background:new 0 0 73.7 59.9;" xml:space="preserve"><path d="M73.7,2.6l-13.5,2c-1.7-1.7-3.8-3.1-6.3-3.9C45.8-1.9,37,2.6,34.4,10.8C32.7,16,34,21.5,37.3,25.5 c-6.9-2.9-11.7-9.6-12.2-17.3c-7.2,2.9-12.4,9.9-12.6,18.1c-0.2,8.8,5.3,16.5,13.2,19.4C16.9,49.3,6.8,47.3,0,41.1 c9.1,17.1,30.3,23.7,47.5,14.8c15.2-7.8,22.4-25.1,18-41L73.7,2.6z"/></svg></a>
          <a href="https://www.linkedin.com/shareArticle?url=<?php echo urlencode($tinyurl) ?>" target="_blank"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 59.8 60.2" style="enable-background:new 0 0 59.8 60.2;" xml:space="preserve"><g><path d="M2.2,21.1h9.2v39.1H2.2V21.1z M6.7,0c3.8,0,6.8,3,6.8,6.8c0,3.7-3,6.7-6.8,6.7C3,13.5,0,10.5,0,6.8 C0,3,3,0,6.7,0"/><path d="M23.6,21.1h9.2v5.5c2.4-4.2,7-6.5,12.8-6.5c5.6,0,9.6,2,11.8,5.3c1.9,2.9,2.5,6.2,2.5,11.6v23.3h-9.2V40 c0-6.7-1.9-11.8-8.5-11.8c-6.4,0-9.4,5.1-9.4,11.8v20.2h-9.2V21.1z"/></g></svg></a>
        </div>
        <img class="entry-thumbnail" src="<?php the_post_thumbnail_url('large'); ?>"/>
        <div id="entry-blog-content" class="entry-content entry-blog-content" data-tiny-url="<?php echo $tinyurl; ?>">
          <?php
            the_content();
          ?>
        </div><!-- .entry-content -->
      </article><!-- #post-<?php the_ID(); ?> -->
      </div>
    </section>

    <?php endwhile; // End of the loop. ?>

    <?php

      $orig_post = $post;
      global $post;
      $tags = get_the_terms($post , 'blog_tag');
      if($tags) $tag_ids = array();

      foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
      $args=array(
        'post__not_in' => array($post->ID),
        'posts_per_page'=> 4, // Number of related posts to display.
        'tax_query' => array(array(
          'taxonomy' => 'blog_tag',
          'field'    => 'ID',
          'terms'    => $tag_ids
        ))
      );

      $my_query = new wp_query( $args );
      
    ?>

    <?php if( $my_query->have_posts() ): ?>

    <section class="pd-middle">
      <div class="max-width-wrapper">
      <h6>Related posts</h6>
      </div>
      <div id="related-blog-posts">

        <?php while( $my_query->have_posts() ) : $my_query->the_post(); ?>

        <article class="post-related">
          <a href="<? the_permalink()?>" style="background-image: url(<?php the_post_thumbnail_url('large'); ?>)"></a>
          <h3><?php the_title(); ?></h3>
        </article>

        <?php endwhile ?>
      </div>

    <?php endif ?>

    <?php

    $post = $orig_post;
    wp_reset_query();

    ?>
    </section>
    </main><!-- #main -->
  </div><!-- #primary -->

  <div id="form-newsletter">
    <?php get_template_part( 'template-parts/form-blog', 'form-blog' ); ?>
  </div>

<?php
get_footer();
