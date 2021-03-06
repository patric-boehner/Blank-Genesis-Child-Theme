# Blank Genesis Child Theme

**Github project link:** https://github.com/patric-boehner/Blank-Genesis-Child-Theme/

This is the second version of my personal blank starter theme for use as a child of the [Genesis Framework](http://www.studiopress.com/). You are welcome to use this but be aware it is set up with my preferences and opinion in mind. The child theme uses [CodeKit](https://incident57.com/codekit/) to compile and minify the JS and [SASS & SCSS](http://sass-lang.com/). Your welcome to use any development tool you like, just delete the CodeKit files and take a look at the file organization to compile files correctly.

Tested up to WordPress version 5.0.3 and Genesis version 2.8.1.

## Core Functionality Plugin

All website functions that should be independent of the theme  should be laced in the theme's accompanying Core Functionality Plugin. Most often this includes custom post types, custom taxonomies, custom widgets, and custom meta boxes.

## Opinionated Changes

- There is no Genesis Theme Settings page. Studiopress is doing away with this page at some point in the future so why not help them along.
	-> /inc/admin/genesis-metaboxes.php
- All Genesis theme settings options have been removed except update notifications. This can still be found in the customizer.
	-> /inc/admin/customizer.php
- All in post setting have also been removed, with the exception of archive headings and descriptions.
	-> /inc/admin/genesis-metaboxes.php
- All Genesis built in widgets have been removed, along with most core widgets.
	-> /inc/admin/widgets.php
- Using the new genesis configuration API
- Supports Gutenberg with frontend and editor styles.
- Some Gutenberg blocks have been disabled by default.
	-> /inc/admin/editor.php
- The theme includes LazyLoading that can be activated in customizer. The lazy loading function comes from the wprig project.
	-> https://github.com/wprig/wprig
- The theme uses CSS progressive loading along with the Filamont Group LoadCSS polyfill. The progressive loading function comes from the wprig project.
	-> /inc/functions/resource-loading.php
- The theme uses async and defer JS loading. The progressive handling comes from the wprig project.
	-> /inc/functions/resource-loading.php
- Social share links and a cookie based top banner can be activated in customizer.
	-> /inc/admin/customizer/partials
- Uses CSS Grid with float and percentage based fallback for the content area.
- The CSS has been simplified and all media queries have been moved inline.

## File Organization

### Core Files

Functions.php mainly pulls in all the files within the include folder. It also defines the child theme and setups the cache busting function used on sites with wp_debug() on.

```
config/
	| - # All the changes to Genesis config settings. Seperates them out and keeps the inc/theme-setup.php file clean.
inc/
	| - admin		# All changes that affect the admin area or default theme settings loaded in functions.php.
	| - functions		# Collection of functions that are applied global and don't fit within a default template
	|			  file loaded in functions.php.
	| - partials		# Collection of individual template parts used within the structure files or default template files.
	| - structure		# Functions that directly relate to changes to the structure or the default templates files.
	|			  This borrows from how Genesis organizes some of its files.
	| - views		# Seperated html to keep code dry.
	| - theme-assets.php # Deals with loading all CSS & JS asset files.
	| - theme-defaults.php # Sets the defaults for all Genesis config settings.
	| - theme-setup.php 	# Setup of most Genesis specific filters and theme support options.
```

### Sass Organization

The core elements of the stylehseet can be found within the `_partials` folder. These partial files get pulled into the style sheets at the base of the `src-sass` folder.

```
assets/src-sass
	| - _blocks
		| - block-alignment.scss
		| - block-buttons.scss
		| - block-colors.scss
		| - block-columns.scss
		| - block-cover-image.scss
		| - block-editor-base.sass
		| - block-gallery.scss
		| - block-quotes-captions.scss
		| - block-text.scss
		| - block-widgets.scss
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
		| - site-footer.sass
		| - site-header.sass
		| - widgets.sass
	|  
	| - _vendor                  # Third party scss used in other style sheets
		| - icon-font.scss
		| - reset.scss
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
		| - lazyload.js
		| - responsive-menus.js
		| - social-share-link.js
		| - top-banner-aria.js
		| - top-banner.js
	| - _vendor                   # Third party js used in other js files
		| - cssrelpreload.js
		| - skip-link-fix.js
	| - global.js                 # JS file for frontend global js	-> js/global.min.js
	| - lazyload.js
	| - social-share.js
	| - top-banner.js
	| - cssrelpreload.js
```

## Installation Instructions

1. Upload the child theme theme folder via FTP to your wp-content/themes/ directory. (The Genesis parent theme needs to be in the wp-content/themes/ directory as well.)
2. Go to your WordPress dashboard and select Appearance.
3. Activate the child theme.

## License

License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

```
This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
```

## Credits & References

A lot of people who have helped me learn and from whom I have borrowed code.

- **Tonya Mork** https://github.com/hellofromtonya/
- **Bill Erickson** http://www.billerickson.net/
- **WP Wrig** https://github.com/wprig/wprig/
- **Matt Banks** https://github.com/mattbanks/
- **SEO Themes** https://github.com/seothemes/
- **Studio Press** http://my.studiopress.com/snippets/  
