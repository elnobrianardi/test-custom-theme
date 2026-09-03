<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */

$fse_hub_links = array(
	'About 5 Star Eats'     => '/5-star-eats/',
	'How It Works'          => '/how-it-works/',
	'FAQ'                   => '/faq/',
	'2025 Winners'          => '/winners-2025/',
	'Awards Index'          => '/awards/',
);

?>

	<footer id="colophon" class="site-footer">
		<div class="fse-footer-inner">

			<div class="fse-footer-brand">
				<p class="fse-footer-logo">
					<span class="fse-brand-mark" aria-hidden="true">&#9733;</span>
					5 Star Eats
				</p>
				<p class="fse-footer-blurb">
					The definitive index of <?php echo esc_html( five_star_eats_market_name() ); ?>&rsquo;s best restaurants on GrabFood and
					Dine Out &mdash; awarded purely on real order and rating data.
				</p>
			</div>

			<nav class="fse-footer-nav" aria-label="<?php esc_attr_e( 'Programme links', '_s' ); ?>">
				<h2 class="fse-footer-heading">Programme</h2>
				<ul>
					<?php foreach ( $fse_hub_links as $label => $path ) : ?>
						<li><a href="<?php echo esc_url( home_url( $path ) ); ?>"><?php echo esc_html( $label ); ?></a></li>
					<?php endforeach; ?>
				</ul>
			</nav>

			<div class="fse-footer-col">
				<h2 class="fse-footer-heading">Grab <?php echo esc_html( five_star_eats_market_name() ); ?></h2>
				<ul>
					<li><a href="<?php echo esc_url( five_star_eats_site_uri() ); ?>" rel="noopener">grab.com/<?php echo esc_html( five_star_eats_market() ); ?></a></li>
					<li><a href="<?php echo esc_url( five_star_eats_food_uri() ); ?>" rel="noopener">GrabFood</a></li>
					<li><a href="<?php echo esc_url( five_star_eats_dine_out_uri() ); ?>" rel="noopener">Dine Out</a></li>
				</ul>
			</div>

		</div>

		<div class="fse-footer-bottom">
			<div class="fse-footer-bottom-inner">
				<p>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> Grab &middot; 5 Star Eats <?php echo esc_html( five_star_eats_market_name() ); ?></p>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #content -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
