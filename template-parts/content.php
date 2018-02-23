<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package pivotpilotcustom
 */

?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php $terms = get_the_terms($post , 'blog_tag'); ?>
	<ul class="term-container">
		<?php foreach($terms as $term): ?>
			<li><?php echo $term->name; ?></li>
		<?php endforeach ?>
	</ul>
	<h3 class="entry-title"><?php the_title(); ?></h3>
	<div class="entry-meta"><?php echo pivotpilotcustom_posted_on(); ?></div>
	<a class="entry-permalink" href="<?php the_permalink($post) ?>"><img class="entry-thumbnail" src="<?php the_post_thumbnail_url('large'); ?>"/></a>
	<div class="entry-content">
		<?php
			// the_content( sprintf(
			// 	wp_kses(
			// 		/* translators: %s: Name of current post. Only visible to screen readers */
			// 		__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'pivotpilotcustom' ),
			// 		array(
			// 			'span' => array(
			// 				'class' => array(),
			// 			),
			// 		)
			// 	),
			// 	get_the_title()
			// ) );

			// wp_link_pages( array(
			// 	'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'pivotpilotcustom' ),
			// 	'after'  => '</div>',
			// ) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
