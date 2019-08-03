# Description

Customizations to Genesis Sample theme to use as a Starter theme. [Learn More](https://bharath.blog/)

## Requirement

Tested and works with Genesis Sample theme Version: 3.0.1

This will be tested and updated when a new Genesis Sample update is released.

## Getting started

1. Download this repo and move all the files inside starter-master folder to genesis-sample theme folder.

2. Open functions.php and add the following code at the end.

```php
// Custom Functions
require_once( __DIR__ . '/custom-functions.php' );
```

6. That's it. If you want to customize it further, read Customizations section below.

## File Structure

```

├── assets
│   ├── css
│   │   ├── fonts
│   │   ├── images
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
├── README.md

```

# Customizing

## 1. Gutenberg color palette and font sizes

1. In assets/css/style-var.css add your own Custom Color Palette for Front End & Gutenberg. Its between lines 143 - 158;

2. In custom-functions.php change editor-color-palette values as per your color scheme. Its between lines 153 - 196.

3. In custom-functions.php change editor-font-sizes values as per your design. Its between lines 206 - 239.

4. Open assets/css/front-end.css and make changes as per your color pallette & editor-font-sizes. Its between lines 441 - 576.

5. Open assets/css/style-editor.css and make changes as per your color pallette & editor-font-sizes. Its between lines 424 - 442.

6. Open assets/css/style-main.css and make changes as per your color pallette & editor-font-sizes. Its between lines 1849 - 1883.


## 2. Code block customization

1. Install Server-Side Code Syntax Highlighting Block plugin from [here](https://github.com/westonruter/code-syntax-block)
2. In custom-functions.php, uncomment line 82 to add clipboard script for code block
3. In custom-functions.php, uncomment line 82 to add Fira Code font for code block
4. In assets/css/style-main.css uncomment lines in 2224 and 2419
5. In assets/js/main.js uncomment lines in 3 and 74