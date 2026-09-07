<?php
/**
 * 5 Star Eats Awards Index template.
 *
 * Automatically applied to the page with slug "awards".
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
			<p class="fse-eyebrow">Awards index</p>
			<h1 class="fse-title"><?php the_title(); ?></h1>
			<p class="fse-lede">
				Browse every edition of the Grab 5 Star Eats awards.
			</p>
		</section>

		<div class="fse-prose">
			<?php the_content(); ?>
		</div>

		<ul class="fse-editions">
			<li class="fse-edition">
				<a class="fse-edition-link" href="<?php echo esc_url( home_url( '/winners-2025/' ) ); ?>">
					<span class="fse-edition-year">2025</span>
					<span class="fse-edition-name">5 Star Eats 2025 Winners</span>
					<span class="fse-edition-meta"><?php echo esc_html( five_star_eats_market_name() ); ?> &middot; Live</span>
				</a>
			</li>
			<li class="fse-edition fse-edition--soon" aria-disabled="true">
				<span class="fse-edition-year">2026</span>
				<span class="fse-edition-name">5 Star Eats 2026</span>
				<span class="fse-edition-meta">Coming soon &mdash; winners announced after the next evaluation cycle</span>
			</li>
		</ul>

		<nav class="fse-pagenav" aria-label="Related pages">
			<a class="fse-button fse-button--ghost" href="<?php echo esc_url( home_url( '/5-star-eats/' ) ); ?>">
				About the programme
			</a>
		</nav>

	<?php endwhile; ?>

</main><!-- #main -->

<?php
get_footer();
