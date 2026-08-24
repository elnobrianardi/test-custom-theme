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
					The definitive index of Malaysia&rsquo;s best restaurants on GrabFood and
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
				<h2 class="fse-footer-heading">Grab Malaysia</h2>
				<ul>
					<li><a href="https://www.grab.com/my/" rel="noopener">grab.com/my</a></li>
					<li><a href="https://food.grab.com/my/en/" rel="noopener">GrabFood</a></li>
					<li><a href="https://www.grab.com/my/dine-out/" rel="noopener">Dine Out</a></li>
				</ul>
			</div>

		</div>

		<div class="fse-footer-bottom">
			<div class="fse-footer-bottom-inner">
				<p>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> Grab &middot; 5 Star Eats Malaysia</p>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #content -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
