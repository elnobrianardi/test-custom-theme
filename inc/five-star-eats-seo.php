<?php
/**
 * 5 Star Eats AEO Hub — autodescription (The SEO Framework) configuration.
 *
 * Sets custom page titles and meta descriptions for the five hub pages
 * so they display correctly in search results and social shares.
 *
 * Uses The SEO Framework filter hooks:
 *   tsf_title        — custom <title> tag
 *   tsf_description  — meta description
 *
 * In production on grab.com, the The SEO Framework plugin (autodescription)
 * is already active. These filters override the auto-generated values with
 * the correct, hand-written metadata for each hub page.
 *
 * @package _s
 */

/**
 * SEO metadata for each hub page.
 *
 * @return array<string, array{title: string, description: string}>
 */
function five_star_eats_seo_data() {
	$hub_url = home_url( '/5-star-eats/' );

	return array(
		'5-star-eats'   => array(
			'title'       => '5 Star Eats — Malaysia\'s Best Restaurants | Grab',
			'description' => 'Discover the 117 winners of Grab 5 Star Eats 2025 — Malaysia\'s best restaurants on GrabFood and Dine Out, selected purely from real order data.',
		),
		'how-it-works'  => array(
			'title'       => 'How It Works — 5 Star Eats Methodology | Grab',
			'description' => 'Learn how Grab 5 Star Eats measures and ranks the best restaurants in Malaysia using real GrabFood and Dine Out order and rating data.',
		),
		'faq'           => array(
			'title'       => 'FAQ — 5 Star Eats Awards | Grab',
			'description' => 'Frequently asked questions about the Grab 5 Star Eats awards programme, including how winners are selected and what the awards mean.',
		),
		'winners-2025'  => array(
			'title'       => '2025 Winners — 5 Star Eats | Grab',
			'description' => 'All 117 Grab 5 Star Eats 2025 winners across 17 categories — the best restaurants on GrabFood and Dine Out in Malaysia.',
		),
		'awards'        => array(
			'title'       => 'Awards Index — 5 Star Eats | Grab',
			'description' => 'Browse every edition of the Grab 5 Star Eats awards. See the 2025 winners and stay tuned for the 2026 edition.',
		),
	);
}

/**
 * Override the page <title> tag for hub pages.
 *
 * @param string $title The default title.
 * @return string
 */
function five_star_eats_seo_title( $title ) {
	if ( ! is_page() ) {
		return $title;
	}

	$slug = get_post_field( 'post_name' );
	$data = five_star_eats_seo_data();

	if ( isset( $data[ $slug ] ) ) {
		return $data[ $slug ]['title'];
	}

	return $title;
}
add_filter( 'tsf_title', 'five_star_eats_seo_title' );

/**
 * Override the meta description for hub pages.
 *
 * @param string $description The default description.
 * @return string
 */
function five_star_eats_seo_description( $description ) {
	if ( ! is_page() ) {
		return $description;
	}

	$slug = get_post_field( 'post_name' );
	$data = five_star_eats_seo_data();

	if ( isset( $data[ $slug ] ) ) {
		return $data[ $slug ]['description'];
	}

	return $description;
}
add_filter( 'tsf_description', 'five_star_eats_seo_description' );
