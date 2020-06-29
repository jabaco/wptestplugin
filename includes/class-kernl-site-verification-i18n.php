<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://kernl.us
 * @since      1.0.0
 *
 * @package    Kernl_Site_Verification
 * @subpackage Kernl_Site_Verification/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Kernl_Site_Verification
 * @subpackage Kernl_Site_Verification/includes
 * @author     Jack Slingerland <jack@kernl.us>
 */
class Kernl_Site_Verification_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'kernl-site-verification',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
