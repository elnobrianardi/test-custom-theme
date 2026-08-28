<?php
/**
 * 5 Star Eats FAQ template.
 *
 * Automatically applied to the page with slug "faq".
 * Renders the Q&As from inc/five-star-eats-content.php as a
 * UIKit accordion (uk-accordion). The same data feeds the
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

		<ul class="fse-accordion" uk-accordion="multiple: true">
			<?php foreach ( five_star_eats_faqs() as $index => $faq ) : ?>
				<li class="fse-accordion-item<?php echo 0 === $index ? ' uk-open' : ''; ?>" id="question-<?php echo esc_attr( (string) ( $index + 1 ) ); ?>">
					<a class="uk-accordion-title fse-accordion-title" href>
						<?php echo esc_html( $faq['q'] ); ?>
						<span class="fse-accordion-icon" uk-accordion-icon aria-hidden="true"></span>
					</a>
					<div class="uk-accordion-content fse-accordion-content">
						<?php echo esc_html( $faq['a'] ); ?>
					</div>
				</li>
			<?php endforeach; ?>
		</ul>

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
