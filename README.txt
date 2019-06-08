## Description

Genesis Starter Theme with customizations to Genesis Sample theme

## Requirement

Works only with Genesis Sample theme Version: 3.0.0-beta

## Installation

1. Download this repo and move all the files inside starter-master folder to your Genesis Sample theme.

2. Change your theme folder to any name you want depending on the project you are working, or you can leave it as genesis-sample.

3. Open style.css and change the settings in header as needed.

4. Open assets/css/style-main.css and change the settings in header to match what you have done in step 4.

5. Open Add the following code at the end of functions.php

// Custom Functions
require_once( __DIR__ . '/custom-functions.php' );

6. In custom-functions.php replace 'starter' on line 23 and 26 with your 'theme-name'

Example: If your theme name is genesis-child then change 

// Dequeue default Fonts Source Sans Pro.
wp_dequeue_style( 'starter-fonts' );

// Dequeue default theme styles.
wp_dequeue_style( 'starter' );

to

// Dequeue default Fonts Source Sans Pro.
wp_dequeue_style( 'genesis-child-fonts' );

// Dequeue default theme styles.
wp_dequeue_style( 'genesis-child' );