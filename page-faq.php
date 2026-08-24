<?php
/**
 * 5 Star Eats FAQ template.
 *
 * Automatically applied to the page with slug "faq".
 * Renders the Q&As from inc/five-star-eats-content.php as an
 * accordion (native details/summary here; swap for the grab.com UIKit
 * accordion component in production). The same data feeds the
 * FAQPage JSON-LD via inc/five-star-eats-schema.php.
 *
 * @package _s
 */

get_header();
?>

<main id="primary" class="site-main fse-page">

	<?php
	while ( have_posts() ) :
		the_post();
		?>

		<section class="fse-hero">
			<p class="fse-eyebrow">FAQ</p>
			<h1 class="fse-title"><?php the_title(); ?></h1>
			<p class="fse-lede">
				Everything you need to know about the Grab 5 Star Eats awards.
			</p>
		</section>

		<div class="fse-accordion">
			<?php foreach ( five_star_eats_faqs() as $index => $faq ) : ?>
				<details class="fse-accordion-item" id="question-<?php echo esc_attr( (string) ( $index + 1 ) ); ?>"<?php echo 0 === $index ? ' open' : ''; ?>>
					<summary class="fse-accordion-summary">
						<?php echo esc_html( $faq['q'] ); ?>
						<span class="fse-accordion-icon" aria-hidden="true">+</span>
					</summary>
					<div class="fse-accordion-panel">
						<?php echo esc_html( $faq['a'] ); ?>
					</div>
				</details>
			<?php endforeach; ?>
		</div>

		<nav class="fse-pagenav" aria-label="Related pages">
			<a class="fse-button fse-button--ghost" href="<?php echo esc_url( home_url( '/how-it-works/' ) ); ?>">
				Read the methodology
			</a>
			<a class="fse-button fse-button--primary" href="<?php echo esc_url( home_url( '/winners-2025/' ) ); ?>">
				Browse 2025 Winners
			</a>
		</nav>

	<?php endwhile; ?>

</main><!-- #main -->

<?php
get_footer();
