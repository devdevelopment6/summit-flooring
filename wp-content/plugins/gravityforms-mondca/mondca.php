<?php
/**
 * Plugin Name: Moneris Direct CA Gateway for Gravity Forms
 * Plugin URI: http://www.patsatech.com/
 * Description: Gravity Forms Plugin for accepting payment through Moneris Direct CA Gateway.
 * Version: 1.1.2
 * Author: PatSaTECH
 * Author URI: http://www.patsatech.com
 * Contributors: patsatech
 * Requires at least: 4.5
 * Tested up to: 5.6.1
 *
 * Text Domain: gravityforms-mondca
 * Domain Path: /languages/
 *
 * @package Moneris Direct CA Gateway for Gravity Forms
 * @author PatSaTECH
 */

if(!defined('ABSPATH')){
exit;
}

$GFMONDCANAME = 'Moneris Direct CA Gateway for Gravity Forms';
$GFMONDCADIR = basename(__DIR__); $GFMONDCAFILE = basename(__FILE__); $GFMONDCAABSPATH = __FILE__; $GFMONDCAV = '1.1.2';

include "includes/helper.php";
include "includes/mpgClasses.php";

define( 'GF_MONDCA_VERSION', $GFMONDCAV );

load_plugin_textdomain( 'gravityforms-mondca', false, basename( dirname( __FILE__ ) ) . '/languages' );

add_action( 'gform_loaded', array( 'GF_MONDCA_Bootstrap', 'load' ), 5 );

class GF_MONDCA_Bootstrap {

	public static function load() {

		if ( ! method_exists( 'GFForms', 'include_payment_addon_framework' ) ) {
			return;
		}

		require_once( 'class-gf-mondca.php' );

		GFAddOn::register( 'GFMONDCA' );
	}

}

function gf_MONDCA() {
	return GFMONDCA::get_instance();
}
