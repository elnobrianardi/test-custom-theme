<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package _s
 */

get_header();
?>

	<main id="primary" class="site-main">

		<section class="error-404 not-found">
			<p class="e404-code">404</p>
			<h1 class="e404-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', '_s' ); ?></h1>
			<p class="e404-lede"><?php esc_html_e( 'The page you were looking for doesn&rsquo;t exist or may have moved. Try a search or head back to the hub.', '_s' ); ?></p>

			<div class="e404-actions">
				<a class="e404-button e404-button--primary" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Back to home', '_s' ); ?></a>
				<a class="e404-button e404-button--ghost" href="<?php echo esc_url( home_url( '/5-star-eats/' ) ); ?>">5 Star Eats</a>
				<a class="e404-button e404-button--ghost" href="<?php echo esc_url( home_url( '/winners-2025/' ) ); ?>"><?php esc_html_e( '2025 Winners', '_s' ); ?></a>
				<a class="e404-button e404-button--ghost" href="<?php echo esc_url( home_url( '/faq/' ) ); ?>">FAQ</a>
			</div>

			<div class="e404-search">
				<?php get_search_form(); ?>
			</div>
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();
