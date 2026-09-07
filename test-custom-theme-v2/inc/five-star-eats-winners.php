<?php
/**
 * 5 Star Eats AEO Hub — winner dataset.
 *
 * Structured source data for the 2025 Winners page, keyed by market.
 * Rendered as plain HTML by page-winners-2025.php and consumed by the
 * ItemList + LocalBusiness JSON-LD builder. See
 * inc/five-star-eats-market.php for market detection.
 *
 * TEST SUBSET: the Malaysia array is trimmed to 20 entries for local
 * testing only. Replace with the verified, developer-ready dataset
 * from Thomas Wolf (117 winners across all 17 categories) before
 * launch. The shape of each entry must stay: array( name, locality ).
 *
 * The Indonesia array is a small placeholder to demonstrate structure;
 * replace with the verified Indonesian dataset before launch.
 *
 * @package _s
 */

/**
 * Winner dataset grouped by category, keyed by market.
 *
 * Category order defines both the jump navigation order and ItemList
 * positions, so treat each market's array as its single ordering
 * authority.
 *
 * @param string $market Market key ('my' | 'id').
 * @return array<string,array{label:string,winners:array<int,array{0:string,1:string}>}>
 */
function five_star_eats_winners_for_market( $market ) {
	$data = array(
		'my' => array(
			'best-nasi-lemak'         => array(
				'label'   => 'Best Nasi Lemak',
				'image'   => 'https://images.unsplash.com/photo-1740969136580-05d6f2d1838c?w=400&h=400&fit=crop',
				'winners' => array(
					array( 'Village Park Restaurant', 'Damansara Uptown, Selangor' ),
					array( 'Nasi Lemak Wanjo', 'Kampung Baru, Kuala Lumpur' ),
				),
			),
			'best-laksa'              => array(
				'label'   => 'Best Laksa',
				'image'   => 'https://images.unsplash.com/photo-1768703321790-e09a80a46f2c?w=400&h=400&fit=crop',
				'winners' => array(
					array( 'Asam Laksa Air Itam', 'Air Itam, Pulau Pinang' ),
					array( 'Nyonya Laksa Melaka', 'Melaka' ),
				),
			),
			'best-satay'              => array(
				'label'   => 'Best Satay',
				'image'   => 'https://images.unsplash.com/photo-1772855386828-a18ff9a12584?w=400&h=400&fit=crop',
				'winners' => array(
					array( 'Satay Kajang Hj Samuri', 'Kajang, Selangor' ),
				),
			),
			'best-hainanese-chicken-rice' => array(
				'label'   => 'Best Hainanese Chicken Rice',
				'image'   => 'https://images.unsplash.com/photo-1741241857887-321f7fbcacf2?w=400&h=400&fit=crop',
				'winners' => array(
					array( 'Chee Meng Hainanese Chicken Rice', 'Kuala Lumpur' ),
				),
			),
			'best-dim-sum'            => array(
				'label'   => 'Best Dim Sum',
				'image'   => 'https://images.unsplash.com/photo-1756367201317-3d1494092529?w=400&h=400&fit=crop',
				'winners' => array(
					array( 'Foh San Dim Sum', 'Ipoh, Perak' ),
				),
			),
			'best-wantan-mee'         => array(
				'label'   => 'Best Wantan Mee',
				'image'   => 'https://images.unsplash.com/photo-1746183055178-e4d5889140f0?w=400&h=400&fit=crop',
				'winners' => array(
					array( 'Ho Weng Kee Wantan Mee', 'SS15, Subang Jaya' ),
				),
			),
			'best-ikan-bakar'         => array(
				'label'   => 'Best Ikan Bakar',
				'image'   => 'https://images.unsplash.com/photo-1718942899999-b3da4177ee2a?w=400&h=400&fit=crop',
				'winners' => array(
					array( 'Ikan Bakar Parameswara', 'Melaka' ),
				),
			),
			'best-coffee-and-cafes'   => array(
				'label'   => 'Best Coffee & Cafes',
				'image'   => 'https://images.unsplash.com/photo-1509042239860-f550ce710b93?w=400&h=400&fit=crop',
				'winners' => array(
					array( 'VCR Coffee', 'Kuala Lumpur' ),
				),
			),
		),
		'id' => array(
			'best-nasi-goreng'    => array(
				'label'   => 'Best Nasi Goreng',
				'image'   => 'https://images.unsplash.com/photo-1512058564366-18510be2db19?w=400&h=400&fit=crop',
				'winners' => array(
					array( 'Sample Nasi Goreng Spot', 'Jakarta' ),
				),
			),
			'best-sate'           => array(
				'label'   => 'Best Sate',
				'image'   => 'https://images.unsplash.com/photo-1742808838159-1848c1a36209?w=400&h=400&fit=crop',
				'winners' => array(
					array( 'Sample Sate Spot', 'Bandung' ),
				),
			),
			'best-bakso'          => array(
				'label'   => 'Best Bakso',
				'image'   => 'https://images.unsplash.com/photo-1747317368514-590dad462536?w=400&h=400&fit=crop',
				'winners' => array(
					array( 'Sample Bakso Spot', 'Surabaya' ),
				),
			),
		),
	);

	return isset( $data[ $market ] ) ? $data[ $market ] : $data['my'];
}

/**
 * Winner dataset for the current market.
 *
 * @return array<string,array{label:string,winners:array<int,array{0:string,1:string}>}>
 */
function five_star_eats_winners() {
	return five_star_eats_winners_for_market( five_star_eats_market() );
}
