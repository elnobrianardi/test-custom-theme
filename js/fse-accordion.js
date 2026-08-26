/**
 * 5 Star Eats — UIKit accordion fallback.
 *
 * Provides vanilla-JS open/close behaviour for [uk-accordion]
 * elements when UIKit JS is not loaded (local dev, test env).
 *
 * In production on grab.com, UIKit's own JS handles this component
 * and this script is a no-op because UIKit takes over the attribute.
 *
 * @package _s
 */
(function () {
	'use strict';

	// Bail if UIKit JS is already loaded — it handles [uk-accordion].
	if (typeof UIkit !== 'undefined') {
		return;
	}

	document.addEventListener('DOMContentLoaded', function () {
		var accordions = document.querySelectorAll('[uk-accordion]');

		accordions.forEach(function (el) {
			var items = el.querySelectorAll(':scope > li');

			items.forEach(function (li) {
				var title = li.querySelector('.uk-accordion-title, .fse-accordion-title');
				if (!title) {
					return;
				}

				title.addEventListener('click', function (e) {
					e.preventDefault();

					var isOpen = li.classList.contains('uk-open');

					// Close all items in this accordion.
					items.forEach(function (other) {
						other.classList.remove('uk-open');
					});

					// Toggle the clicked item.
					if (!isOpen) {
						li.classList.add('uk-open');
					}
				});
			});
		});
	});
})();
