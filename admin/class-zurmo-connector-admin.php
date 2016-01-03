<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://newleafwebsolutions.com
 * @since      1.0.0
 *
 * @package    Zurmo_Connector
 * @subpackage Zurmo_Connector/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Zurmo_Connector
 * @subpackage Zurmo_Connector/admin
 * @author     New Leaf Web Solutions <chris@newleafwebsolutions.com>
 */
class Zurmo_Connector_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}
	
	
	/**
	 * Registers settings
	 *
	 * @since    1.0.0
	 */
	public function register_settings() {
		register_setting( 'zurmo-connector', 'zurmo_url' );
		register_setting( 'zurmo-connector', 'zurmo_username' );
		register_setting( 'zurmo-connector', 'zurmo_password' );
	}
	
	
	
	/**
	 * Creates the settings menu
	 *
	 * @since    1.0.0
	 */
	public function zurmo_menu() {
		add_options_page(
			'Zurmo Connector',
			'Zurmo Connector',
			'manage_options',
			'zurmo_connector',
			array(
				$this,
				'load_settings_page'
			)
		);
	}
	
	
	
	/**
	 * Creates the settings page
	 *
	 * @since    1.0.0
	 */
	public function load_settings_page() {
		include('partials/zurmo-connector-admin-display.php');
	}
	

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Zurmo_Connector_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Zurmo_Connector_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/zurmo-connector-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Zurmo_Connector_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Zurmo_Connector_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/zurmo-connector-admin.js', array( 'jquery' ), $this->version, false );

	}

}
