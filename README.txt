## Description

Genesis Starter Theme with customizations to Genesis Sample theme

## Requirement

Works only with Genesis Sample theme Version: 3.0.0-beta

## Installation

Download this repo and move all the files inside starter-master folder to your [Genesis Sample](https://github.com/studiopress/genesis-sample/ "Title") theme.

Add the following code at the end of functions.php

// Custom Functions
require_once( __DIR__ . '/custom-functions.php' );


In custom-functions.php change


// Dequeue default Fonts Source Sans Pro.
wp_dequeue_style( 'starter-fonts' );

// Dequeue default theme styles.
wp_dequeue_style( 'starter' );

to

// Dequeue default Fonts Source Sans Pro.
wp_dequeue_style( 'your-theme-name-fonts' );

// Dequeue default theme styles.
wp_dequeue_style( 'your-theme-name' );