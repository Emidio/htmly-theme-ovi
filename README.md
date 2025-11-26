# HTMLy Ovi Theme
WordPress Occasio theme ported to HTMLy and modified.

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

## Downloads page
When slug is "downloads" all links are converted to download buttons.

## Author page
Author page display the author picture too (as set in author profile in admin section).

## Still in development
This template is usable, but still under development. There are many small improvement needed/to be implemented:

* consistency in UI (mainly buttons shape, size and colors)
* comments widget (needs small changes in HTMLy local comments system too)
* possibility to set header logo and image background
* flavors - setting a flavor in config.ini will apply a differenet color pallette; will be implemented:
    - aqua (blue pallette)
    - coffee (brown pallette)
    - green tea (green pallette)
    - strawberry (red pallette)
    - smoke (grey pallette)
* option to enable comments on statics and authors pages on a per-page basis

## License

See the LICENSE file.
