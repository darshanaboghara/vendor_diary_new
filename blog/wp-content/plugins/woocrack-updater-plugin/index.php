<?php
/**
 * Plugin Name: WooCrack Updater Plugin
 * Plugin URI: https://woocrack.com
 * Description: Allows you to receive automatic plugins and themes updates from WooCrack.com
 * Version: 1.6
 * Tested up to: 5.1.1
 * Author: WooCrack.com
 * Author URI: https://woocrack.com
 * Text Domain: woocrack-updater-plugin
 */
 
 if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! class_exists( 'WOOCRACK' ) ) {

	/**
	 * Main WOOCRACK Class
	 * @class WOOCRACK
	 * @version	1.0
	 */
	final class WOOCRACK {
		
		protected static $_instance = null;

		public $program = null;
		
		public static function instance() {
			if ( is_null( self::$_instance ) ) {
				self::$_instance = new self();
			}
			return self::$_instance;
		}
		
		public function __construct() {
			
			$this->includes();
			$this->init_hooks();
			
			do_action( 'wk_loaded' );
		}

		public function init_hooks() {
			add_action( 'init', array( $this, 'init' ), 0 );
		}
		
		public function includes() {
            include_once( 'includes/wcrck-notices.php' );
			include_once( 'includes/wcrck-validate.php' );
			include_once( 'includes/wcrck-license.php' );
			include_once( 'includes/wcrck-hook.php' );
			include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		}

		public function init() {
			return array(

			);
		}


		public static function install() {
			wp_schedule_event(time(), 'hourly', 'woocrack_hourly_update');
			WK()->activation();

			if (!get_option('e3d5414072f6eff914832a310ccbd95d') && ('e3d5414072f6eff914832a310ccbd95dthms')) {
				WK_Pembaruan::getjsontoken();
			}

		}

		public static function uninstall() {
			wp_clear_scheduled_hook('woocrack_hourly_update');
			WK()->uninstall();
		}

		



	}

}

register_activation_hook( __FILE__, array( 'WOOCRACK', 'install' ) );
register_deactivation_hook(__FILE__, array( 'WOOCRACK', 'uninstall' ) );

function WCRCK() {
	return WOOCRACK::instance();
}

// Global for backwards compatibility.
$GLOBALS['woocrack'] = WCRCK();