<?php
namespace Creativeimageaccordion;

use Creativeimageaccordion\PageSettings\Page_Settings;
define( "BWDIA_ASFSK_ASSETS_PUBLIC_DIR_FILE", plugin_dir_url( __FILE__ ) . "assets/public" );
define( "BWDIA_ASFSK_ASSETS_ADMIN_DIR_FILE", plugin_dir_url( __FILE__ ) . "assets/admin" );

class Classbwdiaimageaccordion {

	private static $_instance = null;

	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	public function bwdia_admin_editor_scripts() {
		add_filter( 'script_loader_tag', [ $this, 'bwdia_admin_editor_scripts_as_a_module' ], 10, 2 );
	}

	public function bwdia_admin_editor_scripts_as_a_module( $tag, $handle ) {
		if ( 'bwdia_the_pricing_editor' === $handle ) {
			$tag = str_replace( '<script', '<script type="module"', $tag );
		}

		return $tag;
	}

	private function include_widgets_files() {
		require_once( __DIR__ . '/widgets/test.php' );
		// require_once( __DIR__ . '/widgets/bwdia-imageaccordion.php' );
	}

	public function bwdia_register_widgets() {
		// Its is now safe to include Widgets files
		$this->include_widgets_files();

		// Register Widgets
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\bwdiaImageAccordion() );
		// \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\bwdiaImageAccordion() );
	}

	private function add_page_settings_controls() {
		require_once( __DIR__ . '/page-settings/bwdia-image-accordion-manager.php' );
		new Page_Settings();
	}

	// Register Category
	function bwdia_add_elementor_widget_categories( $elements_manager ) {

		$elements_manager->add_category(
			'bwdia-image-accordion-category',
			[
				'title' => esc_html__( 'Image Accordion', 'bwdia-image-accordion' ),
				'icon' => 'eicon-person',
			]
		);
	}
	public function bwdia_all_assets_for_the_public(){
		$all_css_js_file = array(
            'bwdia_image_accordion_style_css' => array('bwdia_path_define'=>BWDIA_ASFSK_ASSETS_PUBLIC_DIR_FILE . '/css/style.css'),
        );
        foreach($all_css_js_file as $handle => $fileinfo){
            wp_enqueue_style( $handle, $fileinfo['bwdia_path_define'], null, '1.0', 'all');
        }
	}
	public function bwdia_all_assets_for_elementor_editor_admin(){
		$all_css_js_file = array(
            'bwdia_image_accordion_admin_icon_css' => array('bwdia_path_admin_define'=>BWDIA_ASFSK_ASSETS_ADMIN_DIR_FILE . '/icon.css'),
        );
        foreach($all_css_js_file as $handle => $fileinfo){
            wp_enqueue_style( $handle, $fileinfo['bwdia_path_admin_define'], null, '1.0', 'all');
        }
	}

	public function __construct() {
		// For public assets
		add_action('wp_enqueue_scripts', [$this, 'bwdia_all_assets_for_the_public']);

		// For Elementor Editor
		add_action('elementor/editor/before_enqueue_scripts', [$this, 'bwdia_all_assets_for_elementor_editor_admin']);
		
		// Register Category
		add_action( 'elementor/elements/categories_registered', [ $this, 'bwdia_add_elementor_widget_categories' ] );

		// Register widgets
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'bwdia_register_widgets' ] );

		// Register editor scripts
		add_action( 'elementor/editor/after_enqueue_scripts', [ $this, 'bwdia_admin_editor_scripts' ] );
		
		$this->add_page_settings_controls();
	}
}

// Instantiate Plugin Class
Classbwdiaimageaccordion::instance();