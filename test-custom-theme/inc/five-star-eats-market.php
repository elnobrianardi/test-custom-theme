<?php
/**
 * 5 Star Eats AEO Hub — market (country) detection.
 *
 * Single source of truth for which country market the current site
 * belongs to. Grab runs one WordPress multisite where each country is
 * a separate site addressed by a URL path prefix (e.g. grab.com/my,
 * grab.com/id). Because WordPress's home_url() already carries that
 * prefix, we can detect the market from the site URL automatically.
 *
 * On grab.com (multisite) this means the same theme shows Malaysian or
 * Indonesian content purely by which sub-site it is enabled on.
 *
 * For local / staging environments that do not use a country path, set
 * a constant in wp-config.php (or a mu-plugin) to force the market:
 *
 *     define( 'FSE_MARKET', 'my' );   // or 'id'
 *
 * @package _s
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * List of supported markets and their metadata.
 *
 * @return array<string,array{name:string,country_code:string,locale:string,food_uri:string}>
 */
function five_star_eats_markets() {
	return array(
		'my' => array(
			'name'         => 'Malaysia',
			'country_code' => 'MY',
			'locale'       => 'en-MY',
			'food_uri'     => 'https://food.grab.com/my/en/',
			'dine_out_uri' => 'https://www.grab.com/my/dine-out/',
			'site_uri'     => 'https://www.grab.com/my/',
		),
		'id' => array(
			'name'         => 'Indonesia',
			'country_code' => 'ID',
			'locale'       => 'id-ID',
			'food_uri'     => 'https://food.grab.com/id/id/',
			'dine_out_uri' => 'https://www.grab.com/id/dine-out/',
			'site_uri'     => 'https://www.grab.com/id/',
		),
	);
}

/**
 * Detect the current market from the site URL path.
 *
 * @return string|null Two-letter market key (my, id, ...) or null.
 */
function five_star_eats_detect_market_from_url() {
	$url    = home_url( '/' );
	$parsed = wp_parse_url( $url );
	$path   = isset( $parsed['path'] ) ? trim( (string) $parsed['path'], '/' ) : '';

	if ( '' === $path ) {
		return null;
	}

	// First path segment, e.g. "my" from grab.com/my, "id" from grab.com/id.
	$segment = strtolower( (string) strtok( $path, '/' ) );
	$markets = five_star_eats_markets();

	if ( isset( $markets[ $segment ] ) ) {
		return $segment;
	}

	return null;
}

/**
 * The current market key ('my', 'id') for this site.
 *
 * Resolution order:
 *  1. FSE_MARKET constant (explicit override, ideal for local dev).
 *  2. Auto-detection from the site URL path (grab.com/my, grab.com/id).
 *  3. wp_get_environment_type() is intentionally not used here.
 *  4. Fallback: 'my' (default market / pilot).
 *
 * @return string
 */
function five_star_eats_market() {
	if ( defined( 'FSE_MARKET' ) ) {
		$market = strtolower( (string) FSE_MARKET );
		$markets = five_star_eats_markets();
		if ( isset( $markets[ $market ] ) ) {
			return $market;
		}
	}

	$detected = five_star_eats_detect_market_from_url();
	if ( null !== $detected ) {
		return $detected;
	}

	return 'id';
}

/**
 * Metadata for the current market.
 *
 * @return array<string,mixed>
 */
function five_star_eats_market_data() {
	$market  = five_star_eats_market();
	$markets = five_star_eats_markets();
	return $markets[ $market ];
}

/**
 * Human-readable market name (e.g. "Malaysia").
 *
 * @return string
 */
function five_star_eats_market_name() {
	return (string) five_star_eats_market_data()['name'];
}

/**
 * Two-letter country code (e.g. "MY").
 *
 * @return string
 */
function five_star_eats_country_code() {
	return (string) five_star_eats_market_data()['country_code'];
}

/**
 * Locale tag used in schema/hreflang (e.g. "en-MY").
 *
 * @return string
 */
function five_star_eats_locale() {
	return (string) five_star_eats_market_data()['locale'];
}

/**
 * Food order site URL for this market.
 *
 * @return string
 */
function five_star_eats_food_uri() {
	return (string) five_star_eats_market_data()['food_uri'];
}

/**
 * Dine Out site URL for this market.
 *
 * @return string
 */
function five_star_eats_dine_out_uri() {
	return (string) five_star_eats_market_data()['dine_out_uri'];
}

/**
 * Grab country site URL for this market.
 *
 * @return string
 */
function five_star_eats_site_uri() {
	return (string) five_star_eats_market_data()['site_uri'];
}
