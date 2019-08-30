# Description

Customizations to Genesis Sample theme to use as a Starter theme. [Learn More](https://bharath.blog/)

## Requirement

Tested and works with Genesis Sample theme Version: 3.1.0

This will be tested and updated when a new Genesis Sample update is released.

## Getting started

1. Download this repo and move all the files inside genesis-sample-master folder to genesis-sample theme folder.

2. Open functions.php and add the following code at the end.

```php
// Custom Functions.
require_once get_stylesheet_directory() . '/inc/custom-functions.php';

// WordPress Cleanup.
require_once get_stylesheet_directory() . '/inc/wordpress-cleanup.php';

// Customizer Options.
require_once get_stylesheet_directory() . '/inc/customizer.php';

// Gutenberg Options.
require_once get_stylesheet_directory() . '/inc/gutenberg.php';

// Editor Color palette and fonts.
require_once get_stylesheet_directory() . '/inc/editor-colors-fonts.php';

// Woocommerce Options.
require_once get_stylesheet_directory() . '/inc/woocommerce.php';

// Automattic Options.
require_once get_stylesheet_directory() . '/inc/automattic.php';

// ACF Options.
require_once get_stylesheet_directory() . '/inc/acf.php';

```

6. That's it.
