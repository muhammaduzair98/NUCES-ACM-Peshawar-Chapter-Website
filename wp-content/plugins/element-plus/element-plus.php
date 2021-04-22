<?php
/**
 * Plugin Name: Element Plus for WP Bakery Page Builder
 * Plugin URI: https://elementplus.pro/
 * Description: Next generation elements generator for WP Bakery Page Builder
 * Version: 1.1.0
 * Author: Pluginbazar
 * Text Domain: element-plus
 * Domain Path: /languages/
 * Author URI: https://pluginbazar.com/
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}  // if direct access

define( 'EPLUS_PLUGIN_URL', WP_PLUGIN_URL . '/' . plugin_basename( dirname( __FILE__ ) ) . '/' );
define( 'EPLUS_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'EPLUS_PLUGIN_FILE', plugin_basename( __FILE__ ) );
define( 'EPLUS_VERSION', '1.1.0' );

/**
 * Class ElementPlus
 */
class ElementPlus {

	/**
	 * ElementPlus constructor.
	 */
	function __construct() {

		$this->load_scripts();
		$this->define_classes_functions();

		add_action( 'plugins_loaded', array( $this, 'load_textdomain' ) );
	}

	/**
	 * Loading scripts
	 */
	function load_scripts() {

		add_action( 'wp_enqueue_scripts', array( $this, 'front_scripts' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts' ) );
	}

	/**
	 * Loading classes and functions
	 */
	function define_classes_functions() {
		require_once( EPLUS_PLUGIN_DIR . 'includes/classes/class-functions.php' );
		require_once( EPLUS_PLUGIN_DIR . 'includes/classes/class-param-type.php' );
		require_once( EPLUS_PLUGIN_DIR . 'includes/classes/class-element.php' );
		require_once( EPLUS_PLUGIN_DIR . 'includes/classes/class-hooks.php' );
		require_once( EPLUS_PLUGIN_DIR . 'includes/functions.php' );
	}

	/**
	 * Loading scripts to backend
	 */
	function admin_scripts() {
		wp_enqueue_style( 'eplus-admin', EPLUS_PLUGIN_URL . 'assets/admin/css/style.css' );
	}

	/**
	 * Return data that will pass on pluginObject
	 *
	 * @return array
	 */
	function localize_scripts_data() {

		$plugin_obj = array(
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
		);

		return $plugin_obj;
	}

	/**
	 * Loading scripts to the frontend
	 */
	function front_scripts() {

		wp_enqueue_style( 'tooltip', EPLUS_PLUGIN_URL . 'assets/tool-tip.min.css' );
		wp_enqueue_style( 'animate', EPLUS_PLUGIN_URL . 'assets/front/css/animate.css' );
		wp_enqueue_style( 'owl-carousel', EPLUS_PLUGIN_URL . 'assets/front/css/owl.carousel.min.css' );
		wp_enqueue_style( 'magnific-popup', EPLUS_PLUGIN_URL . 'assets/front/css/magnific-popup.css' );
		wp_enqueue_style( 'slick', EPLUS_PLUGIN_URL . 'assets/front/css/slick.css' );
		wp_enqueue_style( 'pb-core', EPLUS_PLUGIN_URL . 'assets/front/css/pb-core-styles.css' );
		wp_enqueue_style( 'eplus-front', EPLUS_PLUGIN_URL . 'assets/front/css/style.css' );

		wp_enqueue_script( 'owl-carousel', plugins_url( 'assets/front/js/owl.carousel.min.js', __FILE__ ), array( 'jquery' ), false, false );
		wp_enqueue_script( 'slick', plugins_url( 'assets/front/js/slick.min.js', __FILE__ ), array( 'jquery' ), false, false );
		wp_enqueue_script( 'magnific-popup', plugins_url( 'assets/front/js/jquery.magnific-popup.min.js', __FILE__ ), array( 'jquery' ), false, false );
		wp_enqueue_script( 'eplus-front', plugins_url( 'assets/front/js/scripts.js', __FILE__ ), array( 'jquery' ) );
		wp_localize_script( 'eplus-front', 'eplus_object', $this->localize_scripts_data() );
	}

	/**
	 * Loading TextDomain
	 */
	function load_textdomain() {
		load_plugin_textdomain( 'element-plus', false, plugin_basename( dirname( __FILE__ ) ) . '/languages/' );
	}

}

new ElementPlus();