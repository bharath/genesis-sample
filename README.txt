## Description

Genesis Starter Theme with customizations to Genesis Sample theme

## Requirement

Works only with Genesis Sample theme Version: 3.0.0-beta

## Installation

Download this repo and move all the files inside starter-master folder to your Genesis Sample theme.

Add the following code at the end of functions.php

// Custom Functions
require_once( __DIR__ . '/custom-functions.php' );


In custom-functions.php replace 'starter' with your 'theme-name'

// Dequeue default Fonts Source Sans Pro.
wp_dequeue_style( 'starter-fonts' );

// Dequeue default theme styles.
wp_dequeue_style( 'starter' );

Example: If your theme name is genesis-child then 

// Dequeue default Fonts Source Sans Pro.
wp_dequeue_style( 'genesis-child-fonts' );

// Dequeue default theme styles.
wp_dequeue_style( 'genesis-child' );