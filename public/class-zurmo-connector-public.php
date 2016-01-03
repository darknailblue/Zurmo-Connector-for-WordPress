<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://newleafwebsolutions.com
 * @since      1.0.0
 *
 * @package    Zurmo_Connector
 * @subpackage Zurmo_Connector/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Zurmo_Connector
 * @subpackage Zurmo_Connector/public
 * @author     New Leaf Web Solutions <chris@newleafwebsolutions.com>
 */
class Zurmo_Connector_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}
	
	
	/**
	 * Authenticates ZURMO
	 *
	 * @since    1.0.0
	 */
	private function login() {
		$headers = array(
			'Accept: application/json',
			'ZURMO_AUTH_USERNAME: ' . get_option('zurmo_username'),
			'ZURMO_AUTH_PASSWORD: ' . get_option('zurmo_password'),
			'ZURMO_API_REQUEST_TYPE: REST',
		);
		$route = get_option('zurmo_url') . 'zurmo/api/login';
		$response = Zurmo_Connector_Utilities::createApiCall($route, 'POST', $headers);
		$response = json_decode($response, true);

		if ($response['status'] == 'SUCCESS')
		{
			return $response['data'];
		}
		else
		{
			return $response;
		}
	}
	
	
	/**
	 * Runs a typical ZURMO API Call
	 * @parm 	string 	$route 	The endpoint for our API call
	 * @parm 	array 	$data 	The data for our API
	 *
	 * @since    1.0.0
	 */
	private function zurmoAPI($route, $data = null) {
		$authenticationData = $this->login();
		
		$headers = array(
			'Accept: application/json',
			'ZURMO_SESSION_ID: ' . $authenticationData['sessionId'],
			'ZURMO_TOKEN: ' . $authenticationData['token'],
			'ZURMO_API_REQUEST_TYPE: REST',
		);
		
		$route = get_option('zurmo_url') . $route;
		$response = $data ? Zurmo_Connector_Utilities::createApiCall($route, 'POST', $headers, array('data' => $data)) : Zurmo_Connector_Utilities::createApiCall($route, 'POST', $headers);
		$response = json_decode($response, true);

		return $response;
	}
	
	
	
	
	/**
	 * Creates a contact or lead
	 *
	 * @since 	1.0.0
	 * @parm 	array 	$data 	The data for our new contact
	 * @link 	http://zurmo.org/wiki/rest-api-specification-contacts
	 */
	public function createContact ($data) {

		$route = 'contacts/contact/api/create/';
		$response = $this->zurmoAPI($route, $data);

		return $response;
	}
	
	
	/**
	 * Testing shortcode
	 *
	 * @since    1.0.0
	 */
	public function zurmo() {
		ob_start();
		$data = array (
			'firstName' => 'Chris',
			'lastName' => 'Carvache',
			'mobilePhone' => '8609067802',
			'description' => 'This guy is not too bad',
			'companyName' => 'New Leaf Web Solutions',
			'website' => 'http://newleafwebsolutions.com',
			'source' => array
				(
					'value' => 'Referral'
				),

			'primaryEmail' => array
				(
					'emailAddress' => 'chris@newleafwebsolutions.com',
					'optOut' => 1,
				),
			'state' => array
				(
					'id' => 1
				)
		);
		echo '<pre>';
		print_r ($this->createContact($data));
		echo '</pre>';
		return ob_get_clean();
	}
	

}