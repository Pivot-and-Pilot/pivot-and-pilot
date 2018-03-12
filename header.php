<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package pivotpilotcustom
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<script src="https://use.typekit.net/pji1uov.js"></script>
<script>try{Typekit.load({ async: true });}catch(e){}</script>
<?php wp_head(); ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-67357811-1', 'auto');
  ga('send', 'pageview');
</script>

</head>

<body <?php body_class(); ?>>

<div id="loader">
	<div class="loader-container">
		<h1 style="color: white">Pivot<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 21.842 25.909" enable-background="new 0 0 21.842 25.909" xml:space="preserve"><g><path fill="#453DFF" d="M9.737,25.912c-0.431,0-0.858-0.023-1.279-0.068c-1.708-0.185-7.359-1.2-8.352-6.515 c-0.565-3.022,1.253-6.007,4.88-8.063c-0.778-0.744-2.399-2.576-2.399-4.92C2.586,2.965,5.552,0,8.934,0 c3.5,0,6.348,2.847,6.348,6.345h-0.75c0-3.085-2.511-5.595-5.598-5.595c-2.981,0-5.597,2.615-5.597,5.595 c0,2.666,2.505,4.681,2.531,4.701l12.058,10.375c1.255-1.509,2.184-3.503,2.562-6.032l0.742,0.111 c-0.403,2.689-1.392,4.811-2.729,6.417l3.341,2.875l-0.488,0.568l-3.352-2.884C15.743,24.839,12.671,25.912,9.737,25.912z M5.584,11.792c-1.837,1.002-5.468,3.514-4.741,7.399c0.897,4.806,6.116,5.736,7.695,5.906c3.064,0.335,6.466-0.609,8.886-3.118 L5.584,11.792z"/></g></svg>Pilot</h1>
	</div>
</div>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'pivotpilotcustom' ); ?></a>
	<header id="masthead" class="site-header <?php if(is_page('about')){echo 'alternate';} ?>" role="banner">
		<div class="site-branding">
			<h1 class="site-title">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					Pivot
					<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
						 viewBox="0 0 21.842 25.909" enable-background="new 0 0 21.842 25.909" xml:space="preserve">
					<g>
						<path fill="#453DFF" d="M9.737,25.912c-0.431,0-0.858-0.023-1.279-0.068c-1.708-0.185-7.359-1.2-8.352-6.515
							c-0.565-3.022,1.253-6.007,4.88-8.063c-0.778-0.744-2.399-2.576-2.399-4.92C2.586,2.965,5.552,0,8.934,0
							c3.5,0,6.348,2.847,6.348,6.345h-0.75c0-3.085-2.511-5.595-5.598-5.595c-2.981,0-5.597,2.615-5.597,5.595
							c0,2.666,2.505,4.681,2.531,4.701l12.058,10.375c1.255-1.509,2.184-3.503,2.562-6.032l0.742,0.111
							c-0.403,2.689-1.392,4.811-2.729,6.417l3.341,2.875l-0.488,0.568l-3.352-2.884C15.743,24.839,12.671,25.912,9.737,25.912z
							 M5.584,11.792c-1.837,1.002-5.468,3.514-4.741,7.399c0.897,4.806,6.116,5.736,7.695,5.906c3.064,0.335,6.466-0.609,8.886-3.118
							L5.584,11.792z"/>
					</g>
					</svg>
					Pilot
				</a>
			</h1>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
				<span></span>
				<span></span>
				<span></span>
			</button>
			<?php
				$services = get_posts(
				  array(
				  'post_type' => 'services',
				  'numberposts' => -1
				  )
				);
			?>
			<div id="primary-menu" class="menu">
				<ul aria-expanded="false" class="nav-menu">
					<a href="<?php echo site_url('/'); ?>">Pivot</a>
					<li id="inner-menu-toggle">
					<a href="<?php echo site_url('/services'); ?>">Services</a>
						
						
					</li>
					<li><a href="<?php echo site_url('/portfolio'); ?>">Portfolio</a></li>
					<a id="ampersand">
						<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 21.842 25.909" enable-background="new 0 0 21.842 25.909" xml:space="preserve"><g><path fill="#453DFF" d="M9.737,25.912c-0.431,0-0.858-0.023-1.279-0.068c-1.708-0.185-7.359-1.2-8.352-6.515 c-0.565-3.022,1.253-6.007,4.88-8.063c-0.778-0.744-2.399-2.576-2.399-4.92C2.586,2.965,5.552,0,8.934,0 c3.5,0,6.348,2.847,6.348,6.345h-0.75c0-3.085-2.511-5.595-5.598-5.595c-2.981,0-5.597,2.615-5.597,5.595 c0,2.666,2.505,4.681,2.531,4.701l12.058,10.375c1.255-1.509,2.184-3.503,2.562-6.032l0.742,0.111 c-0.403,2.689-1.392,4.811-2.729,6.417l3.341,2.875l-0.488,0.568l-3.352-2.884C15.743,24.839,12.671,25.912,9.737,25.912z M5.584,11.792c-1.837,1.002-5.468,3.514-4.741,7.399c0.897,4.806,6.116,5.736,7.695,5.906c3.064,0.335,6.466-0.609,8.886-3.118 L5.584,11.792z"/></g></svg>
					</a>
					<li><a href="<?php echo site_url('/blog'); ?>">Blog</a></li>
					<li><a href="<?php echo site_url('/about'); ?>">About</a></li>
					<li><a class="toggle-contact"><span>Contact</span></a></li>
					<a href="<?php echo site_url('/'); ?>">Pilot</a>
				</ul>
			</div>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
		<div id="contact">
			<div class="max-width-wrapper">
			<button class="hamburger state-active toggle-contact">
			  <span></span>
			  <span></span>
			  <span></span>
			</button>

			<menu class="contact-nav">
			  <button class="state-active">1</button>
			  <button>2</button>
			  <button>3</button>
			</menu>
			<?php echo do_shortcode('[contact-form-7 id="72" title="Contact Form"]'); ?>

			</div>
			<footer>
				<h3>Don't Like Forms?</h3>
				<a href="mailto:hello@pivotandpilot.com"><button class="alternate">Send Us An Email</button></a>
				<h6>Or give us a call:</h6>
				<a href="tel:+16472836532" class="phone">+1 (647) 283 . 6532</a>
			</footer>
		</div>
 