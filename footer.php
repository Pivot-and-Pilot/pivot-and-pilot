<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package pivotpilotcustom
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="site-map">
			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBfaoqKoMJio8xe8wi2UwKQg6H0wBv8nRE"></script>	
			
			<?php $location = get_field('footer_map', 4); ?>

			<?php if( !empty($location) ): ?>
					<div class="acf-map">
						<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"><a target="_blank" href="https://www.google.com/maps/search/?api=1&query=Pivot+%26+Pilot+Creative+Inc.">Pivot & Pilot Creative Inc.</a></div><!-- /.marker -->
					</div><!-- acf-map -->

			<?php endif; ?>
			</div>
		<div class="max-width-wrapper">
		<a href="mailto:hello@pivotandpilot.com"><button class="align-center alternate">Book a Free Consultation</button></a>
		<address>
			<a href="tel:+16472836532" class="icon-lg"><svg id="icon-phone" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 300 300"><path d="M150.69,203.94c-17.51,0-31.71-13.78-31.71-30.79s14.2-30.79,31.71-30.79,31.71,13.79,31.71,30.79-14.2,30.79-31.71,30.79m0-96.31C87.35,107.63,36,157.49,36,219H265.37c0-61.51-51.35-111.37-114.69-111.37"/><path d="M95.36,85.74a32.11,32.11,0,0,0-23.31-8.86,21.25,21.25,0,0,1,18.61-10.8h120a21.24,21.24,0,0,1,18.61,10.8A32.1,32.1,0,0,0,206,85.74l44.6,43.79A30.17,30.17,0,0,0,250.86,86c-.15-.14-.3-.26-.45-.4C249.84,64.78,232.27,48,210.71,48h-120C69.1,48,51.53,64.78,51,85.59c-.15.14-.3.25-.45.4a30.17,30.17,0,0,0,.25,43.55Z"/></svg></a>
			<a href="mailto:hello@pivotandpilot.com" class="icon-lg"><svg id="icon-mail" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 300 300"><polygon points="35 81.82 150.04 150.41 265.07 81.82 35 81.82"/><polygon points="35 219 265.08 219 265.08 98.78 157.5 162.92 150.04 167.37 142.58 162.92 35 98.78 35 219"/></svg></a>
			<a target="_blank" href="https://www.facebook.com/pivotandpilot" class="icon-sm"><svg version="1.1" id="icon-facebook" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 27.4 59.3" style="enable-background:new 0 0 27.4 59.3;" xml:space="preserve"><path d="M27.4,8.7c-1.3-0.3-2.6-0.6-4-0.6c-2.9,0-6.2,0-6.2,6.1v5.9h10.2v7.6H17.1v31.5H8V27.8H0v-7.6h8v-4.9 C8,0.3,17.6,0,22.1,0c2.3,0,4.3,0.5,5.3,1V8.7z"/></svg></a>
			<a target="_blank" href="https://www.twitter.com/pivotandpilot" class="icon-sm"><svg version="1.1" id="icon-twitter" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 73.7 59.9" style="enable-background:new 0 0 73.7 59.9;" xml:space="preserve"><path d="M73.7,2.6l-13.5,2c-1.7-1.7-3.8-3.1-6.3-3.9C45.8-1.9,37,2.6,34.4,10.8C32.7,16,34,21.5,37.3,25.5 c-6.9-2.9-11.7-9.6-12.2-17.3c-7.2,2.9-12.4,9.9-12.6,18.1c-0.2,8.8,5.3,16.5,13.2,19.4C16.9,49.3,6.8,47.3,0,41.1 c9.1,17.1,30.3,23.7,47.5,14.8c15.2-7.8,22.4-25.1,18-41L73.7,2.6z"/></svg></a>
			<a target="_blank" href="https://www.linkedin.com/company/pivot-&-pilot-creative" class="icon-sm"><svg version="1.1" id="icon-linkedin" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 59.8 60.2" style="enable-background:new 0 0 59.8 60.2;" xml:space="preserve"><g><path d="M2.2,21.1h9.2v39.1H2.2V21.1z M6.7,0c3.8,0,6.8,3,6.8,6.8c0,3.7-3,6.7-6.8,6.7C3,13.5,0,10.5,0,6.8 C0,3,3,0,6.7,0"/><path d="M23.6,21.1h9.2v5.5c2.4-4.2,7-6.5,12.8-6.5c5.6,0,9.6,2,11.8,5.3c1.9,2.9,2.5,6.2,2.5,11.6v23.3h-9.2V40 c0-6.7-1.9-11.8-8.5-11.8c-6.4,0-9.4,5.1-9.4,11.8v20.2h-9.2V21.1z"/></g></svg></a>
			<a target="_blank" href="https://www.instagram.com/pivotandpilot" class="icon-sm"><svg version="1.1" id="icon-instagram" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 57.3 57.3" style="enable-background:new 0 0 57.3 57.3;" xml:space="preserve"><path d="M44.8,16.6c-2.7,0-4.9-2.2-4.9-4.9c0-2.7,2.2-4.9,4.9-4.9c2.7,0,4.9,2.2,4.9,4.9C49.7,14.4,47.5,16.6,44.8,16.6 M28.7,42.3c-7.5,0-13.6-6.1-13.6-13.6C15,21.1,21.1,15,28.7,15s13.6,6.1,13.6,13.6C42.3,36.2,36.2,42.3,28.7,42.3 M0,57.3h57.3V0H0 V57.3z"/></svg></a>
			<a target="_blank" href="https://www.google.com/maps/search/?api=1&query=Pivot+%26+Pilot+Creative+Inc." class="icon-lg-bottom"><svg id="icon-find-us" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 88.32 129.83"><defs><style>.cls-1{fill:none;}.cls-2{clip-path:url(#clip-path);}.cls-3{fill:#f0f0ff;}</style><clipPath id="clip-path"><rect class="cls-1" width="88.32" height="129.83"/></clipPath></defs><title>P&amp;amp;P_icons</title><g class="cls-2"><path class="cls-3" d="M44.16,66.94A22.82,22.82,0,1,1,67,44.12,22.82,22.82,0,0,1,44.16,66.94M88.28,44.12A44.12,44.12,0,0,0,0,44.12c-1.63,27.23,44.12,85.71,44.12,85.71S89.79,71.35,88.28,44.12"/></g></svg></a>
		</address>
		<div class="site-info">
			<p class="align-center-text">2018 &copy; Pivot & Pilot Inc.</p>
		</div><!-- .site-info -->
		</path>
	</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>
