<?php
namespace Creativeimageaccordion\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class bwdiaImageAccordion extends \Elementor\Widget_Base {


	public function get_name() {
		return 'bwdimageaccordion';
	}

	public function get_title() {
		return esc_html__( 'Image Accordion', 'bwdia-image-accordion' );
	}

	public function get_icon() {
		return 'eicon-accordion bwdia-image-accordion';
	}

	public function get_categories() {
		return [ 'bwdia-image-accordion-category' ];
	}

	public function get_keywords() {
		return [ 'image', 'accordion', 'bwd', 'hover' ];
	}

	public function get_script_depends() {
		return [ 'bwdia-iamge-accordion-category' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'bwdia_image_accordion_choose_style',
		    [
		        'label' => esc_html__('Choose Style','bwdia-image-accordion'),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
		   
		    ]
		);
		$this->add_control(
			'bwdia_image_accordion_style_layout',
			[
				'label' => esc_html__( 'Choose Style', 'bwdia-image-accordion' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'style1',
				'options' => [
					'style1'  => esc_html__( 'Style 1', 'bwdia-image-accordion' ),
					'style2' => esc_html__( 'Style 2', 'bwdia-image-accordion' ),
					'style3' => esc_html__( 'Style 3', 'bwdia-image-accordion' ),
					'style4' => esc_html__( 'Style 4', 'bwdia-image-accordion' ),
					'style5' => esc_html__( 'Style 5', 'bwdia-image-accordion' ),
					'style6' => esc_html__( 'Style 6 ', 'bwdia-image-accordion' ),
					'style7' => esc_html__( 'Style 7 ', 'bwdia-image-accordion' ),
					'style8' => esc_html__( 'Style 8 ', 'bwdia-image-accordion' ),
					'style9' => esc_html__( 'Style 9 ', 'bwdia-image-accordion' ),
					'style10' => esc_html__( 'Style 10 ', 'bwdia-image-accordion' ),
					'style11' => esc_html__( 'Style 11 ', 'bwdia-image-accordion' ),
					'style12' => esc_html__( 'Style 12 ', 'bwdia-image-accordion' ),
					'style13' => esc_html__( 'Style 13 ', 'bwdia-image-accordion' ),
					'style14' => esc_html__( 'Style 14 ', 'bwdia-image-accordion' ),
					'style15' => esc_html__( 'Style 15 ', 'bwdia-image-accordion' ),
					'style16' => esc_html__( 'Style 16 ', 'bwdia-image-accordion' ),
					'style17' => esc_html__( 'Style 17 ', 'bwdia-image-accordion' ),
					'style18' => esc_html__( 'Style 18 ', 'bwdia-image-accordion' ),
					'style19' => esc_html__( 'Style 19 ', 'bwdia-image-accordion' ),
					'style20' => esc_html__( 'Style 20 ', 'bwdia-image-accordion' ),
				],
			]
		);
		$this->end_controls_section();
        $this->start_controls_section(
			'bwdia_image_accordion_content_style',
		    [
		        'label' => esc_html__('Content','bwdia-image-accordion'),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
		   
		    ]
		);
		$this->add_responsive_control(
			'bwdia_img_acc_content_align',
			[
				'label' => esc_html__( ' Content Alignment', 'bwdsi-social-icon' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'start' => [
						'title' => esc_html__( 'Left', 'bwdsi-social-icon' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'bwdsi-social-icon' ),
						'icon' => 'eicon-text-align-center',
					],
					'end' => [
						'title' => esc_html__( 'Right', 'bwdsi-social-icon' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .bwdia-content-box' => 'text-align: {{UNIT}};',
				],
				'toggle' => true,
			]
		);
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'bwdia_image_acc_show_one_item',
			[
				'label' => esc_html__( 'Active item', 'bwdia-image-accordion' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'bwdia-image-accordion' ),
				'label_off' => esc_html__( 'Hide', 'bwdia-image-accordion' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		$repeater->add_control(
			'bwdia_image_acc_show_title',
			[
				'label' => esc_html__( 'Show Title', 'bwdia-image-accordion' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'bwdia-image-accordion' ),
				'label_off' => esc_html__( 'Hide', 'bwdia-image-accordion' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		$repeater->add_control(
			'bwdia_image_acc_title',
			[
				'label' => esc_html__( 'Title', 'bwdia-image-accordion' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Williamson', 'bwdia-image-accordion' ),
				'placeholder' => esc_html__( 'Type your title here', 'bwdia-image-accordion' ),
				'dynamic' => [
					'active' => true,
				],
				'condition' => [
					'bwdia_image_acc_show_title' => 'yes',
				],
			]
		);
		$repeater->add_control(
			'bwdia_image_title_color',
			[
				'label' => esc_html__( 'Color', 'bwdia-image-accordion' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}} .bwdia-title' => 'color: {{VALUE}}',
				],
				'condition' => [
					'bwdia_image_acc_show_title' => 'yes',
				],
			]
		);
		$repeater->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'bwdia_image_title_font_size',
				'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .bwdia-title',
				'condition' => [
					'bwdia_image_acc_show_title' => 'yes',
				],
			]
		);

		$repeater->add_control(
			'bwdia_image_acc_show_decs',
			[
				'label' => esc_html__( 'Show Description', 'bwdia-image-accordion' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'bwdia-image-accordion' ),
				'label_off' => esc_html__( 'Hide', 'bwdia-image-accordion' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'separator' => 'before',

			]
		);
		$repeater->add_control(
			'bwdia_image_acc_shape_decs',
			[
				'label' => esc_html__( 'Description', 'bwdia-image-accordion' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, suscipit.', 'bwdia-image-accordion' ),
				'placeholder' => esc_html__( 'Type your title here', 'bwdia-image-accordion' ),
				'dynamic' => [
					'active' => true,
				],
				'condition' => [
					'bwdia_image_acc_show_decs' => 'yes',
				],
			]
		);
		$repeater->add_control(
			'bwdia_image_decs_color',
			[
				'label' => esc_html__( 'Color', 'bwdia-image-accordion' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'bwdim_image_show_decs' => 'yes',
				],
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}} .bwdia-decs' => 'color: {{VALUE}}',
				],
				'condition' => [
					'bwdia_image_acc_show_decs' => 'yes',
				],
			]
		);
		$repeater->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'bwdim_decs_font_size',
				'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .bwdia-decs',
				'condition' => [
					'bwdia_image_acc_show_decs' => 'yes',
				],
			]
		);
		$repeater->add_control(
			'bwdia_image_cont_bg_switch',
			[
				'label' => esc_html__( 'Show Content Bg', 'bwdia-image-accordion' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'bwdia-image-accordion' ),
				'label_off' => esc_html__( 'Hide', 'bwdia-image-accordion' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'separator' => 'before',
			]
		);
		$repeater->add_control(
			'bwdia_img_content_background_color',
			[
				'label' => esc_html__( 'Content Bg Color', 'bwdia-image-accordion' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}} .bwdia-content-bg' => 'background: {{VALUE}} !important',
				],
				'condition' => [
					'bwdia_image_cont_bg_switch' => 'yes',
				],
			]
		);
		$repeater->add_control(
			'bwdia_image_accordion_image',
			[
				'label' => esc_html__( 'Choose Image', 'bwdia-image-accordion' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
                'dynamic' => [
                    'active' => true,
                ],
				'separator' => 'before',
				'default' => [
					'url' => plugin_dir_url(__DIR__).'assets/public/img/1.jpg',
				],
			]
		);
		$repeater->add_control(
			'bwdia_image_accordion_show_link',
			[
				'label' => esc_html__( 'Show Image Link', 'bwdia-image-accordion' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'bwdia-image-accordion' ),
				'label_off' => esc_html__( 'Hide', 'bwdia-image-accordion' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		$repeater->add_control(
			'bwdia_image_acc_link',
			[
				'label' => esc_html__( 'Link', 'bwdia-image-accordion' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'Write link here', 'bwdia-image-accordion' ),
				'default' => [
					'url' => '#',
				],
				'dynamic' => [
					'active' => true,
				],
				'condition' => [
					'bwdia_image_accordion_show_link' => 'yes',
				],
			]
		);
		$this->add_control(
			'bwdia_image_accordion_item',
			[
				'label' => esc_html__( 'Image Accordion list', 'bwdia-image-accordion' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'bwdia_image_acc_title' => esc_html__( 'Williamso', 'bwdia-image-accordion' ),
					],
					[
						'bwdia_image_acc_title' => esc_html__( 'Jonduae', 'bwdia-image-accordion' ),
					],
					[
						'bwdia_image_acc_title' => esc_html__( 'Alexraue', 'bwdia-image-accordion' ),
					],
					[
						'bwdia_image_acc_title' => esc_html__( 'Luthipeue', 'bwdia-image-accordion' ),
					],
				],
				'title_field' => '{{{ bwdia_image_acc_title }}}',
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'style_section',
			[
				'label' => esc_html__( 'Image', 'bwdia-image-accordion' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'bwdia_image_style_background_overlay_color',
			[
				'label' => esc_html__( 'Image Overlay Color', 'bwdia-image-accordion' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}} .bwdia-single-img:hover > a:before' => 'background-color: {{VALUE}} !important',
				],
			]
		);
		$this->add_responsive_control(
			'bwdia_image_shape_width',
			[
				'label' => esc_html__( 'Image Height', 'bwdia-image-accordion' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1500,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}} .bwdia-common-style' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'bwdia_image_style_background_color',
			[
				'label' => esc_html__( 'Background Color', 'bwdia-image-accordion' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}} .bwdia-common-style' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'bwdia_image_padding',
			[
				'label' => esc_html__( 'Padding', 'bwdia-image-accordion' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}} .bwdia-common-style' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'bwdia_img_background_border',
				'label' => esc_html__( 'Border', 'bwdia-image-accordion' ),
				'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .bwdim-box',
			]
		);
		$this->add_responsive_control(
			'bwdia_image_background_border_radius',
			[
				'label' => esc_html__( 'Border radius', 'bwdia-image-accordion' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}} .bwdia-common-style' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->end_controls_section();






    }

	protected function render() {
		$settings = $this->get_settings_for_display();

		if ( ! empty( $settings['bwdia_image_acc_btn_link']['url'] ) ) {
			$this->add_link_attributes( 'bwdia_image_acc_btn_link', $settings['bwdia_image_acc_btn_link'] );
		}
		if ( ! empty( $settings['bwdia_image_acc_link']['url'] ) ) {
			$this->add_link_attributes( 'bwdia_image_acc_link', $settings['bwdia_image_acc_link'] );
		}


		if ('style1' === $settings['bwdia_image_accordion_style_layout']) { 
		?>

			<div class="bwdia-img-accordion-1 bwdia-common-style">
			<?php
				if ( $settings['bwdia_image_accordion_item'] ) {
					foreach ( $settings['bwdia_image_accordion_item'] as $item ) { ?>
			<div class="bwdia-single-img elementor-repeater-item-<?php echo esc_attr( $item['_id'] ); if($item['bwdia_image_acc_show_one_item'] === 'yes'){echo ' bwdia-active-item';}?>">
				<a href="<?php echo esc_url($item['bwdia_image_acc_link']['url']);?>"><img src="<?php echo esc_attr($item['bwdia_image_accordion_image']['url']); ?>" alt="">
				<div class="bwdia-content-box">
					<div class="bwdia-title"><?php echo esc_html($item['bwdia_image_acc_title']);?></div>
					<div class="bwdia-decs"><?php echo esc_html($item['bwdia_image_acc_shape_decs']);?></div>
				</div>
				</a>
			</div>
				<?php
				}	
				}	
				?>
			</div>

		<?php
		}elseif ('style2' === $settings['bwdia_image_accordion_style_layout']) { 
			?>
	
		<div class="bwdia-img-accordion-2 bwdia-common-style">
				<?php
					if ( $settings['bwdia_image_accordion_item'] ) {
						foreach ( $settings['bwdia_image_accordion_item'] as $item ) { ?>
			<div class="bwdia-single-img elementor-repeater-item-<?php echo esc_attr( $item['_id'] );
			 if($item['bwdia_image_acc_show_one_item'] === 'yes'){echo ' bwdia-active-item';}?>">
				<a href="<?php echo esc_url($item['bwdia_image_acc_link']['url']);?>">
					<img src="<?php echo esc_attr($item['bwdia_image_accordion_image']['url']); ?>" alt="">
					<div class="bwdia-content-box">
						<div class="bwdia-title"><?php echo esc_html($item['bwdia_image_acc_title']);?></div>
						<div class="bwdia-decs"><?php echo esc_html($item['bwdia_image_acc_shape_decs']);?></div>
					</div>
					</a>
			</div>
					<?php
					}	
				}	
					?>
		</div>
	
			<?php
		}elseif ('style3' === $settings['bwdia_image_accordion_style_layout']) { 
			?>
	
				<div class="bwdia-img-accordion-3 bwdia-common-style">
				<?php
					if ( $settings['bwdia_image_accordion_item'] ) {
						foreach ( $settings['bwdia_image_accordion_item'] as $item ) { ?>
				<div class="bwdia-single-img elementor-repeater-item-<?php echo esc_attr( $item['_id'] ); if($item['bwdia_image_acc_show_one_item'] === 'yes'){echo ' bwdia-active-item';}?>">
				<a href="<?php echo esc_url($item['bwdia_image_acc_link']['url']);?>"><img src="<?php echo esc_attr($item['bwdia_image_accordion_image']['url']); ?>" alt="">				<div class="bwdia-content-box bwdia-content-bg <?php if($item['bwdia_image_cont_bg_switch'] !== 'yes'){echo 'bwdia-deactive-content';} ?>">
					<div class="bwdia-title"><?php echo esc_html($item['bwdia_image_acc_title']);?></div>
					<div class="bwdia-decs"><?php echo esc_html($item['bwdia_image_acc_shape_decs']);?></div>
					</div>
					</a>	
				</div>
					<?php
					}	
					}	
					?>
				</div>
	
			<?php
		}elseif ('style4' === $settings['bwdia_image_accordion_style_layout']) { 
			?>
	
				<div class="bwdia-img-accordion-4 bwdia-common-style">
				<?php
					if ( $settings['bwdia_image_accordion_item'] ) {
						foreach ( $settings['bwdia_image_accordion_item'] as $item ) { ?>
				<div class="bwdia-single-img elementor-repeater-item-<?php echo esc_attr( $item['_id'] ); if($item['bwdia_image_acc_show_one_item'] === 'yes'){echo ' bwdia-active-item';}?>">
				<a href="<?php echo esc_url($item['bwdia_image_acc_link']['url']);?>"><img src="<?php echo esc_attr($item['bwdia_image_accordion_image']['url']); ?>" alt="">				<div class="bwdia-content-box">
					<div class="bwdia-title"><?php echo esc_html($item['bwdia_image_acc_title']);?></div>
					<div class="bwdia-decs"><?php echo esc_html($item['bwdia_image_acc_shape_decs']);?></div>
					</div>
					</a>	
				</div>
					<?php
					}	
					}	
					?>
				</div>
	
			<?php
		}elseif ('style5' === $settings['bwdia_image_accordion_style_layout']) { 
			?>
	
				<div class="bwdia-img-accordion-5 bwdia-common-style">
				<?php
					if ( $settings['bwdia_image_accordion_item'] ) {
						foreach ( $settings['bwdia_image_accordion_item'] as $item ) { ?>
				<div class="bwdia-single-img elementor-repeater-item-<?php echo esc_attr( $item['_id'] ); if($item['bwdia_image_acc_show_one_item'] === 'yes'){echo ' bwdia-active-item';}?>">
				<a href="<?php echo esc_url($item['bwdia_image_acc_link']['url']);?>"><img src="<?php echo esc_attr($item['bwdia_image_accordion_image']['url']); ?>" alt="">				<div class="bwdia-content-box">
					<div class="bwdia-title"><?php echo esc_html($item['bwdia_image_acc_title']);?></div>
					<div class="bwdia-decs"><?php echo esc_html($item['bwdia_image_acc_shape_decs']);?></div>
				</div>
				</a>	
				</div>
					<?php
					}	
					}	
					?>
				</div>
	
			<?php
		}elseif ('style6' === $settings['bwdia_image_accordion_style_layout']) { 
			?>
	
				<div class="bwdia-img-accordion-6 bwdia-common-style">
				<?php
					if ( $settings['bwdia_image_accordion_item'] ) {
						foreach ( $settings['bwdia_image_accordion_item'] as $item ) { ?>
				<div class="bwdia-single-img elementor-repeater-item-<?php echo esc_attr( $item['_id'] ); if($item['bwdia_image_acc_show_one_item'] === 'yes'){echo ' bwdia-active-item';}?>">
				<a href="<?php echo esc_url($item['bwdia_image_acc_link']['url']);?>"><img src="<?php echo esc_attr($item['bwdia_image_accordion_image']['url']); ?>" alt="">				<div class="bwdia-content-box">
					<div class="bwdia-title"><?php echo esc_html($item['bwdia_image_acc_title']);?></div>
					<div class="bwdia-decs"><?php echo esc_html($item['bwdia_image_acc_shape_decs']);?></div>
					</div>
					</a>	
				</div>
					<?php
					}	
					}	
					?>
				</div>
	
			<?php
		}elseif ('style7' === $settings['bwdia_image_accordion_style_layout']) { 
			?>
	
				<div class="bwdia-img-accordion-7 bwdia-common-style">
				<?php
					if ( $settings['bwdia_image_accordion_item'] ) {
						foreach ( $settings['bwdia_image_accordion_item'] as $item ) { ?>
				<div class="bwdia-single-img elementor-repeater-item-<?php echo esc_attr( $item['_id'] ); if($item['bwdia_image_acc_show_one_item'] === 'yes'){echo ' bwdia-active-item';}?>">
				<a href="<?php echo esc_url($item['bwdia_image_acc_link']['url']);?>"><img src="<?php echo esc_attr($item['bwdia_image_accordion_image']['url']); ?>" alt="">				<div class="bwdia-content-box">
						<div class="bwdia-title"><?php echo esc_html($item['bwdia_image_acc_title']);?></div>
						<div class="bwdia-decs"><?php echo esc_html($item['bwdia_image_acc_shape_decs']);?></div>
					</div>
					</a>	
				</div>
					<?php
					}	
					}	
					?>
				</div>
	
			<?php
		}elseif ('style8' === $settings['bwdia_image_accordion_style_layout']) { 
			?>
	
				<div class="bwdia-img-accordion-8 bwdia-common-style">
				<?php
					if ( $settings['bwdia_image_accordion_item'] ) {
						foreach ( $settings['bwdia_image_accordion_item'] as $item ) { ?>
				<div class="bwdia-single-img elementor-repeater-item-<?php echo esc_attr( $item['_id'] ); if($item['bwdia_image_acc_show_one_item'] === 'yes'){echo ' bwdia-active-item';}?>">
				<a href="<?php echo esc_url($item['bwdia_image_acc_link']['url']);?>"><img src="<?php echo esc_attr($item['bwdia_image_accordion_image']['url']); ?>" alt="">				<div class="bwdia-content-box">
					<div class="bwdia-title"><?php echo esc_html($item['bwdia_image_acc_title']);?></div>
					<div class="bwdia-decs"><?php echo esc_html($item['bwdia_image_acc_shape_decs']);?></div>
					</div>
					</a>	
				</div>
					<?php
					}	
					}	
					?>
				</div>
	
			<?php
		}elseif ('style9' === $settings['bwdia_image_accordion_style_layout']) { 
			?>
	
				<div class="bwdia-img-accordion-9 bwdia-common-style">
				<?php
					if ( $settings['bwdia_image_accordion_item'] ) {
						foreach ( $settings['bwdia_image_accordion_item'] as $item ) { ?>
				<div class="bwdia-single-img elementor-repeater-item-<?php echo esc_attr( $item['_id'] ); if($item['bwdia_image_acc_show_one_item'] === 'yes'){echo ' bwdia-active-item';}?>">
				<a href="<?php echo esc_url($item['bwdia_image_acc_link']['url']);?>"><img src="<?php echo esc_attr($item['bwdia_image_accordion_image']['url']); ?>" alt="">				<div class="bwdia-content-box">
						<div class="bwdia-title"><?php echo esc_html($item['bwdia_image_acc_title']);?></div>
						<div class="bwdia-decs"><?php echo esc_html($item['bwdia_image_acc_shape_decs']);?></div>
					</div>
					</a>	
				</div>
					<?php
					}	
					}	
					?>
				</div>
	
			<?php
		}elseif ('style10' === $settings['bwdia_image_accordion_style_layout']) { 
			?>
	
				<div class="bwdia-img-accordion-10 bwdia-common-style">
				<?php
					if ( $settings['bwdia_image_accordion_item'] ) {
						foreach ( $settings['bwdia_image_accordion_item'] as $item ) { ?>
				<div class="bwdia-single-img elementor-repeater-item-<?php echo esc_attr( $item['_id'] ); if($item['bwdia_image_acc_show_one_item'] === 'yes'){echo ' bwdia-active-item';}?>">
				<a href="<?php echo esc_url($item['bwdia_image_acc_link']['url']);?>"><img src="<?php echo esc_attr($item['bwdia_image_accordion_image']['url']); ?>" alt="">				<div class="bwdia-content-box">
						<div class="bwdia-title"><?php echo esc_html($item['bwdia_image_acc_title']);?></div>
						<div class="bwdia-decs"><?php echo esc_html($item['bwdia_image_acc_shape_decs']);?></div>
					</div>
					</a>	
				</div>
					<?php
					}	
					}	
					?>
				</div>
	
			<?php
		}elseif ('style11' === $settings['bwdia_image_accordion_style_layout']) { 
			?>
	
				<div class="bwdia-img-accordion-11 bwdia-common-style">
				<?php
					if ( $settings['bwdia_image_accordion_item'] ) {
						foreach ( $settings['bwdia_image_accordion_item'] as $item ) { ?>
				<div class="bwdia-single-img elementor-repeater-item-<?php echo esc_attr( $item['_id'] ); if($item['bwdia_image_acc_show_one_item'] === 'yes'){echo ' bwdia-active-item';}?>">
					<a href="<?php echo esc_url($item['bwdia_image_acc_link']['url']);?>">
						<div class="bwdia-img-box">
					<img src="<?php echo esc_attr($item['bwdia_image_accordion_image']['url']); ?>" alt="">
					</div>
					<div class="bwdia-content-box">
						<div class="bwdia-title"><?php echo esc_html($item['bwdia_image_acc_title']);?></div>
						<div class="bwdia-decs"><?php echo esc_html($item['bwdia_image_acc_shape_decs']);?></div>
					</div>
					</a>
				</div>
					<?php
					}	
					}	
					?>
				</div>
	
			<?php		
		}elseif ('style12' === $settings['bwdia_image_accordion_style_layout']) { 
			?>
	
				<div class="bwdia-img-accordion-12 bwdia-common-style">
				<?php
					if ( $settings['bwdia_image_accordion_item'] ) {
						foreach ( $settings['bwdia_image_accordion_item'] as $item ) { ?>
				<div class="bwdia-single-img elementor-repeater-item-<?php echo esc_attr( $item['_id'] ); if($item['bwdia_image_acc_show_one_item'] === 'yes'){echo ' bwdia-active-item';}?>">
					<a href="<?php echo esc_url($item['bwdia_image_acc_link']['url']);?>">
						<div class="bwdia-img-box">
					<img src="<?php echo esc_attr($item['bwdia_image_accordion_image']['url']); ?>" alt=""></div>
					<div class="bwdia-content-box">
						<div class="bwdia-title"><?php echo esc_html($item['bwdia_image_acc_title']);?></div>
						<div class="bwdia-decs"><?php echo esc_html($item['bwdia_image_acc_shape_decs']);?></div>
					</div>
					</a>
				</div>
					<?php
					}	
					}	
					?>
				</div>
	
			<?php
		}elseif ('style13' === $settings['bwdia_image_accordion_style_layout']) { 
			?>
	
				<div class="bwdia-img-accordion-13 bwdia-common-style">
				<?php
					if ( $settings['bwdia_image_accordion_item'] ) {
						foreach ( $settings['bwdia_image_accordion_item'] as $item ) { ?>
				<div class="bwdia-single-img elementor-repeater-item-<?php echo esc_attr( $item['_id'] ); if($item['bwdia_image_acc_show_one_item'] === 'yes'){echo ' bwdia-active-item';}?>">
					<a href="<?php echo esc_url($item['bwdia_image_acc_link']['url']);?>">
						<div class="bwdia-img-box">
					<img src="<?php echo esc_attr($item['bwdia_image_accordion_image']['url']); ?>" alt=""></div>
					<div class="bwdia-content-box">
						<div class="bwdia-title"><?php echo esc_html($item['bwdia_image_acc_title']);?></div>
						<div class="bwdia-decs"><?php echo esc_html($item['bwdia_image_acc_shape_decs']);?></div>
					</div>
					</a>
				</div>
					<?php
					}	
					}	
					?>
				</div>
	
			<?php
		}elseif ('style14' === $settings['bwdia_image_accordion_style_layout']) { 
			?>
	
				<div class="bwdia-img-accordion-14 bwdia-common-style">
				<?php
					if ( $settings['bwdia_image_accordion_item'] ) {
						foreach ( $settings['bwdia_image_accordion_item'] as $item ) { ?>
				<div class="bwdia-single-img elementor-repeater-item-<?php echo esc_attr( $item['_id'] ); if($item['bwdia_image_acc_show_one_item'] === 'yes'){echo ' bwdia-active-item';}?>">
					<a href="<?php echo esc_url($item['bwdia_image_acc_link']['url']);?>">
						<div class="bwdia-img-box">
					<img src="<?php echo esc_attr($item['bwdia_image_accordion_image']['url']); ?>" alt=""></div>
					<div class="bwdia-content-box bwdia-content-bg <?php if($item['bwdia_image_cont_bg_switch'] !== 'yes'){echo 'bwdia-deactive-content';} ?>">
						<div class="bwdia-title"><?php echo esc_html($item['bwdia_image_acc_title']);?></div>
						<div class="bwdia-decs"><?php echo esc_html($item['bwdia_image_acc_shape_decs']);?></div>
					</div>
					</a>
				</div>
					<?php
					}	
					}	
					?>
				</div>
	
			<?php
		}elseif ('style15' === $settings['bwdia_image_accordion_style_layout']) { 
			?>
	
				<div class="bwdia-img-accordion-15 bwdia-common-style">
				<?php
					if ( $settings['bwdia_image_accordion_item'] ) {
						foreach ( $settings['bwdia_image_accordion_item'] as $item ) { ?>
				<div class="bwdia-single-img elementor-repeater-item-<?php echo esc_attr( $item['_id'] ); if($item['bwdia_image_acc_show_one_item'] === 'yes'){echo ' bwdia-active-item';}?>">
				<a href="<?php echo esc_url($item['bwdia_image_acc_link']['url']);?>"><img src="<?php echo esc_attr($item['bwdia_image_accordion_image']['url']); ?>" alt="">				
					<div class="bwdia-content-box">
						<div class="bwdia-title"><?php echo esc_html($item['bwdia_image_acc_title']);?></div>
						<div class="bwdia-decs"><?php echo esc_html($item['bwdia_image_acc_shape_decs']);?></div>
					</div>
					</a>	
				</div>
					<?php
					}	
					}	
					?>
				</div>
	
			<?php
		}elseif ('style16' === $settings['bwdia_image_accordion_style_layout']) { 
			?>
	
				<div class="bwdia-img-accordion-16 bwdia-common-style">
				<?php
					if ( $settings['bwdia_image_accordion_item'] ) {
						foreach ( $settings['bwdia_image_accordion_item'] as $item ) { ?>
				<div class="bwdia-single-img elementor-repeater-item-<?php echo esc_attr( $item['_id'] ); if($item['bwdia_image_acc_show_one_item'] === 'yes'){echo ' bwdia-active-item';}?>">
				<a href="<?php echo esc_url($item['bwdia_image_acc_link']['url']);?>"><img src="<?php echo esc_attr($item['bwdia_image_accordion_image']['url']); ?>" alt="">					
					<div class="bwdia-content-box">
						<div class="bwdia-title"><?php echo esc_html($item['bwdia_image_acc_title']);?></div>
						<div class="bwdia-decs"><?php echo esc_html($item['bwdia_image_acc_shape_decs']);?></div>
					</div>
					</a>
				</div>
					<?php
					}	
					}	
					?>
				</div>
	
			<?php
		}elseif ('style17' === $settings['bwdia_image_accordion_style_layout']) { 
			?>
	
				<div class="bwdia-img-accordion-17 bwdia-common-style">
				<?php
					if ( $settings['bwdia_image_accordion_item'] ) {
						foreach ( $settings['bwdia_image_accordion_item'] as $item ) { ?>
				<div class="bwdia-single-img elementor-repeater-item-<?php echo esc_attr( $item['_id'] ); if($item['bwdia_image_acc_show_one_item'] === 'yes'){echo ' bwdia-active-item';}?>">
				<a href="<?php echo esc_url($item['bwdia_image_acc_link']['url']);?>"><img src="<?php echo esc_attr($item['bwdia_image_accordion_image']['url']); ?>" alt="">					
					<div class="bwdia-content-box bwdia-content-bg <?php if($item['bwdia_image_cont_bg_switch'] !== 'yes'){echo 'bwdia-deactive-content';} ?>">
						<div class="bwdia-title"><?php echo esc_html($item['bwdia_image_acc_title']);?></div>
						<div class="bwdia-decs"><?php echo esc_html($item['bwdia_image_acc_shape_decs']);?></div>
					</div>
					</a>
				</div>
					<?php
					}	
					}	
					?>
				</div>
	
			<?php
		}elseif ('style18' === $settings['bwdia_image_accordion_style_layout']) { 
			?>
	
				<div class="bwdia-img-accordion-18 bwdia-common-style">
				<?php
					if ( $settings['bwdia_image_accordion_item'] ) {
						foreach ( $settings['bwdia_image_accordion_item'] as $item ) { ?>
				<div class="bwdia-single-img elementor-repeater-item-<?php echo esc_attr( $item['_id'] ); if($item['bwdia_image_acc_show_one_item'] === 'yes'){echo ' bwdia-active-item';}?>">
				<a href="<?php echo esc_url($item['bwdia_image_acc_link']['url']);?>"><img src="<?php echo esc_attr($item['bwdia_image_accordion_image']['url']); ?>" alt="">				<div 
				class="bwdia-content-box bwdia-content-bg <?php if($item['bwdia_image_cont_bg_switch'] !== 'yes'){echo 'bwdia-deactive-content';} ?>">
						<div class="bwdia-title"><?php echo esc_html($item['bwdia_image_acc_title']);?></div>
						<div class="bwdia-decs"><?php echo esc_html($item['bwdia_image_acc_shape_decs']);?></div>
					</div>
					</a>	
				</div>
					<?php
					}	
					}	
					?>
				</div>
	
			<?php
		}elseif ('style19' === $settings['bwdia_image_accordion_style_layout']) { 
			?>
	
				<div class="bwdia-img-accordion-19 bwdia-common-style">
				<?php
					if ( $settings['bwdia_image_accordion_item'] ) {
						foreach ( $settings['bwdia_image_accordion_item'] as $item ) { ?>
				<div class="bwdia-single-img elementor-repeater-item-<?php echo esc_attr( $item['_id'] ); if($item['bwdia_image_acc_show_one_item'] === 'yes'){echo ' bwdia-active-item';}?>">
				<a href="<?php echo esc_url($item['bwdia_image_acc_link']['url']);?>"><img src="<?php echo esc_attr($item['bwdia_image_accordion_image']['url']); ?>" alt="">				<div class="bwdia-content-box bwdia-content-bg <?php if($item['bwdia_image_cont_bg_switch'] !== 'yes'){echo 'bwdia-deactive-content';} ?>">
						<div class="bwdia-title"><?php echo esc_html($item['bwdia_image_acc_title']);?></div>
						<div class="bwdia-decs"><?php echo esc_html($item['bwdia_image_acc_shape_decs']);?></div>
					</div>
					</a>	
				</div>
					<?php
					}	
					}	
					?>
				</div>
	
			<?php
		}elseif ('style20' === $settings['bwdia_image_accordion_style_layout']) { 
			?>
	
				<div class="bwdia-img-accordion-20 bwdia-common-style">
				<?php
					if ( $settings['bwdia_image_accordion_item'] ) {
						foreach ( $settings['bwdia_image_accordion_item'] as $item ) { ?>
				<div class="bwdia-single-img elementor-repeater-item-<?php echo esc_attr( $item['_id'] ); if($item['bwdia_image_acc_show_one_item'] === 'yes'){echo ' bwdia-active-item';}?>">
				<a href="<?php echo esc_url($item['bwdia_image_acc_link']['url']);?>"><img src="<?php echo esc_attr($item['bwdia_image_accordion_image']['url']); ?>" alt="">					<div class="bwdia-content-box bwdia-content-bg <?php if($item['bwdia_image_cont_bg_switch'] !== 'yes'){echo 'bwdia-deactive-content';} ?>">
						<div class="bwdia-title"><?php echo esc_html($item['bwdia_image_acc_title']);?></div>
						<div class="bwdia-decs"><?php echo esc_html($item['bwdia_image_acc_shape_decs']);?></div>
					</div>
					</a>
				</div>
					<?php
					}	
					}	
					?>
				</div>
	
			<?php
		}	

		 
	}
}



