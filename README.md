## Description

Genesis Starter Theme with customizations to Genesis Sample theme

## Requirement

Works only with Version: 3.0.0-beta

## Installation

Download [Genesis Sample](https://github.com/studiopress/genesis-sample/ "Title") theme, rename the folder genesis-sample-master to obk. Download this repo and move all the files inside obk-master folder to genesis-sample theme.

Add the following code at the end of functions.php

```php
// Custom Functions
//add_theme_support( 'custom-functions', genesis_get_config( 'custom-functions' ) );
//require_once get_stylesheet_directory() . '/custom-functions.php';
require_once( __DIR__ . '/custom-functions.php' );
```