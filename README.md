## Custom Functions

Add the following code to functions.php.

Place any custom PHP in the `custom-functions.php` file.

This file is loaded on the `after_setup_theme` hook so most theme functions will work.

```php
// Custom Functions
require_once( __DIR__ . '/custom-functions.php' );
```