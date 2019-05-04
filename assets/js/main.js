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
		var snippets = document.querySelectorAll('pre');

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

    //hljs.initHighlightingOnLoad();
    

    $("pre.lang-html, pre[rel=HTML]").find("code").addClass("language-markup"),
    $("code.html, code.lang-html").removeClass().addClass("language-markup").parent().attr("rel", "HTML"),
    $("code.javascript").removeClass().addClass("language-javascript").attr("rel", "JavaScript"),
    $("pre[rel=JavaScript], pre.lang-js, pre.JavaScript").attr("rel", "JavaScript").find("code").removeClass().addClass("language-javascript"),
    $("pre[rel=jQuery]").find("code").removeClass().addClass("language-javascript"),
    $("pre[rel='CSS'], pre[rel='LESS']").find("code").removeClass().addClass("language-css"),
    $("code.css, code.lang-css").removeClass().addClass("language-css").parent().attr("rel", "CSS"),
    $("pre[rel='Sass'], pre[rel='SASS'], pre[rel='SCSS']").removeClass().addClass("language-scss"),
    $("pre[rel=PHP]").attr("rel", "PHP").find("code").removeClass().addClass("language-javascript"),
    $("code.php").removeClass().addClass("language-javascript").parent().attr("rel", "PHP");

})(jQuery);