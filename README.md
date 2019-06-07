## Description

Genesis Starter Theme with customizations to Genesis Sample theme

## Requirement

Works only with Genesis Sample theme Version: 3.0.0-beta

## Installation

Download [Genesis Sample](https://github.com/studiopress/genesis-sample/ "Title") theme, rename the folder genesis-sample-master to obk. Download this repo and move all the files inside obk-master folder to genesis-sample theme.

Add the following code at the end of `functions.php`

```php
// Custom Functions
require_once( __DIR__ . '/custom-functions.php' );
```

Change the Theme Name in `style.css` as follows.

```css
/*
Theme Name: Genesis Sample
```

to

```css
/*
Theme Name: obk
```