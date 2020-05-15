/******/ ( function( modules ) {
	// webpackBootstrap
	/******/ // The module cache
	/******/ var installedModules = {}; // The require function
	/******/
	/******/ /******/ function __webpack_require__( moduleId ) {
		/******/
		/******/ // Check if module is in cache
		/******/ if ( installedModules[ moduleId ] ) {
			/******/ return installedModules[ moduleId ].exports;
			/******/
		} // Create a new module (and put it into the cache)
		/******/ /******/ var module = ( installedModules[ moduleId ] = {
			/******/ i: moduleId,
			/******/ l: false,
			/******/ exports: {},
			/******/
		} ); // Execute the module function
		/******/
		/******/ /******/ modules[ moduleId ].call(
			module.exports,
			module,
			module.exports,
			__webpack_require__
		); // Flag the module as loaded
		/******/
		/******/ /******/ module.l = true; // Return the exports of the module
		/******/
		/******/ /******/ return module.exports;
		/******/
	} // expose the modules object (__webpack_modules__)
	/******/
	/******/
	/******/ /******/ __webpack_require__.m = modules; // expose the module cache
	/******/
	/******/ /******/ __webpack_require__.c = installedModules; // define getter function for harmony exports
	/******/
	/******/ /******/ __webpack_require__.d = function(
		exports,
		name,
		getter
	) {
		/******/ if ( ! __webpack_require__.o( exports, name ) ) {
			/******/ Object.defineProperty( exports, name, {
				enumerable: true,
				get: getter,
			} );
			/******/
		}
		/******/
	}; // define __esModule on exports
	/******/
	/******/ /******/ __webpack_require__.r = function( exports ) {
		/******/ if ( typeof Symbol !== 'undefined' && Symbol.toStringTag ) {
			/******/ Object.defineProperty( exports, Symbol.toStringTag, {
				value: 'Module',
			} );
			/******/
		}
		/******/ Object.defineProperty( exports, '__esModule', {
			value: true,
		} );
		/******/
	}; // create a fake namespace object // mode & 1: value is a module id, require it // mode & 2: merge all properties of value into the ns // mode & 4: return value when already ns object // mode & 8|1: behave like require
	/******/
	/******/ /******/ /******/ /******/ /******/ /******/ __webpack_require__.t = function(
		value,
		mode
	) {
		/******/ if ( mode & 1 ) value = __webpack_require__( value );
		/******/ if ( mode & 8 ) return value;
		/******/ if (
			mode & 4 &&
			typeof value === 'object' &&
			value &&
			value.__esModule
		)
			return value;
		/******/ var ns = Object.create( null );
		/******/ __webpack_require__.r( ns );
		/******/ Object.defineProperty( ns, 'default', {
			enumerable: true,
			value: value,
		} );
		/******/ if ( mode & 2 && typeof value != 'string' )
			for ( var key in value )
				__webpack_require__.d(
					ns,
					key,
					function( key ) {
						return value[ key ];
					}.bind( null, key )
				);
		/******/ return ns;
		/******/
	}; // getDefaultExport function for compatibility with non-harmony modules
	/******/
	/******/ /******/ __webpack_require__.n = function( module ) {
		/******/ var getter =
			module && module.__esModule
				? /******/ function getDefault() {
						return module[ 'default' ];
				  }
				: /******/ function getModuleExports() {
						return module;
				  };
		/******/ __webpack_require__.d( getter, 'a', getter );
		/******/ return getter;
		/******/
	}; // Object.prototype.hasOwnProperty.call
	/******/
	/******/ /******/ __webpack_require__.o = function( object, property ) {
		return Object.prototype.hasOwnProperty.call( object, property );
	}; // __webpack_public_path__
	/******/
	/******/ /******/ __webpack_require__.p = ''; // Load entry module and return exports
	/******/
	/******/
	/******/ /******/ return __webpack_require__(
		( __webpack_require__.s = './src/index.js' )
	);
	/******/
} )(
	/************************************************************************/
	/******/ {
		/***/ './assets/js/code.js':
			/*!***************************!*\
  !*** ./assets/js/code.js ***!
  \***************************/
			/*! no static exports found */
			/***/ function( module, exports ) {
				// Site wide Javascript
				jQuery( function( $ ) {
					// Add clipboard button to Code Block
					$( document ).ready( function() {
						// snippets.js
						var snippets = document.querySelectorAll(
							'.wp-block-code'
						);
						[].forEach.call( snippets, function( snippet ) {
							snippet.firstChild.insertAdjacentHTML(
								'beforebegin',
								'<button class="btn" data-clipboard-snippet><i class="far fa-clone"></i></button>'
							);
						} );
						var clipboardSnippets = new ClipboardJS(
							'[data-clipboard-snippet]',
							{
								target: function target( trigger ) {
									return trigger.nextElementSibling;
								},
							}
						);
						clipboardSnippets.on( 'success', function( e ) {
							e.clearSelection();
							showTooltip( e.trigger, 'Copied!' );
						} );
						clipboardSnippets.on( 'error', function( e ) {
							showTooltip(
								e.trigger,
								fallbackMessage( e.action )
							);
						} ); // tooltips.js

						var btns = document.querySelectorAll( '.btn' );

						for ( var i = 0; i < btns.length; i++ ) {
							btns[ i ].addEventListener(
								'mouseleave',
								clearTooltip
							);
							btns[ i ].addEventListener( 'blur', clearTooltip );
						}

						function clearTooltip( e ) {
							e.currentTarget.setAttribute( 'class', 'btn' );
							e.currentTarget.removeAttribute( 'aria-label' );
						}

						function showTooltip( elem, msg ) {
							elem.setAttribute(
								'class',
								'btn tooltipped tooltipped-s'
							);
							elem.setAttribute( 'aria-label', msg );
						} //hljs.initHighlightingOnLoad();
					} );
				} );

				/***/
			},

		/***/ './assets/js/customizer-controls.js':
			/*!******************************************!*\
  !*** ./assets/js/customizer-controls.js ***!
  \******************************************/
			/*! no static exports found */
			/***/ function( module, exports ) {
				jQuery( document ).ready( function() {
					// Reset font size input field back to the default value
					//$('.font-size-reset').on('click', function () {
					//	var resetValue = $(this).attr('font-size-reset-value');
					//	$(this).parent().find('.customize-control-font-size-value').val(resetValue);
					//});
					var $input = $( '#_customize-input-regular_font_size' ),
						$reset = $( '#font-size-reset' );
					$( '#font-size-reset' ).data( 'default', $input.val() );
					$reset.on( 'click', function() {
						$input.val( $( this ).data( 'default' ) );
					} );
				} ); // jQuery( document ).ready

				/***/
			},

		/***/ './assets/js/customizer-preview.js':
			/*!*****************************************!*\
  !*** ./assets/js/customizer-preview.js ***!
  \*****************************************/
			/*! no static exports found */
			/***/ function( module, exports ) {
				/**
				 * This file adds some LIVE to the Theme Customizer live preview. To leverage
				 * this, set your custom settings to 'postMessage' and then add your handling
				 * here. Your javascript should grab settings from customizer controls, and
				 * then make any necessary changes to the page using jQuery.
				 */
				( function( $ ) {
					wp.customize( 'primary_color', function( value ) {
						value.bind( function( to ) {
							//$( 'a' ).css( 'color', to );
							$( ':root' ).css( '--ccp-primary', to );
						} );
					} );
				} )( jQuery );

				/***/
			},

		/***/ './assets/js/editor.js':
			/*!*****************************!*\
  !*** ./assets/js/editor.js ***!
  \*****************************/
			/*! no static exports found */
			/***/ function( module, exports ) {
				wp.domReady( function() {
					wp.blocks.registerBlockStyle( 'core/heading', {
						name: 'default',
						label: 'Default',
						isDefault: true,
					} );
					wp.blocks.registerBlockStyle( 'core/heading', {
						name: 'alt',
						label: 'Alternate',
					} );
					wp.blocks.registerBlockStyle( 'core/group', {
						name: 'default',
						label: 'Default',
						isDefault: true,
					} );
					wp.blocks.registerBlockStyle( 'core/group', {
						name: 'small-padding',
						label: 'Small Padding',
					} );
					wp.blocks.registerBlockStyle( 'core/group', {
						name: 'normal-padding',
						label: 'Normal Padding',
					} );
					wp.blocks.registerBlockStyle( 'core/group', {
						name: 'large-padding',
						label: 'Large Padding',
					} );
					wp.blocks.registerBlockStyle( 'core/button', {
						name: 'fill-alt',
						label: 'Fill Alt',
					} );
					wp.blocks.registerBlockStyle( 'core/button', {
						name: 'outline-alt',
						label: 'Outline Alt',
					} );
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
				} );
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

				/***/
			},

		/***/ './assets/js/main.js':
			/*!***************************!*\
  !*** ./assets/js/main.js ***!
  \***************************/
			/*! no static exports found */
			/***/ function( module, exports ) {
				// Site wide Javascript
				( function( $ ) {} )( jQuery );

				/***/
			},

		/***/ './src/index.js':
			/*!**********************!*\
  !*** ./src/index.js ***!
  \**********************/
			/*! no exports provided */
			/***/ function( module, __webpack_exports__, __webpack_require__ ) {
				'use strict';
				__webpack_require__.r( __webpack_exports__ );
				/* harmony import */ var _assets_js_code_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(
					/*! ../assets/js/code.js */ './assets/js/code.js'
				);
				/* harmony import */ var _assets_js_code_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/ __webpack_require__.n(
					_assets_js_code_js__WEBPACK_IMPORTED_MODULE_0__
				);
				/* harmony import */ var _assets_js_editor_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(
					/*! ../assets/js/editor.js */ './assets/js/editor.js'
				);
				/* harmony import */ var _assets_js_editor_js__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/ __webpack_require__.n(
					_assets_js_editor_js__WEBPACK_IMPORTED_MODULE_1__
				);
				/* harmony import */ var _assets_js_customizer_preview_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(
					/*! ../assets/js/customizer-preview.js */ './assets/js/customizer-preview.js'
				);
				/* harmony import */ var _assets_js_customizer_preview_js__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/ __webpack_require__.n(
					_assets_js_customizer_preview_js__WEBPACK_IMPORTED_MODULE_2__
				);
				/* harmony import */ var _assets_js_main_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(
					/*! ../assets/js/main.js */ './assets/js/main.js'
				);
				/* harmony import */ var _assets_js_main_js__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/ __webpack_require__.n(
					_assets_js_main_js__WEBPACK_IMPORTED_MODULE_3__
				);
				/* harmony import */ var _assets_js_customizer_controls_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(
					/*! ../assets/js/customizer-controls.js */ './assets/js/customizer-controls.js'
				);
				/* harmony import */ var _assets_js_customizer_controls_js__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/ __webpack_require__.n(
					_assets_js_customizer_controls_js__WEBPACK_IMPORTED_MODULE_4__
				);
				/**
				 * Internal dependencies
				 */

				/***/
			},

		/******/
	}
);
//# sourceMappingURL=index.js.map
