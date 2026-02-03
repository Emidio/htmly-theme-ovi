# HTMLy Ovi Theme
WordPress Occasio theme ported to HTMLy and modified. Uses HTMLy local comment system and some special features.

This theme was mainly developed in conjunction with the local commenting system for HTMLy.

## Installations 
* Upload and extract the zip file into themes directory.
* Activate it from HTMLy panel.
 
## Grid layout
Choose `Summary` under `Blog posts displayed as` in `Config > Reading Settings`. 

## Images rows
In your posts it is possible to use:

	<div class="image-row">
	  <img src="img1.jpg">
	  <img src="img2.jpg">
	  <img src="img3.jpg">
	  <img src="img4.jpg">
	</div>

This will create a four images row, all same height, filling the post container width. You can use how many images you want, they will scale and fit automatically.

In next releases the images stripe will have lightbox integrated.

## Downloads page
When slug is "downloads" all links are converted to download buttons. Copy .htaccess.downloads to your downloads folder (where downloadable files are) and rename it .htaccess

It a very simple anti-leech direct download protection (can be easily bypassed, but at least requires some effort on it).

An example here:

[https://htmlydemo.reggiani.link/downloads/](https://htmlydemo.reggiani.link/downloads/)

## Author page
Author page display the author picture too (as set in author profile in admin section). An example here:

[https://htmlydemo.reggiani.link/author/emidio/](https://htmlydemo.reggiani.link/author/emidio/)

## Syntax highlight and copy code button
Syntax highlight using highlight.js in code blocks with copy code button. Thanks to **danpros**:

[https://www.danpros.com/post/add-syntax-highlighting-to-our-blog-with-highlightjs](https://www.danpros.com/post/add-syntax-highlighting-to-our-blog-with-highlightjs)

[https://www.danpros.com/post/add-a-copy-to-clipboard-button-to-code-blocks](https://www.danpros.com/post/add-a-copy-to-clipboard-button-to-code-blocks)

See how it works here:

[https://htmlydemo.reggiani.link/post/quote-post](https://htmlydemo.reggiani.link/post/quote-post)

## Flavors
You can change the flavor (main colors) of the theme adding a custom variable in HTMLy config (Admin > Config > Custom settings TAB). Add variable:

`theme.flavor`

with one of the following values: aqua, coffee, eggplant, orange, tea. Different value or no variable set will use the grey neutral color scheme.

## To Do list
This template is usable. There are some small improvement needed/to be implemented:

* consistency in UI (mainly buttons shape, size and colors)
* possibility to set header logo and image background
* option to enable comments on statics and authors pages on a per-page basis

## Note (read before download) - 2026-01-14
This template is compatible with main HTMLy code at:

[https://github.com/danpros/htmly/](https://github.com/danpros/htmly/)

However will work only after the last pull request will be accepted. This warning will be removed once pull request is merged to main HTMLy code.

## License

See the LICENSE file.
