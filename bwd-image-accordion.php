<?php
/**
 * Plugin Name: Image Accordion
 * Description: Image accordion is an Elementor plugin that has been decorated 30+ ready-made eye-catching styles. More designs will be included very soon stay tuned.
 * Plugin URI:  www.bwdplugins.com/plugins/image-accordion
 * Version:     1.0
 * Author:      Best WP Developer
 * Author URI:  www.bestwpdeveloper.com/
 * Text Domain: bwdia-image-accordion
 * Elementor tested up to: 3.0.0
 * Elementor Pro tested up to: 3.7.3
 * Domain Path: /languages
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
require_once ( plugin_dir_path(__FILE__) ) . '/includes/class-tgm-plugin-activation.php';

final class FinalBWDImageAccordion{

	const VERSION = '1.0';

	const MINIMUM_ELEMENTOR_VERSION = '3.0.0';

	const MINIMUM_PHP_VERSION = '7.0';

	public function __construct() {
		// Load translation
		add_action( 'bwdia_init', array( $this, 'bwdia_loaded_textdomain' ) );
		// bwdia_init Plugin
		add_action( 'plugins_loaded', array( $this, 'bwdia_init' ) );
	}

	public function bwdia_loaded_textdomain() {
		load_plugin_textdomain( 'bwdia-image-accordion' );
	}

	public function bwdia_init() {
		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			// For tgm plugin activation
			add_action( 'tgmpa_register', [$this, 'bwdia_image_accordion_register_required_plugins'] );
			return;
		}

		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', array( $this, 'bwdia_admin_notice_minimum_elementor_version' ) );
			return;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', array( $this, 'bwdia_admin_notice_minimum_php_version' ) );
			return;
		}

		// Once we get here, We have passed all validation checks so we can safely include our plugin
		require_once( 'bwdia-boots.php' );
	}

	function bwdia_image_accordion_register_required_plugins() {
		$plugins = array(
			array(
				'name'        => esc_html__('Elementor', 'bwdia-image-accordion'),
				'slug'        => 'elementor',
				'is_callable' => 'wpseo_init',
			),
		);

		$config = array(
			'id'           => 'bwdia-image-accordion',
			'default_path' => '',
			'menu'         => 'tgmpa-install-plugins',
			'parent_slug'  => 'plugins.php',
			'capability'   => 'manage_options',
			'has_notices'  => true,
			'dismissable'  => true,
			'dismiss_msg'  => '',
			'is_automatic' => false,
			'message'      => '',
		);
	
		tgmpa( $plugins, $config );
	}

	public function bwdia_admin_notice_minimum_elementor_version() {
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}

		$message = sprintf(
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'bwdia-image-accordion' ),
			'<strong>' . esc_html__( 'Image Accordion', 'bwdia-image-accordion' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'bwdia-image-accordion' ) . '</strong>',
			self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>' . esc_html__('%1$s', 'bwdia-image-accordion') . '</p></div>', $message );
	}

	public function bwdia_admin_notice_minimum_php_version() {
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}

		$message = sprintf(
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'bwdia-image-accordion' ),
			'<strong>' . esc_html__( 'Image Accordion', 'bwdia-image-accordion' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'bwdia-image-accordion' ) . '</strong>',
			self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>' . esc_html__('%1$s', 'bwdia-image-accordion') . '</p></div>', $message );
	}
}

// Instantiate bwdia-author-bio.
new FinalBWDImageAccordion();
remove_action( 'shutdown', 'wp_ob_end_flush_all', 1 );