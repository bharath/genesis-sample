## Installation

1. Download this repo and move all the files inside starter-master folder to genesis-sample theme folder.

2. Change genesis-sample theme folder to any name you want depending on the project you are working, or you can leave it as genesis-sample.

3. Open style.css and change the settings in header as needed.

```css
/*
Theme Name: Starter
Theme URI: https://bharath.blog/
Description: This is the genesis starter theme created for Bharath's Blog.
Author: Bharath
Author URI: https://bharath.dev/
``` 

4. Open assets/css/style-main.css and change the settings in header to match what you have done in step 3.

5. Open Add the following code at the end of functions.php

```php
// Custom Functions
//add_theme_support( 'custom-functions', genesis_get_config( 'custom-functions' ) );
//require_once get_stylesheet_directory() . '/assets/custom-functions.php';
require_once( __DIR__ . '/custom-functions.php' );

// Genesis Design System
//require_once get_stylesheet_directory() . '/assets/genesis-design-system.php';
//require_once( __DIR__ . '/assets/genesis-design-system.php' );
``` 

6. In custom-functions.php replace 'starter' with your 'theme-name'. Its on line 21 and 24.

Example: If you changed your theme name to genesis-child in step 2, then change 

```php
// Dequeue default Fonts Source Sans Pro.
wp_dequeue_style( 'starter-fonts' );

// Dequeue default theme styles.
wp_dequeue_style( 'starter' );
``` 

to

```php
// Dequeue default Fonts Source Sans Pro.
wp_dequeue_style( 'genesis-child-fonts' );

// Dequeue default theme styles.
wp_dequeue_style( 'genesis-child' );
``` 

## Customization

7. In assets/css/style-var.css add your own Custom Color Palette for Front End & Gutenberg. Its between lines 135 - 141

8. In custom-functions.php change editor-color-palette values as per your color scheme. Its between lines 276 - 315.

9. In custom-functions.php change editor-font-sizes values as per your design. Its between lines 329 - 358.

10. Open assets/css/front-end.css and make changes as per your color pallette & editor-font-sizes. Its between lines 441 - 576.

11. Open assets/css/style-editor.css and make changes as per your color pallette & editor-font-sizes. Its between lines 424 - 442.

12. Open assets/css/style-main.css and make changes as per your color pallette & editor-font-sizes. Its between lines 1849 - 1883.