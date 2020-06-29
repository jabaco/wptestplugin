<?php

class Kernl_Site_Verification_Admin {
	private $plugin_name;
	private $version;

	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	public function settings_init() {
		add_settings_section(
			'kernl_setting_section',
			'Kernl Site Verification',
			array($this, 'kernl_setting_section_callback_function'),
			'general'
		);
		add_settings_field(
			'kernl_site_verification_code',
			'Site Verification Code',
			array($this, 'kernl_setting_callback_function'),
			'general',
			'kernl_setting_section'
		);
		register_setting( 'general', 'kernl_site_verification_code' );
	}

	function kernl_setting_section_callback_function() {
 		echo '<p>Enter your <a href="https://kernl.us">Kernl</a> WordPress Load Testing site verification code. This will allow you to load test your WordPress site with Kernl. You can find your site verification code by logging in to Kernl, clicking "Load Testing" in the main menu, and then navigating to the "Site Ownership Verification" tab.</p>';
	 }

	function kernl_setting_callback_function() {
 		echo '<input name="kernl_site_verification_code" id="kernl_site_verification_code" type="text" value="' . get_option( 'kernl_site_verification_code', '' ) . '" />';
 	}
}
