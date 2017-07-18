=== Right Intel ===
Contributors: kendsnyder
Tags: right intel, rightintel, thought leadership, content curation, communication platform, agency, insight
Requires at least: 3.2
Tested up to: 4.1
Stable tag: 3.8.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/old-licenses/gpl-2.0.html

The Right Intel Wordpress Plugin allows you to push posts from Right Intel to your WordPress blog

== Description ==

Right Intel allows you to gather and push your Intel to your team and your clients wherever they are. 

Simply connect your blog to Right Intel by logging into WordPress and using the Settings > Right Intel page. Then Intel Leaders can visit the Intel tab in Right Intel and click the "Send to blog..." option on the gear menu next to each post. It will give you a chance to edit the post content and assign categories and tags.

The Right Intel post will then become visible on your WordPress blog including the image and intel bubble.

== Installation ==

= Requirements =

*   PHP 5.3+
*   WordPress 3.2 or newer (tested up to version 4.1)
*   Permalinks enabled under Settings > Permalinks
*   URL rewrite (e.g. via .htaccess) to make all traffic available to plugins
*   WordPress permission to create database tables

= WordPress Directory Installation =

This plugin is available in the WordPress directory listing and can be installed from the WordPress admin panel under Plugins > Add New.

= Manual Installation =

Unzip and upload the right-intel folder to the /wp-content/plugins/ directory.

= Testing Your Installation =

1. Test installation by visiting http://yourdomain.example.com/right_intel/receiver.php; you should see JSON output, not a 404 or a blog page.
1. Login into WordPress and activate the plugin on the "Plugins" menu
1. Go to Settings > Right Intel to connect the blog to Right Intel

== Frequently Asked Questions ==

= Can I customize the color or size of the intel bubble? = 

Yes. Under Settings > Right Intel, there are display options. You can also override the styling using CSS.

= How will my posts look if I deactivate the Right Intel plugin? = 

The intel text will look like a normal paragraph without a bubble. The inline image may cause the paragraph to look strange; you can hide or style the inline image in your theme.

= Where can I get help and support for this plugin? =

Please send an email to support@rightintel.com.

= Does Right Intel store my WordPress password? =

No. Passwords are not stored in Right Intel or WordPress. When a Right Intel instance is first created, authentication tokens are generated and stored for later use.

= Does WordPress store my Right Intel password? =

No.

== Screenshots ==

1. How Right Intel posts look on a WordPress blog.
2. Go to the Settings > Right Intel page to connect your blog to Right Intel.
3. On the intel tab, hover over the gear icon next to a post and click "Send to blog...".
4. Before the post is sent to WordPress you can edit the title, intel bubble text, description and assign WordPress categories and tags. Other WordPress options such as author and publish date are available as well.

== Changelog ==

= Version 3.8.3 - January 12, 2015 =
* Built-in options for altering Intel Bubble styling including CSS-only bubbles
* Support for media library 
* Improved UI in the Right Intel Platform
* Verfied support for WordPress 4.x *
= Version 3.7.1 - November 8, 2013 = 
* Verfied support for WordPress 3.7 *
* Added instructions for testing installation *
= Version 3.5.5 - July 5, 2013 = 
* Fix image floating when image is not linked *
* Add right-intel-post as CSS class to body *
= Version 3.5.4 - July 2, 2013 = 
* Fix for bubble color in some situations *
= Version 3.5.3 - June 28, 2013 = 
* Support for featured image *
* Adds post images to media library for future use *
= Version 3.5.0 - April 20, 2013 =
* Verified support for WordPress 3.5 *
* Allow PHP allow_url_fopen to be disabled *
* Force CSS updates without users needing to Shift+refresh *
* Support sites using CSS3 box models *
= Version 3.4.5 - December 5, 2012 =
* Fix potential conflicts with other plugins
= Version 3.4.3 - November 30, 2012 =
* Click an image to view original, full-size image
= Version 3.4.2 - November 13, 2012 =
* Initial public version