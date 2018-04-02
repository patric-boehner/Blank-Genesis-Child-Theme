# Blank Genesis Child Theme

**Github project link:** https://github.com/patric-boehner/Blank-Genesis-Child-Theme/

This is the second version of my personal blank starter theme for use as a child of the [Genesis Framework](http://www.studiopress.com/). Your welcome to use this but be aware it is set up with my preferences and opinion in mind. The child theme uses [CodeKit](https://incident57.com/codekit/) to compile and minify the JS and [SASS](http://sass-lang.com/). Your welcome to use any development tool you like, just deleate the CodeKit files and take a look at the file organization to compile files correctly.

Tested up to WordPress version 4.9.4 and Genesis version 2.6.1.

## Core Functionality Plugin

All website functions that should be independent of the theme  should be laced in the theme's accompanying Core Functionality Plugin. Most often this includes custom post types, custom taxonomies, custom widgets, and custom meta boxes.

## Opinionated Changes

- Their is no Genesis Theme Settings page. Studiopress is doing away with this page at some point in the future so why not help them along.
- Al Genesis theme settings options have been removed except update notifications. This can still be found in the customizer. If you need theme settings then remove the filter in admin/genesis-metaboxes.php. Otherwise build them into Customizer.
- All in post setting have also been removed, with the exception of archive headings and descriptions.
- All Genesis built in widgets have been removed, along with a handful of core widgets.

## File Organization

### Core Files

Functions.php mainly pulls in all the files within the include folder. It also defines the child theme and setups the cache busting function used on sites with wp_debug() on.

```
inc/
	| - admin		# All changes that affect the admin area or default theme settings loaded in functions.php.
	| - functions		# Collection of functions that are applied global and don't fit within a default template
	|			  file loaded in functions.php.
	| - partials		# Collection of individual template parts used within the structure files or default template files.
	| - structure		# Functions that directly relate to changes to the structure or the default templates files.
	|			  This borrows from how Genesis organizes some of its files.
	| - views		# Seperated html to keep code dry.
	| - theme-setup.php 	# Setup of most Genesis specific filters and theme support options.
```

### Sass Organization

The core elements of the stylehseet can be found within the `_partials` folder. These partial files get pulled into the style sheets at the base of the `src-sass` folder.

```
assets/src-sass
	| - _helpers
		| - _variables.sass        # Global variables used in any sass file
		| - _mixins.sass           # Global mixins used in any sass file
	|
	| - _partials                # All partial sass files used in other style sheets
		| - accessibility.sass
		| - base-style.sass
		| - column-classes.sass
		| - content-area.sass
		| - forms.sass
		| - layout.sass
		| - navigation.sass
		| - post-elements.sass
		| - reset.scss
		| - site-footer.sass
		| - site-header.sass
		| - widgets.sass
	|  
	| - _vendor                  # Third party scss used in other style sheets
		| - icon-font.scss
		| - ...
	|
	| - editor-styles.sass       # Sass file for classic editor styles   -> css/editor-style.min.css
	| - global-styles.sass       # Sass file for frontend global styles  -> css/global-style.min.css
	| - gutenberg-styles.sass    # Sass file for gutenberg editor styles -> css/gutenberg-style.min.css
	| - login-styles.sass        # Sass file for login screen styles     -> css/login-style.min.css
	| - print.sass               # Sass file for media="print" styles    -> css/print.min.css
```

### JS Organization

```
assets/src-js
	| - _partials                 # All partial js files used in other js files
		| - responsive-menu.js
		| - ...
		|
	| - _vendor                   # Third party js used in other js files
		| - ...
		|
	| - global.js                 # JS file for frontend global js	-> js/global.min.js
```

## Installation Instructions

1. Upload the child theme theme folder via FTP to your wp-content/themes/ directory. (The Genesis parent theme needs to be in the wp-content/themes/ directory as well.)
2. Go to your WordPress dashboard and select Appearance.
3. Activate the child theme.
4. Inside your WordPress dashboard, go to Genesis > Theme Settings and configure them to your liking.

## License

License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

```
This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
```

## Credits & References

A lot of people who have helped me learn and from whom I have borrowed code.

- **Tonya Mork** https://github.com/hellofromtonya
- **Bill Erickson** http://www.billerickson.net/
- **Matt Banks** https://github.com/mattbanks/
- **Studio Press** http://my.studiopress.com/snippets/  
