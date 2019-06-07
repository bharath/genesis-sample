// Site wide Javascript
(function($) {	

	$(document).ready(function () {

		// demos.js
		var clipboardDemos = new ClipboardJS('[data-clipboard-demo]');

		clipboardDemos.on('success', function(e) {
			e.clearSelection();

			console.info('Action:', e.action);
			console.info('Text:', e.text);
			console.info('Trigger:', e.trigger);

			showTooltip(e.trigger, 'Copied!');
		});

		clipboardDemos.on('error', function(e) {
			console.error('Action:', e.action);
			console.error('Trigger:', e.trigger);

			showTooltip(e.trigger, fallbackMessage(e.action));
		});


		// snippets.js
		var snippets = document.querySelectorAll('.wp-block-code');

		[].forEach.call(snippets, function(snippet) {
			snippet.firstChild.insertAdjacentHTML('beforebegin', '<button class="btn" data-clipboard-snippet><i class="far fa-clone"></i></button>');
			//snippet.firstChild.insertAdjacentHTML('beforebegin', '<button class="btn" data-clipboard-snippet><img class="clippy" width="13" src="/wp-content/themes/blog/images/clippy.svg" alt="Copy to clipboard"></button>');

        });

		var clipboardSnippets = new ClipboardJS('[data-clipboard-snippet]', {
			target: function(trigger) {
				return trigger.nextElementSibling;
			}
		});

		clipboardSnippets.on('success', function(e) {
			e.clearSelection();

			showTooltip(e.trigger, 'Copied!');
		});

		clipboardSnippets.on('error', function(e) {
			showTooltip(e.trigger, fallbackMessage(e.action));
		});


		// tooltips.js

		var btns = document.querySelectorAll('.btn');

		for (var i = 0; i < btns.length; i++) {
			btns[i].addEventListener('mouseleave', clearTooltip);
			btns[i].addEventListener('blur', clearTooltip);
		}

		function clearTooltip(e) {
			e.currentTarget.setAttribute('class', 'btn');
			e.currentTarget.removeAttribute('aria-label');
		}

		function showTooltip(elem, msg) {
			elem.setAttribute('class', 'btn tooltipped tooltipped-s');
			elem.setAttribute('aria-label', msg);
		}

	});


    var toggler = document.querySelector('.theme-toggler input[type="checkbox"]'),
	root = document.documentElement,
	currentTheme = localStorage.getItem('theme') || "dark";

	if (currentTheme == "light") toggler.removeAttribute('checked');
	else toggler.checked = "true";

	root.setAttribute('data-theme', currentTheme);

	toggler.addEventListener('change', toggleTheme, false);

	function toggleTheme(e) {
		if (this.checked) {
			root.setAttribute('data-theme', 'dark');
			localStorage.setItem('theme', 'dark');
		}
		else {
			root.setAttribute('data-theme', 'light');
			localStorage.setItem('theme', 'light');
		}
	}


})(jQuery);