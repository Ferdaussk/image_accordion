<?php
namespace Creativeimageaccordion\PageSettings;

use Elementor\Controls_Manager;
use Elementor\Core\DocumentTypes\PageBase;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

class Page_Settings {

	const PANEL_TAB = 'new-tab';

	public function __construct() {
		add_action( 'elementor/init', [ $this, 'bwdia_image_accordion_add_panel_tab' ] );
		add_action( 'elementor/documents/register_controls', [ $this, 'bwdia_image_accordion_register_document_controls' ] );
	}

	public function bwdia_image_accordion_add_panel_tab() {
		Controls_Manager::add_tab( self::PANEL_TAB, esc_html__( 'Image Accordion', 'bwdia-image-accordion' ) );
	}

	public function bwdia_image_accordion_register_document_controls( $document ) {
		if ( ! $document instanceof PageBase || ! $document::get_property( 'has_elements' ) ) {
			return;
		}

		$document->start_controls_section(
			'bwdia_image_accordion_new_section',
			[
				'label' => esc_html__( 'Settings', 'bwdia-image-accordion' ),
				'tab' => self::PANEL_TAB,
			]
		);

		$document->add_control(
			'bwdia_image_accordion_text',
			[
				'label' => esc_html__( 'Title', 'bwdia-image-accordion' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Title', 'bwdia-image-accordion' ),
			]
		);

		$document->end_controls_section();
	}
}
