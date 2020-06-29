<?php

class Kernl_Site_Verification_Public {
	private $plugin_name;
	private $version;

	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	public function set_kernl_header() {
		$siteVerificationCode = get_option( 'kernl_site_verification_code', false);
		if ($siteVerificationCode && $siteVerificationCode !== '') {
			header( 'X-Kernl-Verify: ' . $siteVerificationCode );
		}
	}

	public function set_kernl_meta_tag() {
		$siteVerificationCode = get_option( 'kernl_site_verification_code', false);
		if ($siteVerificationCode && $siteVerificationCode !== '') {
			echo '<meta name="kernl-verify" content="'.$siteVerificationCode.'">';
		}
	}
}
