<?php
/**
 * 5 Star Eats Hub template.
 *
 * Automatically applied to the page with slug "5-star-eats".
 * Programme overview: hero, editor-managed content (provided by the
 * content brief) and a credibility signal section. Brand + WebPage
 * JSON-LD is emitted via inc/five-star-eats-schema.php.
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
			<p class="fse-eyebrow">GrabFood &middot; Malaysia</p>
			<h1 class="fse-title"><?php the_title(); ?></h1>
			<p class="fse-lede">
				The definitive list of Malaysia's best restaurants on GrabFood and Dine Out &mdash;
				chosen by real orders, not opinions.
			</p>
			<div class="fse-hero-actions">
				<a class="fse-button fse-button--primary" href="<?php echo esc_url( home_url( '/winners-2025/' ) ); ?>">
					See the 2025 Winners
				</a>
				<a class="fse-button fse-button--ghost" href="<?php echo esc_url( home_url( '/how-it-works/' ) ); ?>">
					How it works
				</a>
			</div>
		</section>

		<div class="fse-prose">
			<?php the_content(); ?>
		</div>

		<section class="fse-signals" aria-label="Why you can trust this list">
			<h2 class="fse-section-title">Why you can trust this list</h2>
			<ul class="fse-signals-grid">
				<?php foreach ( five_star_eats_credibility_signals() as $signal ) : ?>
					<li class="fse-signal">
						<span class="fse-signal-value"><?php echo esc_html( $signal['value'] ); ?></span>
						<span class="fse-signal-label"><?php echo esc_html( $signal['label'] ); ?></span>
					</li>
				<?php endforeach; ?>
			</ul>
		</section>

		<nav class="fse-pagenav" aria-label="Explore the programme">
			<a class="fse-button fse-button--ghost" href="<?php echo esc_url( home_url( '/awards/' ) ); ?>">All award editions</a>
			<a class="fse-button fse-button--ghost" href="<?php echo esc_url( home_url( '/faq/' ) ); ?>">FAQ</a>
		</nav>

	<?php endwhile; ?>

</main><!-- #main -->

<?php
get_footer();
