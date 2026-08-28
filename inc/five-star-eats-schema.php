<?php
/**
 * 5 Star Eats AEO Hub — JSON-LD structured data and hreflang.
 *
 * Prints one JSON-LD graph per page via wp_head, keyed by page slug:
 *
 *   5-star-eats   Brand + WebPage
 *   how-it-works  WebPage
 *   faq           WebPage + FAQPage (mirrors the visible accordion)
 *   winners-2025  WebPage + ItemList + LocalBusiness per winner
 *   awards        WebPage
 *
 * Also prints self-referencing hreflang link tags (en-my + x-default)
 * for every active page. In production these are added through the
 * repo's hreflang.csv instead of this hook — kept here so the local
 * scaffold behaves like staging.
 *
 * @package _s
 */

/**
 * Slugs of the five hub pages.
 *
 * @return string[]
 */
function five_star_eats_page_slugs() {
	return array( '5-star-eats', 'how-it-works', 'faq', 'winners-2025', 'awards', 'company' );
}

/**
 * Whether the current request is one of the hub pages.
 *
 * @return bool
 */
function five_star_eats_is_active() {
	return is_page( five_star_eats_page_slugs() );
}

/**
 * Canonical URL for a hub page slug.
 *
 * @param string $slug Page slug.
 * @return string
 */
function five_star_eats_page_url( $slug ) {
	return home_url( '/' . $slug . '/' );
}

/**
 * Encode and print a JSON-LD script tag.
 *
 * @param array<string,mixed> $data Schema graph or single node.
 * @return void
 */
function five_star_eats_print_jsonld( $data ) {
	echo '<script type="application/ld+json">'
		. wp_json_encode(
			$data,
			JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE
		)
		. "</script>\n";
}

/**
 * Print self-referencing hreflang tags for the current hub page.
 *
 * In production on grab.com, hreflang tags are added via the repo's
 * hreflang.csv file (see /hreflang.csv in this theme). This PHP hook
 * serves as the fallback for local dev and staging environments where
 * the CSV-based pipeline is not active.
 *
 * @return void
 */
function five_star_eats_hreflang() {
	if ( ! five_star_eats_is_active() ) {
		return;
	}

	$slug = get_post_field( 'post_name' );
	if ( ! in_array( $slug, five_star_eats_page_slugs(), true ) ) {
		return;
	}

	$url = five_star_eats_page_url( $slug );

	printf( '<link rel="alternate" hreflang="en-my" href="%s" />' . "\n", esc_url( $url ) );
	printf( '<link rel="alternate" hreflang="x-default" href="%s" />' . "\n", esc_url( $url ) );
}
add_action( 'wp_head', 'five_star_eats_hreflang', 5 );

/**
 * Build the shared Brand node.
 *
 * @return array<string,mixed>
 */
function five_star_eats_brand_node() {
	$hub = five_star_eats_page_url( '5-star-eats' );

	return array(
		'@type'       => 'Brand',
		'@id'         => $hub . '#brand',
		'name'        => 'Grab 5 Star Eats',
		'url'         => $hub,
		'description' => 'Grab 5 Star Eats recognises the best restaurants on GrabFood and Dine Out in Malaysia, selected purely from order volume and customer rating data.',
	);
}

/**
 * Build a base WebPage node for a hub page.
 *
 * @param string                $slug        Page slug.
 * @param string                $name        Page name override.
 * @param string                $description Meta description text.
 * @param array<string,mixed>[] $extra       Additional properties merged in.
 * @return array<string,mixed>
 */
function five_star_eats_webpage_node( $slug, $name, $description, $extra = array() ) {
	return array_merge(
		array(
			'@type'       => 'WebPage',
			'@id'         => five_star_eats_page_url( $slug ) . '#webpage',
			'url'         => five_star_eats_page_url( $slug ),
			'name'        => $name,
			'description' => $description,
			'inLanguage'  => 'en-MY',
			'isPartOf'    => array( '@id' => home_url( '/#website' ) ),
			'publisher'   => array( '@id' => home_url( '/#organization' ) ),
		),
		$extra
	);
}

/**
 * Route the correct schema graph to the current page.
 *
 * @return void
 */
function five_star_eats_schema() {
	if ( ! five_star_eats_is_active() ) {
		return;
	}

	$slug = get_post_field( 'post_name' );

	switch ( $slug ) {
		case '5-star-eats':
			five_star_eats_print_jsonld(
				array(
					'@context' => 'https://schema.org',
					'@graph'   => array(
						five_star_eats_brand_node(),
						five_star_eats_webpage_node(
							$slug,
							get_the_title(),
							'Official index of Grab 5 Star Eats award winners: Malaysia\'s best restaurants on GrabFood and Dine Out, chosen by real order data.',
							array( 'about' => array( '@id' => five_star_eats_page_url( $slug ) . '#brand' ) )
						),
					),
				)
			);
			break;

		case 'how-it-works':
			five_star_eats_print_jsonld(
				array(
					'@context' => 'https://schema.org',
					'@graph'   => array(
						five_star_eats_webpage_node(
							$slug,
							get_the_title(),
							'The methodology behind Grab 5 Star Eats: how winners are measured and selected from GrabFood and Dine Out order and rating data.'
						),
					),
				)
			);
			break;

		case 'faq':
			five_star_eats_print_jsonld( five_star_eats_faq_graph() );
			break;

		case 'winners-2025':
			five_star_eats_print_jsonld( five_star_eats_winners_graph() );
			break;

		case 'awards':
			five_star_eats_print_jsonld(
				array(
					'@context' => 'https://schema.org',
					'@graph'   => array(
						five_star_eats_webpage_node(
							$slug,
							get_the_title(),
							'Browse every edition of the Grab 5 Star Eats awards.',
							array(
								'hasPart' => array(
									array(
										'@type' => 'WebPage',
										'url'   => five_star_eats_page_url( 'winners-2025' ),
										'name'  => '5 Star Eats 2025 Winners',
									),
								),
							)
						),
					),
				)
			);
			break;

		case 'company':
			five_star_eats_print_jsonld(
				array(
					'@context' => 'https://schema.org',
					'@graph'   => array(
						five_star_eats_webpage_node(
							$slug,
							get_the_title(),
							'Learn more about the Grab 5 Star Eats programme and our commitment to celebrating the best restaurants in Malaysia.'
						),
					),
				)
			);
			break;
	}
}
add_action( 'wp_head', 'five_star_eats_schema', 20 );

/**
 * FAQPage graph built from the same source as the visible accordion,
 * so structured data can never drift from on-page content.
 *
 * @return array<string,mixed>
 */
function five_star_eats_faq_graph() {
	$page    = five_star_eats_page_url( 'faq' );
	$main_entity = array();

	foreach ( five_star_eats_faqs() as $index => $faq ) {
		$main_entity[] = array(
			'@type'          => 'Question',
			'@id'            => $page . '#question-' . ( $index + 1 ),
			'name'           => $faq['q'],
			'acceptedAnswer' => array(
				'@type' => 'Answer',
				'text'  => $faq['a'],
			),
		);
	}

	return array(
		'@context'   => 'https://schema.org',
		'@graph'     => array(
			five_star_eats_webpage_node(
				'faq',
				get_the_title(),
				'Frequently asked questions about the Grab 5 Star Eats awards programme.'
			),
			array(
				'@type'      => 'FAQPage',
				'@id'        => $page . '#faq',
				'url'        => $page,
				'inLanguage' => 'en-MY',
				'mainEntity' => $main_entity,
			),
		),
	);
}

/**
 * Winners graph: one ItemList over all winners plus a LocalBusiness
 * node per winner, referenced from the list items by @id.
 *
 * @return array<string,mixed>
 */
function five_star_eats_winners_graph() {
	$page      = five_star_eats_page_url( 'winners-2025' );
	$list_items = array();
	$businesses = array();
	$position   = 0;

	foreach ( five_star_eats_winners() as $category_slug => $category ) {
		foreach ( $category['winners'] as $winner ) {
			++$position;

			$business_id = $page . '#business-' . $position;

			$list_items[] = array(
				'@type'    => 'ListItem',
				'position' => $position,
				'item'     => array( '@id' => $business_id ),
			);

			$businesses[] = array(
				'@type'  => 'LocalBusiness',
				'@id'    => $business_id,
				'name'   => $winner[0],
				'url'    => $page . '#' . $category_slug . '-' . $position,
				'award'  => 'Grab 5 Star Eats 2025 — ' . $category['label'],
				'address' => array(
					'@type'           => 'PostalAddress',
					'addressLocality' => $winner[1],
					'addressCountry'  => 'MY',
				),
			);
		}
	}

	return array(
		'@context' => 'https://schema.org',
		'@graph'   => array_merge(
			array(
				five_star_eats_webpage_node(
					'winners-2025',
					get_the_title(),
					'All 117 Grab 5 Star Eats 2025 winners across 17 categories, grouped by cuisine.'
				),
				array(
					'@type'           => 'ItemList',
					'@id'             => $page . '#itemlist',
					'url'             => $page,
					'name'            => 'Grab 5 Star Eats 2025 Winners',
					'numberOfItems'   => $position,
					'itemListOrder'   => 'https://schema.org/ItemListOrderAscending',
					'itemListElement' => $list_items,
				),
			),
			$businesses
		),
	);
}
