<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://newleafwebsolutions.com
 * @since      1.0.0
 *
 * @package    Zurmo_Connector
 * @subpackage Zurmo_Connector/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Zurmo_Connector
 * @subpackage Zurmo_Connector/includes
 * @author     New Leaf Web Solutions <chris@newleafwebsolutions.com>
 */
class Zurmo_Connector_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'zurmo-connector',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
