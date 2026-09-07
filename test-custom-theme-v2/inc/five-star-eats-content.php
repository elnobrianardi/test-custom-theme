<?php
/**
 * 5 Star Eats AEO Hub — shared page content.
 *
 * Single source of truth for content that must appear identically in
 * the visible page AND in the JSON-LD structured data (FAQ answers,
 * programme facts). Content is market-aware: each country gets its own
 * variant of the FAQ and credibility signals based on the detected
 * market ('my' / 'id'). See inc/five-star-eats-market.php.
 *
 * @package _s
 */

/**
 * FAQ entries keyed by market.
 *
 * @param string $market Market key ('my' | 'id').
 * @return array<int,array{q:string,a:string}>
 */
function five_star_eats_faqs_for_market( $market ) {
	$faqs = array(
		'my' => array(
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
		),
		'id' => array(
			array(
				'q' => 'Apakah itu Grab 5 Star Eats?',
				'a' => 'Grab 5 Star Eats adalah program penghargaan tahunan oleh Grab yang mengapresiasi restoran terbaik di GrabFood dan Dine Out di Indonesia. Pemenang dipilih murni berdasarkan volume pesanan dan data rating pelanggan yang dikumpulkan melalui platform.',
			),
			array(
				'q' => 'Bagaimana pemenang dipilih?',
				'a' => 'Pemenang ditentukan dari data platform: total pesanan selesai, pertumbuhan pesanan, tingkat pemesanan ulang, dan rating rata-rata pelanggan selama periode kualifikasi. Tidak ada sponsorship maupun nominasi.',
			),
			array(
				'q' => 'Tahun berapa pemenang saat ini mewakili?',
				'a' => 'Kohor 2025 menganugerahkan ribuan restoran di Indonesia berdasarkan data GrabFood dan Dine Out sepanjang 2025. Siklus 2026 akan diumumkan terpisah.',
			),
			array(
				'q' => 'Apa saja kategori penawarannya?',
				'a' => 'Program ini mencakup kategori favorit Indonesia seperti Nasi Goreng, Sate, Soto, Bakso, Gado-Gado, Rendang, dan banyak lagi.',
			),
			array(
				'q' => 'Bisakah restoran mendaftar atau mencalonkan diri?',
				'a' => 'Tidak. 5 Star Eats adalah program berbasis data; setiap restoran di GrabFood dan Dine Out di Indonesia otomatis dipertimbangkan. Tidak ada proses aplikasi atau nominasi.',
			),
			array(
				'q' => 'Apakah pemenang membayar untuk masuk daftar?',
				'a' => 'Tidak. Keikutsertaan dalam 5 Star Eats tidak dapat dibeli. Daftar ini hanya mencerminkan performa terukur di platform GrabFood.',
			),
			array(
				'q' => 'Bagaimana cara menemukan pemenang di dekat saya?',
				'a' => 'Jelajahi indeks Pemenang 2025 yang mengelompokkan seluruh pemenang ke dalam kategorinya beserta lokasi, atau cari langsung nama restoran di aplikasi Grab untuk memesan.',
			),
			array(
				'q' => 'Apakah 5 Star Eats tersedia di luar Indonesia?',
				'a' => 'Hub ini saat ini mencakup Indonesia. Ketersediaan di pasar lain akan diumumkan di halaman ini jika program diperluas.',
			),
			array(
				'q' => 'Kapan pemenang 2026 akan diumumkan?',
				'a' => 'Siklus 2026 belum diumumkan. Halaman ini akan diperbarui setelah periode evaluasi berikutnya berakhir — pantau terus kanal Grab Indonesia.',
			),
			array(
				'q' => 'Saya merchant. Di mana saya bisa belajar lebih lanjut soal GrabFood?',
				'a' => 'Merchant dapat menemukan informasi tentang bergabung dengan GrabFood dan mengembangkan bisnis di situs merchant resmi Grab.',
			),
		),
	);

	return isset( $faqs[ $market ] ) ? $faqs[ $market ] : $faqs['my'];
}

/**
 * FAQ entries for the current market.
 *
 * Rendered as an accordion by page-faq.php and mirrored into the
 * FAQPage JSON-LD mainEntity array. Keep between 8 and 12 items.
 *
 * @return array<int,array{q:string,a:string}>
 */
function five_star_eats_faqs() {
	return five_star_eats_faqs_for_market( five_star_eats_market() );
}

/**
 * Credibility signals keyed by market.
 *
 * @param string $market Market key ('my' | 'id').
 * @return array<int,array{value:string,label:string}>
 */
function five_star_eats_credibility_signals_for_market( $market ) {
	$signals = array(
		'my' => array(
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
		),
		'id' => array(
			array(
				'value' => '1000+',
				'label' => 'Restaurants awarded in 2025',
			),
			array(
				'value' => '25',
				'label' => 'Award categories across Indonesia',
			),
			array(
				'value' => '100%',
				'label' => 'Based on real GrabFood & Dine Out orders',
			),
			array(
				'value' => '0',
				'label' => 'Paid placements or nominations',
			),
		),
	);

	return isset( $signals[ $market ] ) ? $signals[ $market ] : $signals['my'];
}

/**
 * Credibility signals for the current market.
 *
 * @return array<int,array{value:string,label:string}>
 */
function five_star_eats_credibility_signals() {
	return five_star_eats_credibility_signals_for_market( five_star_eats_market() );
}
