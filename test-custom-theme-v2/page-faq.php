<?php
/**
 * 5 Star Eats FAQ template.
 *
 * Automatically applied to the page with slug "faq".
 * Renders the Q&As from inc/five-star-eats-content.php as a
 * vanilla-JS accordion (button + class toggle via js/fse-accordion.js).
 * The same data feeds the FAQPage JSON-LD via inc/five-star-eats-schema.php.
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

		<div class="fse-accordion" data-accordion>
			<?php foreach ( five_star_eats_faqs() as $index => $faq ) : ?>
				<div class="fse-accordion-item<?php echo 0 === $index ? ' is-open' : ''; ?>" id="question-<?php echo esc_attr( (string) ( $index + 1 ) ); ?>">
					<button
						class="fse-accordion-summary"
						type="button"
						aria-expanded="<?php echo 0 === $index ? 'true' : 'false'; ?>"
						aria-controls="question-panel-<?php echo esc_attr( (string) ( $index + 1 ) ); ?>"
					>
						<span class="fse-accordion-question"><?php echo esc_html( $faq['q'] ); ?></span>
						<span class="fse-accordion-icon" aria-hidden="true"></span>
					</button>
					<div
						class="fse-accordion-panel<?php echo 0 === $index ? '' : ' hidden'; ?>"
						id="question-panel-<?php echo esc_attr( (string) ( $index + 1 ) ); ?>"
						role="region"
						aria-labelledby="question-<?php echo esc_attr( (string) ( $index + 1 ) ); ?>"
					>
						<div class="fse-accordion-panel-inner">
							<?php echo esc_html( $faq['a'] ); ?>
						</div>
					</div>
				</div>
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
