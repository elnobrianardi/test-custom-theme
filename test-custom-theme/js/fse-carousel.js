/**
 * 5 Star Eats — Vanilla JS carousel.
 *
 * Renders a sliding track inside [data-carousel] containers. Each .fse-slide
 * is translated horizontally by JS; CSS only provides layout + transition.
 *
 * @package _s
 */
(function () {
	'use strict';

	document.addEventListener('DOMContentLoaded', function () {
		document.querySelectorAll('[data-carousel]').forEach(function (carousel) {
			const track = carousel.querySelector('.fse-carousel-track');
			const slides = carousel.querySelectorAll('.fse-carousel-slide');
			if (!track || slides.length === 0) {
				return;
			}

			let index = 0;
			const total = slides.length;

			const prev = carousel.querySelector('[data-carousel-prev]');
			const next = carousel.querySelector('[data-carousel-next]');

			function goTo(i) {
				index = (i + total) % total;
				track.style.transform = 'translateX(-' + index * 100 + '%)';
				update();
			}

			function update() {
				if (prev) {
					prev.disabled = index === 0;
				}
				if (next) {
					next.disabled = index === total - 1;
				}
			}

			if (next) {
				next.addEventListener('click', function () {
					goTo(index + 1);
				});
			}
			if (prev) {
				prev.addEventListener('click', function () {
					goTo(index - 1);
				});
			}

			update();
		});
	});
})();
