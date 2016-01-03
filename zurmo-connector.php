<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://newleafwebsolutions.com
 * @since             1.0.0
 * @package           Zurmo_Connector
 *
 * @wordpress-plugin
 * Plugin Name:       Zurmo Connector
 * Plugin URI:        http://newleafwebsolutions.com/zurmo/
 * Description:       Provides a variety of functions to connect the self hosted version of Zurmo to WordPress
 * Version:           1.0.0
 * Author:            New Leaf Web Solutions
 * Author URI:        http://newleafwebsolutions.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       zurmo-connector
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-zurmo-connector-activator.php
 */
function activate_zurmo_connector() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-zurmo-connector-activator.php';
	Zurmo_Connector_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-zurmo-connector-deactivator.php
 */
function deactivate_zurmo_connector() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-zurmo-connector-deactivator.php';
	Zurmo_Connector_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_zurmo_connector' );
register_deactivation_hook( __FILE__, 'deactivate_zurmo_connector' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-zurmo-connector.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_zurmo_connector() {

	$plugin = new Zurmo_Connector();
	$plugin->run();

}
run_zurmo_connector();