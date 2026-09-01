/**
 * 5 Star Eats — Vanilla JS accordion.
 *
 * Toggles items inside a [data-accordion] container.
 * Clicking an item's summary button collapses/expands its panel by
 * toggling the .is-open class (and aria-expanded / hidden state).
 *
 * @package _s
 */
(function () {
	'use strict';

	document.addEventListener('DOMContentLoaded', function () {
		const accordions = document.querySelectorAll('[data-accordion]');

		accordions.forEach(function (container) {
			const items = container.querySelectorAll('.fse-accordion-item');
			const panels = container.querySelectorAll('.fse-accordion-panel');

			// Close all panels, then optionally force one open.
			function setAllClosed() {
				items.forEach(function (item) {
					item.classList.remove('is-open');
				});
				panels.forEach(function (panel) {
					panel.classList.add('hidden');
				});
			}

			function openItem(item, panel) {
				setAllClosed();
				item.classList.add('is-open');
				panel.classList.remove('hidden');
			}

			items.forEach(function (item, index) {
				const button = item.querySelector('.fse-accordion-summary');
				const panel = panels[index];
				if (!button || !panel) {
					return;
				}

				button.addEventListener('click', function () {
					const isOpen = item.classList.contains('is-open');

					if (isOpen) {
						setAllClosed();
						button.setAttribute('aria-expanded', 'false');
					} else {
						openItem(item, panel);
						button.setAttribute('aria-expanded', 'true');
					}
				});

				// Sync aria-expanded with the initial open state.
				button.setAttribute('aria-expanded', item.classList.contains('is-open') ? 'true' : 'false');
			});
		});
	});
})();
