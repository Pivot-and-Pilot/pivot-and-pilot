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
			<section id="archive-blog" class="bg-light-purple" data-base-url="<?php echo site_url('/') ?>">
        <div class="max-width-wrapper">

        <form id="blogsearch" method="get">
          <input id="blogsearch_text" name="s" placeholder="Search By Title..." type="text"><input type="submit" value="">
        </form>

				<nav class="dropdown dropdown-blog">

					<?php $curr_blog_tag = get_query_var('blog_tag') ? get_query_var('blog_tag') : '' ?>
					<?php if(!$curr_blog_tag): ?>
						<li class="state-active"><a class="filter_post" data-tag-id="0" href="<?php echo site_url('blog'); ?>">All Posts</a></li>
					<?php else: ?>
						<li class="state-active"><a class="filter_post" data-tag-id="<?php echo get_term_by('slug', $curr_blog_tag, 'blog_tag')->term_id; ?>" href="<?php echo site_url('blog') . get_term_by('slug', $curr_blog_tag, 'blog_tag')->slug; ?>"><?php echo get_term_by('slug', $curr_blog_tag, 'blog_tag')->name; ?></a></li>
						<li><a class="filter_post" data-tag-id="0" href="<?php echo site_url('blog'); ?>">All Posts</a></li>
					<?php endif; ?>

          <?php $terms = get_terms('blog_tag'); ?>
          <?php foreach($terms as $term): ?>
            <?php if($term->slug != $curr_blog_tag): ?>
              <li><a class="filter_post" data-tag-id="<?php echo $term->term_id ?>" href="<?php echo site_url('blog/?blog_tag=' . $term->slug); ?>"><?php echo $term->name ?></a></li>
            <?php endif; ?>
          <?php endforeach?>
        
        </nav>

        <div id="post-blog-container">
        
        <article id="post-clone-template" class="post type-post" style="display: none;">
          <ul class="term-container"><li></li></ul>
          <h3 class="entry-title"></h3>
          <div class="entry-meta">
            <a href="" rel="bookmark"></a>
          </div>
          <a class="entry-permalink" href=""><img class="entry-thumbnail" src=""/></a>
          <div class="entry-content"></div>
        </article>

				<?php
				if ( have_posts() ) :

					if ( is_home() && ! is_front_page() ) : ?>
						<header>
							<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
						</header>

					<?php
					endif;

					/* Start the Loop */
					while ( have_posts() ) : the_post();

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', get_post_format() );

					endwhile;

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif; ?>

        </div>

        <div class="pagecount">
          <var id="curpage">1</var>
          <span>/</span>
          <var id="maxpage"><?php echo $wp_query->max_num_pages; ?></var>
        </div>
        <nav>
        <?php

          the_posts_pagination(array(
            'mid_size' => -1,
            'prev_text' => '',
            'next_text' => '',
          ));

        ?>
        </nav>
        </div>
			</section>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
