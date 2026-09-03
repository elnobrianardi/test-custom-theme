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
				'image'   => 'https://placehold.co/200x200/e6e6e6/ffffff?text=Best+Nasi+Lemak',
				'winners' => array(
					array( 'Village Park Restaurant', 'Damansara Uptown, Selangor' ),
					array( 'Nasi Lemak Wanjo', 'Kampung Baru, Kuala Lumpur' ),
				),
			),
			'best-char-kway-teow'     => array(
				'label'   => 'Best Char Kway Teow',
				'image'   => 'https://placehold.co/200x200/e6e6e6/ffffff?text=Best+Char+Kway+Teow',
				'winners' => array(
					array( 'Ah Leng Char Koay Teow', 'George Town, Pulau Pinang' ),
					array( 'Siam Road Char Koay Teow', 'George Town, Pulau Pinang' ),
				),
			),
			'best-laksa'              => array(
				'label'   => 'Best Laksa',
				'image'   => 'https://placehold.co/200x200/e6e6e6/ffffff?text=Best+Laksa',
				'winners' => array(
					array( 'Asam Laksa Air Itam', 'Air Itam, Pulau Pinang' ),
					array( 'Nyonya Laksa Melaka', 'Melaka' ),
				),
			),
			'best-satay'              => array(
				'label'   => 'Best Satay',
				'image'   => 'https://placehold.co/200x200/e6e6e6/ffffff?text=Best+Satay',
				'winners' => array(
					array( 'Satay Kajang Hj Samuri', 'Kajang, Selangor' ),
				),
			),
			'best-roti-canai'         => array(
				'label'   => 'Best Roti Canai',
				'image'   => 'https://placehold.co/200x200/e6e6e6/ffffff?text=Best+Roti+Canai',
				'winners' => array(
					array( 'Roti Canai Kayu Arang', 'Petaling Jaya, Selangor' ),
				),
			),
			'best-nasi-kandar'        => array(
				'label'   => 'Best Nasi Kandar',
				'image'   => 'https://placehold.co/200x200/e6e6e6/ffffff?text=Best+Nasi+Kandar',
				'winners' => array(
					array( 'Line Clear Nasi Kandar', 'George Town, Pulau Pinang' ),
				),
			),
			'best-bak-kut-teh'        => array(
				'label'   => 'Best Bak Kut Teh',
				'image'   => 'https://placehold.co/200x200/e6e6e6/ffffff?text=Best+Bak+Kut+Teh',
				'winners' => array(
					array( 'Kee Heong Bak Kut Teh', 'Klang, Selangor' ),
				),
			),
			'best-hainanese-chicken-rice' => array(
				'label'   => 'Best Hainanese Chicken Rice',
				'image'   => 'https://placehold.co/200x200/e6e6e6/ffffff?text=Best+Hainanese+Chicken+Rice',
				'winners' => array(
					array( 'Chee Meng Hainanese Chicken Rice', 'Kuala Lumpur' ),
				),
			),
			'best-hokkien-mee'        => array(
				'label'   => 'Best Hokkien Mee',
				'image'   => 'https://placehold.co/200x200/e6e6e6/ffffff?text=Best+Hokkien+Mee',
				'winners' => array(
					array( 'Kim Lian Kee', 'Chinatown, Kuala Lumpur' ),
				),
			),
			'best-dim-sum'            => array(
				'label'   => 'Best Dim Sum',
				'image'   => 'https://placehold.co/200x200/e6e6e6/ffffff?text=Best+Dim+Sum',
				'winners' => array(
					array( 'Foh San Dim Sum', 'Ipoh, Perak' ),
				),
			),
			'best-wantan-mee'         => array(
				'label'   => 'Best Wantan Mee',
				'image'   => 'https://placehold.co/200x200/e6e6e6/ffffff?text=Best+Wantan+Mee',
				'winners' => array(
					array( 'Ho Weng Kee Wantan Mee', 'SS15, Subang Jaya' ),
				),
			),
			'best-ikan-bakar'         => array(
				'label'   => 'Best Ikan Bakar',
				'image'   => 'https://placehold.co/200x200/e6e6e6/ffffff?text=Best+Ikan+Bakar',
				'winners' => array(
					array( 'Ikan Bakar Parameswara', 'Melaka' ),
				),
			),
			'best-mamak-cuisine'      => array(
				'label'   => 'Best Mamak Cuisine',
				'image'   => 'https://placehold.co/200x200/e6e6e6/ffffff?text=Best+Mamak+Cuisine',
				'winners' => array(
					array( "Devi's Corner", 'Bangsar, Kuala Lumpur' ),
				),
			),
			'best-nyonya-cuisine'     => array(
				'label'   => 'Best Nyonya Cuisine',
				'image'   => 'https://placehold.co/200x200/e6e6e6/ffffff?text=Best+Nyonya+Cuisine',
				'winners' => array(
					array( "Nancy's Kitchen", 'Melaka' ),
				),
			),
			'best-desserts-and-cendol' => array(
				'label'   => 'Best Desserts & Cendol',
				'image'   => 'https://placehold.co/200x200/e6e6e6/ffffff?text=Best+Desserts+%26+Cendol',
				'winners' => array(
					array( 'Penang Road Famous Teochew Chendul', 'George Town, Pulau Pinang' ),
				),
			),
			'best-coffee-and-cafes'   => array(
				'label'   => 'Best Coffee & Cafes',
				'image'   => 'https://placehold.co/200x200/e6e6e6/ffffff?text=Best+Coffee+%26+Cafes',
				'winners' => array(
					array( 'VCR Coffee', 'Kuala Lumpur' ),
				),
			),
			'best-late-night-eats'    => array(
				'label'   => 'Best Late-Night Eats',
				'image'   => 'https://placehold.co/200x200/e6e6e6/ffffff?text=Best+Late-Night+Eats',
				'winners' => array(
					array( 'Sup Tulang Kampung Pandan Circle', 'Kampung Pandan, Kuala Lumpur' ),
				),
			),
		),
		'id' => array(
			'best-nasi-goreng'    => array(
				'label'   => 'Best Nasi Goreng',
				'image'   => 'https://placehold.co/200x200/e6e6e6/ffffff?text=Best+Nasi+Goreng',
				'winners' => array(
					array( 'Sample Nasi Goreng Spot', 'Jakarta' ),
				),
			),
			'best-sate'           => array(
				'label'   => 'Best Sate',
				'image'   => 'https://placehold.co/200x200/e6e6e6/ffffff?text=Best+Sate',
				'winners' => array(
					array( 'Sample Sate Spot', 'Bandung' ),
				),
			),
			'best-bakso'          => array(
				'label'   => 'Best Bakso',
				'image'   => 'https://placehold.co/200x200/e6e6e6/ffffff?text=Best+Bakso',
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
