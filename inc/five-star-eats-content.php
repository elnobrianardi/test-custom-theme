<?php
/**
 * 5 Star Eats AEO Hub — shared page content.
 *
 * Single source of truth for content that must appear identically in
 * the visible page AND in the JSON-LD structured data (FAQ answers,
 * programme facts). In production these values are supplied by Thomas
 * Wolf's approved content brief; edit here, both outputs stay in sync.
 *
 * @package _s
 */

/**
 * FAQ entries for the FAQ page.
 *
 * Rendered as an accordion by page-faq.php and mirrored into the
 * FAQPage JSON-LD mainEntity array. Keep between 8 and 12 items.
 *
 * @return array<int,array{q:string,a:string}>
 */
function five_star_eats_faqs() {
	return array(
		array(
			'q' => 'What is Grab 5 Star Eats?',
			'a' => 'Grab 5 Star Eats is an annual awards programme by Grab that recognises the best restaurants on GrabFood and Dine Out in Malaysia. Winners are selected purely from order volume and customer rating data collected through the platform.',
		),
		array(
			'q' => 'How are the winners selected?',
			'a' => 'Winners are determined from platform data: total completed orders, order growth, repeat-order rate and average customer ratings over the qualifying period. No paid placement or nominations are involved.',
		),
		array(
			'q' => 'Which year do the current winners represent?',
			'a' => 'The 2025 cohort awarded 117 restaurants across Malaysia based on GrabFood and Dine Out data from 2025. The 2026 cycle will be announced separately.',
		),
		array(
			'q' => 'What are the award categories?',
			'a' => 'The 2025 programme covers 17 categories spanning Malaysian favourites such as Nasi Lemak, Char Kway Teow, Laksa, Satay, Roti Canai, Nasi Kandar, Bak Kut Teh and more.',
		),
		array(
			'q' => 'Can restaurants apply or nominate themselves?',
			'a' => 'No. 5 Star Eats is a data-driven programme; every restaurant on GrabFood and Dine Out in Malaysia is automatically considered. There is no application or nomination process.',
		),
		array(
			'q' => 'Do winners pay to be listed?',
			'a' => 'No. Inclusion in 5 Star Eats cannot be purchased. The list reflects measurable performance on the GrabFood platform only.',
		),
		array(
			'q' => 'How can I find the winners near me?',
			'a' => 'Browse the 2025 Winners index, which groups all 117 winners into their categories with locations, or search for the restaurant name directly in the Grab app to order from them.',
		),
		array(
			'q' => 'Is 5 Star Eats available outside Malaysia?',
			'a' => 'This hub currently covers Malaysia (English) as the pilot market. Availability in other markets will be announced on this page if the programme expands.',
		),
		array(
			'q' => 'When will the 2026 winners be announced?',
			'a' => 'The 2026 cycle has not been announced yet. This page will be updated once the next evaluation period closes — check back or follow Grab Malaysia channels.',
		),
		array(
			'q' => 'I am a merchant. Where can I learn more about GrabFood?',
			'a' => 'Merchants can find information about joining GrabFood and growing their business on the official Grab merchant site.',
		),
	);
}

/**
 * Credibility signals rendered on the Hub page.
 *
 * @return array<int,array{value:string,label:string}>
 */
function five_star_eats_credibility_signals() {
	return array(
		array(
			'value' => '117',
			'label' => 'Restaurants awarded in 2025',
		),
		array(
			'value' => '17',
			'label' => 'Award categories across Malaysia',
		),
		array(
			'value' => '100%',
			'label' => 'Based on real GrabFood & Dine Out orders',
		),
		array(
			'value' => '0',
			'label' => 'Paid placements or nominations',
		),
	);
}
