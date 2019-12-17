// Site wide Javascript
jQuery( function( $ ) {

	// Add clipboard button to Code Block
	$(document).ready(function () {

		// snippets.js
		var snippets = document.querySelectorAll('.wp-block-code');

		[].forEach.call(snippets, function (snippet) {
			snippet.firstChild.insertAdjacentHTML('beforebegin', '<button class="btn" data-clipboard-snippet><i class="far fa-clone"></i></button>');
		});

		var clipboardSnippets = new ClipboardJS('[data-clipboard-snippet]', {
			target: function (trigger) {
				return trigger.nextElementSibling;
			}
		});

		clipboardSnippets.on('success', function (e) {
			e.clearSelection();

			showTooltip(e.trigger, 'Copied!');
		});

		clipboardSnippets.on('error', function (e) {
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


		//hljs.initHighlightingOnLoad();

	});

});
