<?php
/**
 * 5 Star Eats Company template.
 *
 * Automatically applied to the page with slug "company".
 * Parent URL stub linking the live 2025 winners page and the 2026
 * placeholder. WebPage JSON-LD (with hasPart) is emitted via
 * inc/five-star-eats-schema.php.
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
			<?php _s_title( array( 'bg' => 'green' ) ); ?>
			<p class="fse-lede">
				Browse every edition of the Grab 5 Star Eats awards.
			</p>
		</section>

		<div class="fse-prose">
			<?php the_content(); ?>
		</div>

        <main class="fse-hero-container">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/og-default.jpg" alt="Hero Image" class="fse-hero-image">
        </main>

	<?php endwhile; ?>

</main><!-- #main -->


<?php
get_footer();