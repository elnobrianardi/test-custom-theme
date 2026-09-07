<?php
/**
 * 5 Star Eats "How It Works" template.
 *
 * Automatically applied to the page with slug "how-it-works".
 * Methodology / long-form structured content, with WebPage JSON-LD
 * emitted via inc/five-star-eats-schema.php.
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
			<p class="fse-eyebrow">Methodology</p>
			<h1 class="fse-title"><?php the_title(); ?></h1>
			<p class="fse-lede">
				How restaurants earn a 5 Star Eats award &mdash; measured, ranked and verified
				from GrabFood and Dine Out platform data.
			</p>
		</section>

		<div class="fse-prose">
			<?php the_content(); ?>
		</div>

		<nav class="fse-pagenav" aria-label="Related pages">
			<a class="fse-button fse-button--ghost" href="<?php echo esc_url( home_url( '/faq/' ) ); ?>">
				Read the FAQ
			</a>
			<a class="fse-button fse-button--ghost" href="<?php echo esc_url( home_url( '/winners-2025/' ) ); ?>">
				Browse 2025 Winners
			</a>
		</nav>

	<?php endwhile; ?>

</main><!-- #main -->

<?php
get_footer();
