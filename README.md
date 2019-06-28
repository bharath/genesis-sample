# Description

Customizations to Genesis Sample theme to use as a Starter theme. [Learn More](https://bharath.blog/)

## Requirement

Tested and works with Genesis Sample theme Version: 3.0.1

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

6. That's it. If you want to customize it further, read INSTRUCTIONS.md

## File Structure

```

├── INSTRUCTIONS.md
├── README.md
├── assets
│   ├── css
│   │   ├── front-end-min.css
│   │   ├── front-end.css
│   │   ├── style-editor-min.css
│   │   ├── style-editor.css
│   │   ├── style-main-min.css
│   │   ├── style-main.css
│   │   ├── style-var-min.css
│   │   └── style-var.css
│   └── js
│       ├── editor-min.js
│       ├── editor.js
│       ├── main-min.js
│       └── main.js
├── custom-functions.php

``` 