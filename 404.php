<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package pivotpilotcustom
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<div class="desktop-404">
					<object type="image/svg+xml" data="<?php echo get_stylesheet_directory_uri(); ?>/img/404-icon-desktop.svg">Your browser does not support SVGs</object>
				</div>
				<div class="mobile-404">
					<object type="image/svg+xml" data="<?php echo get_stylesheet_directory_uri(); ?>/img/404-icon-mobile.svg">Your browser does not support SVGs</object>
				</div>
				<button class="error-404__get-back-home">get back home</button>
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
