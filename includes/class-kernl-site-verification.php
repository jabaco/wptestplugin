<?php

class Kernl_Site_Verification {
	protected $loader;
	protected $plugin_name;
	protected $version;
	public function __construct() {
		if ( defined( 'PLUGIN_NAME_VERSION' ) ) {
			$this->version = PLUGIN_NAME_VERSION;
		} else {
			$this->version = '1.1.1';
		}
		$this->plugin_name = 'wptestplugin';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	private function load_dependencies() {
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-kernl-site-verification-loader.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-kernl-site-verification-i18n.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-kernl-site-verification-admin.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-kernl-site-verification-public.php';
		$this->loader = new Kernl_Site_Verification_Loader();
	}

	private function set_locale() {
		$plugin_i18n = new Kernl_Site_Verification_i18n();
		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );
	}

	private function define_admin_hooks() {
		$plugin_admin = new Kernl_Site_Verification_Admin( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_action( 'admin_init', $plugin_admin, 'settings_init' );
	}

	private function define_public_hooks() {
		$plugin_public = new Kernl_Site_Verification_Public( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_action( 'send_headers', $plugin_public, 'set_kernl_header' );
		$this->loader->add_action( 'wp_head', $plugin_public, 'set_kernl_meta_tag' );
	}

	public function run() {
		$this->loader->run();
	}

	public function get_plugin_name() {
		return $this->plugin_name;
	}

	public function get_loader() {
		return $this->loader;
	}

	public function get_version() {
		return $this->version;
	}
}
