# Description

Customizations to Genesis Sample theme to use as a Starter theme. [Learn More](https://bharath.blog/)

## Requirement

Tested and works with Genesis Sample theme Version: 3.0.0

This Will be tested and updated when a new Genesis Sample update is released.

## Getting started

1. Download this repo and move all the files inside starter-master folder to genesis-sample theme folder.

2. Change genesis-sample theme folder to any name you want depending on the project you are working, or you can leave it as genesis-sample.

3. Open style.css and change the settings in header as needed.

Example: If you changed your theme name to genesis-child in step 2, then change the following

```css
/*
Theme Name: Genesis Sample
``` 
to

```css
/*
Theme Name: Genesis Child
``` 

4. Open assets/css/style-main.css and change the settings in header to match what you have done in step 3.

5. Open functions.php and add the following code at the end.

```php
// Custom Functions
require_once( __DIR__ . '/custom-functions.php' );
``` 

6. In custom-functions.php replace 'starter' with your 'theme-name'. Its on line 21 and 24.

Example: If you changed your theme name to genesis-child in step 2, then change the following

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

7. That's it. If you want to customize it further, read INSTRUCTIONS.md