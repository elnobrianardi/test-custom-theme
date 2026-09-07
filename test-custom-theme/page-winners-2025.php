<?php
/**
 * 5 Star Eats 2025 Winners template.
 *
 * Automatically applied to the page with slug "winners-2025".
 * Plain HTML loop over inc/five-star-eats-winners.php with jump
 * navigation. ItemList + LocalBusiness-per-winner JSON-LD is emitted
 * via inc/five-star-eats-schema.php from the same dataset.
 *
 * @package _s
 */

$all_winners = five_star_eats_winners();

get_header();
?>

<main id="primary" class="site-main fse-page">

	<?php
	while ( have_posts() ) :
		the_post();
		?>

		<section class="fse-hero">
			<p class="fse-eyebrow">Awards &middot; 2025</p>
			<h1 class="fse-title"><?php the_title(); ?></h1>
			<p class="fse-lede">
				The best restaurants on GrabFood and Dine Out in
				<?php echo esc_html( five_star_eats_market_name() ); ?>,
				grouped into categories.
			</p>
		</section>

		<div class="fse-carousel" data-carousel aria-label="Featured 2025 winners">
			<div class="fse-carousel-track">
				<?php foreach ( $all_winners as $category ) : ?>
					<?php foreach ( array_slice( $category['winners'], 0, 1 ) as $winner ) : ?>
<?php
						$image_url = ! empty( $category['image'] ) ? $category['image'] : 'https://placehold.co/200x200/e6e6e6/ffffff?text=' . urlencode( $category['label'] );
					?>
					<div class="fse-carousel-slide">
						<img class="fse-carousel-img" src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $category['label'] ); ?>" width="200" height="200">
						<span class="fse-carousel-category"><?php echo esc_html( $category['label'] ); ?></span>
						<span class="fse-carousel-name"><?php echo esc_html( $winner[0] ); ?></span>
						<span class="fse-carousel-location"><?php echo esc_html( $winner[1] ); ?></span>
					</div>
					<?php endforeach; ?>
				<?php endforeach; ?>
			</div>
			<button class="fse-carousel-btn fse-carousel-btn--prev" type="button" data-carousel-prev aria-label="Previous">&lsaquo;</button>
			<button class="fse-carousel-btn fse-carousel-btn--next" type="button" data-carousel-next aria-label="Next">&rsaquo;</button>
		</div>

		<nav class="fse-jumpnav" aria-label="Jump to a category">
			<ul>
				<?php foreach ( $all_winners as $category_slug => $category ) : ?>
					<li>
						<a href="#<?php echo esc_attr( $category_slug ); ?>">
							<?php echo esc_html( $category['label'] ); ?>
						</a>
					</li>
				<?php endforeach; ?>
			</ul>
		</nav>

		<div class="fse-prose">
			<?php the_content(); ?>
		</div>

		<?php $position = 0; ?>
		<?php foreach ( $all_winners as $category_slug => $category ) : ?>

			<section id="<?php echo esc_attr( $category_slug ); ?>" class="fse-category">
				<h2 class="fse-category-title">
					<?php echo esc_html( $category['label'] ); ?>
					<span class="fse-category-count">
						<?php echo esc_html( count( $category['winners'] ) ); ?> winners
					</span>
				</h2>

				<ol class="fse-winner-list">
					<?php foreach ( $category['winners'] as $winner ) : ?>
						<?php ++$position; ?>
						<li id="<?php echo esc_attr( $category_slug . '-' . $position ); ?>" class="fse-winner">
							<span class="fse-winner-rank"><?php echo esc_html( (string) $position ); ?></span>
							<div class="fse-winner-info">
								<span class="fse-winner-name"><?php echo esc_html( $winner[0] ); ?></span>
								<span class="fse-winner-location"><?php echo esc_html( $winner[1] ); ?></span>
							</div>
							<a
								class="fse-winner-order"
								href="https://food.grab.com/my/en/search/?search=<?php echo rawurlencode( $winner[0] ); ?>"
								rel="nofollow"
							>Order on GrabFood</a>
						</li>
					<?php endforeach; ?>
				</ol>
			</section>

		<?php endforeach; ?>

		<nav class="fse-pagenav" aria-label="Related pages">
			<a class="fse-button fse-button--ghost" href="<?php echo esc_url( home_url( '/awards/' ) ); ?>">
				All award editions
			</a>
			<a class="fse-button fse-button--ghost" href="<?php echo esc_url( home_url( '/5-star-eats/' ) ); ?>">
				About 5 Star Eats
			</a>
		</nav>

	<?php endwhile; ?>

</main><!-- #main -->

<?php
get_footer();
