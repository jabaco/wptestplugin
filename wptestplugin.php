<?php
/**
 * Plugin Name: wp test plugin
 * Plugin URI: https://bestprogrammer.developer
 * Description: Trying to figuring out how to use Kernl
 * Plugin URI: https://kernl.us
 * Author: Me
 * Version: 1.4.0
 * Text Domain: wptestplugin
 */



require plugin_dir_path( __FILE__ ) . "includes/class-kernl-site-verification.php";

function run_kernl_site_verification() {

	$plugin = new Kernl_Site_Verification();
	$plugin->run();

}
run_kernl_site_verification();


require 'plugin_update_check.php';
$KernlUpdater = new PluginUpdateChecker_2_0 (
    'https://kernl.us/api/v1/updates/5ef9db3fbf7e7304cc1458f7/',
    __FILE__,
    'wptestplugin',
    1
);

?>
