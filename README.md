# Blank Genesis Child Theme

This is my personal blank starter theme for use as a child theme of the [Genesis Framework](http://www.studiopress.com/). I use it to build my custom Wordpress themes. It uses (sass)[http://sass-lang.com/] and [CodeKit](https://incident57.com/codekit/) to compile, minify and handle dependancies. Tested up to WordPress version 4.3.1 and Genesis version 2.2.3 (it will run on older versions of both, but since I'm rebuilding this starter child theme these numbers indicate the current version as of rebuilding).

#### Note:

This is a bit of a work in progress so the README file is incomplete. I will update when I have the theme built out, so don't use it at the moment. Well you could but but beyond the sass there isn't much going on.

## Usage

The theme uses sass (sass over scss) for styling and the compiling is handling via CodeKit. If you have CodeKit simply add the child theme folder into codekit and the ```config.codekit``` file will do the rest. If your not using code kit than see the compile list bellow and use whatever system you prefer.

#### Compile:
- sass/style.sass -> /style.css
- sass/login.sass -> /css/login.min.css

## License

License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

> This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.
>
> This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

## Credits & References

- [Bill Erickson](https://github.com/billerickson/) - For help in understanding Genesis, cpt's as core plugins, and avoiding front end dependency when using custom metadata fields.

------------------------------------------------

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
