# Blank Genesis Child Theme

This is my personal blank starter theme for use as a child theme of the [Genesis Framework](http://www.studiopress.com/). I use it to build my custom Wordpress themes. It uses [sass](http://sass-lang.com/) and [CodeKit](https://incident57.com/codekit/) to compile, minify and handle dependancies (none at the moment thought the markup is there for [bourbon](http://bourbon.io/)). Tested up to WordPress version 4.3.1 and Genesis version 2.2.3.

## Genesis V 2.2.3

This blank stater theme was redone for version 2.2.3 of genesis. Many of the accessibility features have been added with the exception of the menu markup and the needed changes to the responsive menu javascript and css. At the moment, this starter theme is using the old menu markup, js and css. All the other css changes have been applied.

## Usage

The theme uses sass (sass over scss) for styling and the compiling is handling via CodeKit. If you have CodeKit simply add the child theme folder into codekit and the ```config.codekit``` file will do the rest. If your not using codekit than see the compile list bellow and use whatever system you prefer.

#### Compile:

**CSS**
- sass/style.sass -> /style.css
- sass/login.sass -> /css/login.min.css
- sass/editory-style -> /css/editor-style.min.css

**JS**
- js/src/responsive-menu.js -> js/responsive-menu.min.js
- js/src/scroll-to-top.js -> js/scroll-to-top.min.js

#### Cleanup

The theme contains two test files, one for css and one for codekit. It can be nice to have a place to work when before finally organizing changes. Before deploying remember to remove or at least empty out these two files.

## License

License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

> This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.
>
> This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

## Credits & References

#### Sample Child Themes
- https://github.com/eddiemachado/bones-genesis
- https://github.com/mattbanks/Genesis-Starter-Child-Theme
- https://github.com/billerickson/BE-Genesis-Child

#### Accessibility
- http://robincornett.com/genesis-responsive-menu/#genesis-footer-widgets

#### Other
- http://briangardner.com/code/  
- http://my.studiopress.com/snippets/  
- http://my.studiopress.com/docs/shortcode-reference/  
- http://www.billerickson.net/code/  
