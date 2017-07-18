<?php

#
# define some RI_* constants
#
define('RI_VERSION', '20150109');
define('RI_SEMVER', '3.8.3');
define('RI_BASE_DIR', __DIR__);
define('RI_BASE_PAGE', __DIR__ . '/index.php');
define('RI_APP_URL', preg_match('/^(rightintel|dev\.rightintel\.com)$/', $_SERVER['HTTP_HOST']) ? 'http://' . $_SERVER['HTTP_HOST'] : 'https://rightintel.com');
ob_start(); // allow our plugin pages to redirect

#
# require classes in libs on demand
#
spl_autoload_register(function($classname) {
	$path = __DIR__ . '/libs/' . str_replace('_', '/', $classname) . '.php';
	if (is_file($path)) {
		require_once($path);
	}
});

#
# register our hooks
#

// allow us to add admin messages with Ri_Flash::add($msg, $class) where $class can be 'updated' or 'error'
add_action( 'admin_notices', array('Ri_Flash','output') );
// register install and uninstall
register_activation_hook( RI_BASE_PAGE , array('Ri_Schema','install') );
register_activation_hook( RI_BASE_PAGE , array('Ri_Upload','install') );
register_activation_hook( RI_BASE_PAGE , array('Ri_Upload','validateInstall') );
register_activation_hook( RI_BASE_PAGE , array('Ri_Router','validateInstall') );
register_activation_hook( RI_BASE_PAGE , array('Ri_Styling','setDefaults') );
register_deactivation_hook( RI_BASE_PAGE , array('Ri_Schema','uninstall') );
// set up admin pages, user pages, and API endpoints
$router = new Ri_Router();
// upgrade thumbnails if they have not been updated before
Ri_Thumbnails::upgradeIfNeeded($router);
// endpoints that can be accessed via $blog_url/right_intel/$file
$router->addEndpoint( 'receiver.php' );
$router->addEndpoint( 'get_publish_options.php' );
$router->addEndpoint( 'connect_account.php' );
$router->addEndpoint( 'disconnect_account_remote.php' );
$router->addPage( array(
	'function' => 'add_options_page',
	'page_title' => 'Right Intel Settings',
	'menu_title' => 'Right Intel',
	'file' => 'list_accounts',
) );
$router->addPage( array(
	'function' => 'add_submenu_page',
	'page_title' => 'Right Intel Disconnect Account',
	'menu_title' => 'Right Intel',
	'file' => 'disconnect_account'
) );
$router->addPage( array(
	'function' => 'add_submenu_page',
	'page_title' => 'Right Intel Post Preview',
	'menu_title' => 'Right Intel',
	'file' => 'post_preview'
) );
// plugin settings page
$router->addPluginListLink( 'Settings', 'options-general.php?page=right_intel_settings' );

$router->addUpgradeHandler( '3.8.0', function() {
	Ri_Styling::setDefaults();
	Ri_Schema::drop_table_ri_widgets();
	return true;
} );
$router->addUpgradeHandler( '3.8.3', function() {
	if (get_option('right_intel_has_connected_before') !== '1' && count(Ri_Credentials::findAll()) > 0) {		
		update_option('right_intel_has_connected_before', '1');
	}
	return true;
} );
$styling = new Ri_Styling();
$styling->setupCss();
$styling->setupJs();
$styling->setupBodyClass();
$styling->setupPostThumbnails();

add_shortcode( 'right_intel_board', function( $attr ) {
	if (!isset($attr['id'])) {
		return '';
	}
	$domain = @$attr['domain'] ?: 'https://rightintel.com';
	$html = Ri_Curl::getContents("$domain/board/{$attr['id']}/raw");
	return $html;
} );
