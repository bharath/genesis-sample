"use strict";

// Site wide Javascript
jQuery(function ($) {
  // Add clipboard button to Code Block
  $(document).ready(function () {
    // snippets.js
    var snippets = document.querySelectorAll('.wp-block-code');
    [].forEach.call(snippets, function (snippet) {
      snippet.firstChild.insertAdjacentHTML('beforebegin', '<button class="btn" data-clipboard-snippet><i class="far fa-clone"></i></button>');
    });
    var clipboardSnippets = new ClipboardJS('[data-clipboard-snippet]', {
      target: function target(trigger) {
        return trigger.nextElementSibling;
      }
    });
    clipboardSnippets.on('success', function (e) {
      e.clearSelection();
      showTooltip(e.trigger, 'Copied!');
    });
    clipboardSnippets.on('error', function (e) {
      showTooltip(e.trigger, fallbackMessage(e.action));
    }); // tooltips.js

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
    } //hljs.initHighlightingOnLoad();

  });
});
"use strict";

jQuery(document).ready(function () {
  // Reset font size input field back to the default value
  //$('.font-size-reset').on('click', function () {
  //	var resetValue = $(this).attr('font-size-reset-value');
  //	$(this).parent().find('.customize-control-font-size-value').val(resetValue);
  //});
  var $input = $('#_customize-input-regular_font_size'),
      $reset = $('#font-size-reset');
  $('#font-size-reset').data('default', $input.val());
  $reset.on('click', function () {
    $input.val($(this).data('default'));
  });
}); // jQuery( document ).ready
"use strict";

/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and
 * then make any necessary changes to the page using jQuery.
 */
(function ($) {
  wp.customize('primary_color', function (value) {
    value.bind(function (to) {
      //$( 'a' ).css( 'color', to );
      $(':root').css('--ccp-primary', to);
    });
  });
})(jQuery);
"use strict";

wp.domReady(function () {
  wp.blocks.registerBlockStyle('core/heading', {
    name: 'default',
    label: 'Default',
    isDefault: true
  });
  wp.blocks.registerBlockStyle('core/heading', {
    name: 'alt',
    label: 'Alternate'
  });
  wp.blocks.registerBlockStyle('core/group', {
    name: 'default',
    label: 'Default',
    isDefault: true
  });
  wp.blocks.registerBlockStyle('core/group', {
    name: 'small-padding',
    label: 'Small Padding'
  });
  wp.blocks.registerBlockStyle('core/group', {
    name: 'normal-padding',
    label: 'Normal Padding'
  });
  wp.blocks.registerBlockStyle('core/group', {
    name: 'large-padding',
    label: 'Large Padding'
  });
  wp.blocks.registerBlockStyle('core/button', {
    name: 'fill-alt',
    label: 'Fill Alt'
  });
  wp.blocks.registerBlockStyle('core/button', {
    name: 'outline-alt',
    label: 'Outline Alt'
  });
  /*
  // If your theme needs custom style uncomment this
  wp.blocks.unregisterBlockStyle( 'core/button', 'default' );
  wp.blocks.unregisterBlockStyle( 'core/button', 'outline' );
  wp.blocks.unregisterBlockStyle( 'core/button', 'squared' );
  wp.blocks.unregisterBlockStyle( 'core/button', 'circular' );
  wp.blocks.unregisterBlockStyle( 'core/button', 'dark' );
  	wp.blocks.registerBlockStyle( 'core/button', {
  	name: 'custom',
  	label: 'Custom'
  } );
  	wp.blocks.registerBlockStyle( 'core/button', {
  	name: 'custom-dark',
  	label: 'Custom Dark'
  } );
  */
});
/*
// If your theme needs custom style uncomment this
// Our filter function
function setBlockCustomClassName( className, blockName ) {
	return blockName === 'core/button' ?
		'wp-block-button is-style-custom' :
		className;
}

// Adding the filter
wp.hooks.addFilter(
	'blocks.getBlockDefaultClassName',
	'wp-block-button/set-block-custom-class-name',
	setBlockCustomClassName
);
*/
"use strict"; // Site wide Javascript

jQuery(function ($) {
  // Add clipboard button to Code Block
  $(document).ready(function () {
    // snippets.js
    var snippets = document.querySelectorAll('.wp-block-code');
    [].forEach.call(snippets, function (snippet) {
      snippet.firstChild.insertAdjacentHTML('beforebegin', '<button class="btn" data-clipboard-snippet><i class="far fa-clone"></i></button>');
    });
    var clipboardSnippets = new ClipboardJS('[data-clipboard-snippet]', {
      target: function target(trigger) {
        return trigger.nextElementSibling;
      }
    });
    clipboardSnippets.on('success', function (e) {
      e.clearSelection();
      showTooltip(e.trigger, 'Copied!');
    });
    clipboardSnippets.on('error', function (e) {
      showTooltip(e.trigger, fallbackMessage(e.action));
    }); // tooltips.js

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
    } //hljs.initHighlightingOnLoad();

  });
});
"use strict";
/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and
 * then make any necessary changes to the page using jQuery.
 */


(function ($) {
  wp.customize('primary_color', function (value) {
    value.bind(function (to) {
      //$( 'a' ).css( 'color', to );
      $(':root').css('--ccp-primary', to);
    });
  });
})(jQuery);