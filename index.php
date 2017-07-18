<?php

/*
Plugin Name: Right Intel
Plugin URI http://rightintel.com/home/wordpress
Description: The Right Intel Wordpress Plugin allows you to push posts from the Right Intel application to your WordPress blog
Version: 3.8.3
Author: kendsnyder
Author URI: http://rightintel.com/home
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*/

if (version_compare(PHP_VERSION, '5.3', '>=')) {
	require_once( __DIR__ . '/right-intel.php' );
}
else {
	// notify that right-intel plugin requires php 5.3
	trigger_error('The Right Intel plugin requires PHP 5.3 or higher. Please contact your server administrator to upgrade your PHP version.', E_USER_WARNING);
}
