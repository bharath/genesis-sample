# Customizing

## 1. Gutenberg color palette and font sizes

1. In assets/css/style-var.css add your own Custom Color Palette for Front End & Gutenberg. Its between lines 135 - 142

2. In custom-functions.php change editor-color-palette values as per your color scheme. Its between lines 153 - 196.

3. In custom-functions.php change editor-font-sizes values as per your design. Its between lines 206 - 239.

4. Open assets/css/front-end.css and make changes as per your color pallette & editor-font-sizes. Its between lines 441 - 576.

5. Open assets/css/style-editor.css and make changes as per your color pallette & editor-font-sizes. Its between lines 424 - 442.

6. Open assets/css/style-main.css and make changes as per your color pallette & editor-font-sizes. Its between lines 1849 - 1883.


## 2. Code block customization

1. In custom-functions.php, uncomment line 82 to add clipboard script for code block
2. In custom-functions.php, uncomment line 82 to add Fira Code font for code block
3. In assets/css/style-main.css uncomment lines in 2224 and 2419
4. In assets/js/main.js uncomment lines in 3 and 74