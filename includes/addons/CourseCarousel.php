<?php

namespace TutorLMS\Elementor\Addons;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Css_Filter;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Image_Size;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class CourseCarousel extends BaseAddon{

    use ETLMS_Trait;

    private static $prefix_class_layout = "elementor-layout-";

    private static $prefix_class_alignment = "elementor-align-";

    public function get_title() {
        return __('Course Carousel', 'tutor-elementor-addons');
    }

    public function get_style_depends(){
    	return [
    		'slick-css',
    		'slick-theme-css'
    	];
    }

	public function get_script_depends() {
		return [ 
			'etlms-slick-library',
			'etlms-slick-slider'
		];
	}

	protected function register_content_controls(){

		$this->start_controls_section(
			'course_carousel_content_section',
			[
				'label' => __('Layout','tutor-elementor-addons'),
				'tab' => Controls_Manager::TAB_CONTENT
			]
		);

		$this->add_control(
			'course_carousel_skin',
			[
				'label' => __('Skin','tutor-elementor-addons'),
				'type' => Controls_Manager::SELECT,
				'default' => 'cards',
				'options' =>[
					'card' => __('Cards','tutor-elementor-addons')
				]
			]
		);

		$this->add_responsive_control(
			'course_carousel_column',
			[
				'label' => __('Column','tutor-elementor-addons'),
				'type' => Controls_Manager::SELECT,
				'default' => '3',
				'options' =>[
					'1' => __('1','tutor-elementor-addons'),
					'2' => __('2','tutor-elementor-addons'),
					'3' => __('3','tutor-elementor-addons'),
					'4' => __('4','tutor-elementor-addons'),
				],
				'frontend_available' => true
			]			
		);
	

		$this->add_control(
			'course_carousel_image',
			[
				'label' => __( 'Show Image', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'tutor-elementor-addons' ),
				'label_off' => __( 'Hide', 'tutor-elementor-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name' => 'course_carousel_image_size', // Actually its `image_size`.
				'label' => __( 'Image Size', 'elementor' ),
				
			]
		);

		$this->add_control(
			'course_carousel_image_ratio',
			[
				'label' => __('Image Ratio'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['%'],
				'range' => [
					'%'=> [
						'min' => 0,
						'max' => 5
					]
				]
			]
		);		

		$this->add_control(
			'course_carousel_meta_data',
			[
				'label' => __( 'Meta Data', 'tutor-elementor-addons' ),
				'type' => Controls_Manager::SELECT2,
				'multiple' => true,
				'options' => [
					'title'  => __( 'Title', 'tutor-elementor-addons' ),
					'description' => __( 'Description', 'tutor-elementor-addons' ),
					'button' => __( 'Button', 'tutor-elementor-addons' ),
				],
				'default' => [ 'title', 'description' ],
			]
		);	

		$this->add_control(
			'course_carousel_meta_space',
			[
				'label' => __('Space Between'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px'=> [
						'min' => 0,
						'max' => 5
					]
				],
				'default' => [
					'size' => 15,
					'unit' => 'px'
				]
			]
		);

		$this->add_control(
			'course_carousel_meta_divider',
			[
				'type' => Controls_Manager::DIVIDER
			]
		);

		$this->add_control(
			'course_carousel_rating_settings',
			[
				'label' => __( 'Rating', 'tutor-elementor-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'tutor-elementor-addons' ),
				'label_off' => __( 'Hide', 'tutor-elementor-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);	        

		$this->add_control(
			'course_carousel_avatar_settings',
			[
				'label' => __( 'Avatar', 'tutor-elementor-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'tutor-elementor-addons' ),
				'label_off' => __( 'Hide', 'tutor-elementor-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);	        

		$this->add_control(
			'course_carousel_difficulty_settings',
			[
				'label' => __( 'Difficulty Level', 'tutor-elementor-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'tutor-elementor-addons' ),
				'label_off' => __( 'Hide', 'tutor-elementor-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);	  

		$this->add_control(
			'course_carousel_category_settings',
			[
				'label' => __( 'Category', 'tutor-elementor-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'tutor-elementor-addons' ),
				'label_off' => __( 'Hide', 'tutor-elementor-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);	        

		$this->add_control(
			'course_carousel_wishlist_settings',
			[
				'label' => __( 'Wishlist', 'tutor-elementor-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'tutor-elementor-addons' ),
				'label_off' => __( 'Hide', 'tutor-elementor-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);	        

		$this->add_control(
			'course_carousel_footer_settings',
			[
				'label' => __( 'Footer', 'tutor-elementor-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'tutor-elementor-addons' ),
				'label_off' => __( 'Hide', 'tutor-elementor-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);	        
		$this->end_controls_section();

		//enroll button

		$this->start_controls_section(
			'course_coursel_enroll_section',
			[
				'label' => __('Enroll Button','tutor-elementor-addons'),
				'tab' => Controls_Manager::TAB_CONTENT
			]
		);

		$this->add_responsive_control(
			'course_carousel_enroll_btn_align',
		[
		    'label'        => __('Alignment', 'tutor-elementor-addons'),
		    'type'         => \Elementor\Controls_Manager::CHOOSE,
		    'options'      => [
		        'left'   => [
		            'title' => __('Left', 'tutor-elementor-addons'),
		            'icon'  => 'fa fa-align-left',
		        ],
		        'center' => [
		            'title' => __('Center', 'tutor-elementor-addons'),
		            'icon'  => 'fa fa-align-center',
		        ],
		        'right'  => [
		            'title' => __('Right', 'tutor-elementor-addons'),
		            'icon'  => 'fa fa-align-right'
		        ],		        
		        'justify'  => [
		            'title' => __('Justified', 'tutor-elementor-addons'),
		            'icon'  => 'fa fa-align-justify'
		        ]
		    ],
				
		]			
		);

		$this->add_control(
			'course_carousel_btn_border',
			[
				'type' => Controls_Manager::SELECT,
				'default' => 'default',
				'options' => [
					'default' => __('Default','tutor-elementor-addons'), 
					'default_with_cart_icon' => __('Default with Cart Icon','tutor-elementor-addons'), 
					'text_button' => __('Text Button','tutor-elementor-addons'), 
					'text_with_cart' => __('Text with Cart','tutor-elementor-addons'), 
				]
			]

		);

        $this->add_control(
            'course_coursel_button_icon',
            [
                'label' => __('Icon','tutor-elementor-addons'),
                'type' => Controls_Manager::ICON,
                
                'label_block' => true,
            ]
        );          

		$this->add_control(
			'course_carousel_btn_icon_spacing',
			[
				'label' => __( 'Icon Spacing', 'tutor-elementor-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} .box' => 'margin: {{SIZE}}{{UNIT}};',
				],
			]
		);		

		$this->end_controls_section();

		//carousel settings

		$this->start_controls_section(
			'course_carousel_settings_section',
			[
				'label' => __('Carousel Settings'),
				'type' => Controls_Manager::TAB_CONTENT
			] 
		);

		$this->add_control(
			'course_carousel_settings_arrows',
			[
				'label' => __( 'Arrows', 'tutor-elementor-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'tutor-elementor-addons' ),
				'label_off' => __( 'Hide', 'tutor-elementor-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);		

		$this->add_control(
			'course_carousel_settings_dots',
			[
				'label' => __( 'Dots', 'tutor-elementor-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'tutor-elementor-addons' ),
				'label_off' => __( 'Hide', 'tutor-elementor-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'course_carousel_settings_transition',
			[
				'label' => __('Transition Duration'),
				'type' => Controls_Manager::TEXT,
				'default' => '600'
			]
		);

		$this->add_control(
			'course_carousel_settings_center_slides',
			[
				'label' => __( 'Centered Slides', 'tutor-elementor-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'tutor-elementor-addons' ),
				'label_off' => __( 'No', 'tutor-elementor-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'course_carousel_settings_scroll',
			[
				'label' => __( 'Smooth Scrolling', 'tutor-elementor-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'tutor-elementor-addons' ),
				'label_off' => __( 'No', 'tutor-elementor-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'course_carousel_settings_autoplay',
			[
				'label' => __( 'Auto Play', 'tutor-elementor-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'tutor-elementor-addons' ),
				'label_off' => __( 'No', 'tutor-elementor-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'course_carousel_settings_autoplay_speed',
			[
				'label' => __('Auto Play Speed'),
				'type' => Controls_Manager::TEXT,
				'default' => '5000'
			]
		);

		$this->add_control(
			'course_carousel_settings_infinite_loop',
			[
				'label' => __( 'Infinite Loop', 'tutor-elementor-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'tutor-elementor-addons' ),
				'label_off' => __( 'No', 'tutor-elementor-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'course_carousel_settings_pause_onhover',
			[
				'label' => __( 'Paush on Hover', 'tutor-elementor-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'tutor-elementor-addons' ),
				'label_off' => __( 'No', 'tutor-elementor-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'course_carousel_settings_pause_oninteraction',
			[
				'label' => __( 'Paush on Interaction', 'tutor-elementor-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'tutor-elementor-addons' ),
				'label_off' => __( 'No', 'tutor-elementor-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		$this->end_controls_section();
	}

	protected function register_style_controls(){

		$this->start_controls_section(
			'course_carousel_style_section',
			[
				'label' => __('Card','tutor-elementor-addons'),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

        $this->add_control(
            'course_carousel_card_background_color',
            [
                'label'     => __('Background Color', 'tutor-elementor-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}' => 'color: ',
                ],
            ]
        );         

        $this->add_control(
            'course_carousel_card_border_color',
            [
                'label'     => __('Border Color', 'tutor-elementor-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}' => 'color: ',
                ],
            ]
        );         

        $this->add_control(
            'course_carousel_card_border_width',
            [
                'label'     => __('Border Width', 'tutor-elementor-addons'),
                'type'      => Controls_Manager::SLIDER,
                'size_unit' => ['px'],
                'range' => [
                	'px' => [
                		'min' => 0,
                		'max' => 100,
                		'step' => 1
                	]
                ],
                'default' => [
                	'unit' => 'px',
                	'size' => 0
                ],
                'selectors' => [
                    '{{WRAPPER}}' => 'color: ',
                ],
            ]
        ); 

        $this->add_control(
            'course_carousel_card_border_radius',
            [
                'label' => __( 'Border Radius', 'tutor-elementor-addons' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}}' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};
                    '
                ],
            ]
        );         

        $this->add_control(
            'course_carousel_card_padding',
            [
                'label' => __( 'Padding', 'tutor-elementor-addons' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}}' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};
                    '
                ],
            ]
        );        

        /* Start Tabs */
        $this->start_controls_tabs('course_carousel_card_tabs');
            /* Normal Tab */
            $this->start_controls_tab(
                'course_carousel_card_normal_tab',
                [
                    'label' => __( 'Normal', 'tutor-elementor-addons' ),
                ]
            );
                $this->add_control(
                    'course_coursel_box_shadow',
                    [
                        'label'     => __('Color', 'tutor-elementor-addons'),
                        'type'      => Controls_Manager::SWITCHER,
                        'label_on' => __('Show','tutor-elementor-addons'),
                        'label_off'=> __('Hide','tutor-elementor-addons'),
                        'return_value' => 'yes',
                        'default' => 'yes'
                    ]
                );                

                $this->add_control(
                    'course_coursel_footer_seperator_color',
                    [
                        'label'     => __('Footer Seperator Color', 'tutor-elementor-addons'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}}' => ''
                        ],
                    ]
                );                

                $this->add_control(
                    'course_coursel_footer_seperator_width',
                    [
                        'label'     => __('Footer Seperator Width', 'tutor-elementor-addons'),
                        'type'      => Controls_Manager::SLIDER,
                        'size_units'=>['px'],
                        'range' => [
                        	'px' => [
                        		'min' => 0,
                        		'max' => 100,
                        		'step' => 1
                        	]
                        ],

                        'selectors' => [
                            '{{WRAPPER}}' =>''
                        ],
                    ]
                );


            $this->end_controls_tab();

            /* Hovered Tab */
            $this->start_controls_tab(
                'course_carousel_card_hover_tab',
                [
                    'label' => __( 'Hover', 'tutor-elementor-addons' ),
                ]
            );
                $this->add_control(
                    'course_coursel_box_hover_shadow',
                    [
                        'label'     => __('Color', 'tutor-elementor-addons'),
                        'type'      => Controls_Manager::SWITCHER,
                        'label_on' => __('Show','tutor-elementor-addons'),
                        'label_off'=> __('Hide','tutor-elementor-addons'),
                        'return_value' => 'yes',
                        'default' => 'yes',

                    ]
                );                

                $this->add_control(
                    'course_coursel_footer_seperator_hover_color',
                    [
                        'label'     => __('Footer Seperator Color', 'tutor-elementor-addons'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}}' => ''
                        ],
                    ]
                );                

                $this->add_control(
                    'course_coursel_footer_seperator_hover_width',
                    [
                        'label'     => __('Footer Seperator Width', 'tutor-elementor-addons'),
                        'type'      => Controls_Manager::SLIDER,
                        'size_units'=>['px'],
                        'range' => [
                        	'px' => [
                        		'min' => 0,
                        		'max' => 100,
                        		'step' => 1
                        	]
                        ],

                        'selectors' => [
                            '{{WRAPPER}}' => ''
                        ],
                    ]
                );
                $this->end_controls_tab();
        $this->end_controls_tabs();       	 
		$this->end_controls_section();

		// card section end

		//image section start
		$this->start_controls_section(
			'course_carousel_image_settings',
			[
				'label' => __('Image', 'tutor-elementor-addons'),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'course_carousel_image_spacing',
			[
				'label' => __('Spacing','tutor-elementor-addons'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'min' => 0,
					'max' => 100,
					'step' => 1
				]
			]
		);

		//start tabs
		$this->start_controls_tabs(
            'course_carousel_image_tabs',
 
		);
		//normal tab
		$this->start_controls_tab(
			'course_course_normal_tab',
			[
				'label' => __('Normal','tutor-elementor-addons')
			]
		);
			$this->add_group_control(
				Group_Control_Css_Filter::get_type(),
				[
					'label' => __('CSS Filters','tutor-elementor-addons'),
					'name' => 'course_caroulse_image_normal_filters',

					'selector' => '{{WRAPPER}} .elementor-image img',
				]
			);
		$this->end_controls_tab();

		//hover tab
		$this->start_controls_tab(
			'course_course_image_hover_tab',
			[
				'label' => __('Hover','tutor-elementor-addons')
			]
		);
			$this->add_group_control(
				Group_Control_Box_Shadow::get_type(),
				[
					'label' => __('CSS Filters','tutor-elementor-addons'),
					'name' => 'course_caroulse_image_hover_filters',

					'selector' => '{{WRAPPER}} .elementor-image img',
				]
			);		
		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_control(
			'course_carousel_image_seperator',
			[
				'type' => Controls_Manager::DIVIDER
			]
		);

		//badge
		$this->add_control(
			'course_carousel_badge_heading',
			[
				'label' => __('Badge','tutor-elementor-addons'),
				'type' => Controls_Manager::HEADING
			]
		);		

        $this->add_control(
            'course_carousel_badge_background_color',
            [
                'label'     => __('Background Color', 'tutor-elementor-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}' => ''
                ],
            ]
        );         

        $this->add_control(
            'course_carousel_badge_text_color',
            [
                'label'     => __('Text Color', 'tutor-elementor-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}' => ''
                ],
            ]
        ); 

        $this->add_control(
            'course_carousel_badge_border_radius',
            [
                'label' => __( 'Border Radius', 'tutor-elementor-addons' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 5,
                        'max' => 200,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}}' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );         

        $this->add_control(
            'course_carousel_badge_size',
            [
                'label' => __( 'Size', 'tutor-elementor-addons' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 5,
                        'max' => 200,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}}' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );         

        $this->add_control(
            'course_carousel_badge_margin',
            [
                'label' => __( 'Margin', 'tutor-elementor-addons' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 5,
                        'max' => 200,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}}' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );        

		$this->add_control(
			'course_carousel_badge_seperator',
			[
				'type' => Controls_Manager::DIVIDER
			]
		);

		//avatar
		$this->add_control(
			'course_carousel_avatar_heading',
			[
				'label' => __('Avatar','tutor-elementor-addons'),
				'type' => Controls_Manager::HEADING
			]
		);

        $this->add_control(
            'course_carousel_avatar_size',
            [
                'label' => __( 'Size', 'tutor-elementor-addons' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 5,
                        'max' => 200,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}}' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );        

        $this->add_control(
            'course_carousel_avatar_border_radius',
            [
                'label' => __( 'Border Radius', 'tutor-elementor-addons' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 5,
                        'max' => 200,
                    ],
                ],
                'default'=>[
                	'unit' => 'px',
                	'size' => 25
                ],
                'selectors' => [
                    '{{WRAPPER}}' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );  

		$this->end_controls_section();
		//image section end

		//content section start

		$this->start_controls_section(
			'course_carousel_content_styles',
			[
				'label' => __('Content','tutor-elementor-addons'),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'course_carousel_content_title',
			[
				'label' => __('Title', 'tutor-elementor-addons'),
				'type' => Controls_Manager::HEADING
			]
		);

        $this->add_control(
            'course_carousel_content_color',
            [
                'label'     => __('Color', 'tutor-elementor-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}' => ''
                ],
            ]
        );  

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'course_carousel_content_typo',
                'label'     => __('Typography', 'tutor-elementor-addons'),
                'selector'  => ' .tutor-segment-title',
            ]
        );

        $this->add_control(
            'course_carousel_content_spacing',
            [
                'label' => __( 'Space', 'tutor-elementor-addons' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 300,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}}' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
                'separator' => 'after'
            ]
        ); 

        $this->add_control(
        	'course_carousel_meta_title',
        	[
        		'label' => __('Meta','tutor-elementor-addons'),
        		'type' => Controls_Manager::HEADING
        	]
        );

        $this->add_control(
            'course_carousel_meta_color',
            [
                'label'     => __('Color', 'tutor-elementor-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}' => ''
                ],
            ]
        );         

        $this->add_control(
            'course_carousel_meta_separator_color',
            [
                'label'     => __('Separator Color', 'tutor-elementor-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}' => ''
                ],
            ]
        );  

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'course_carousel_meta_typo',
                'label'     => __('Typography', 'tutor-elementor-addons'),
                'selector'  => ' .tutor-segment-title',
                
            ]
        );        

        $this->add_control(
        	'course_carousel_meta_divier',
        	[
        		'type' => Controls_Manager::DIVIDER
        	]
        );


		$this->add_control(
			'course_carousel_category_title',
			[
				'label' => __('Category', 'tutor-elementor-addons'),
				'type' => Controls_Manager::HEADING
			]
		);

        $this->add_control(
            'course_carousel_category_color',
            [
                'label'     => __('Color', 'tutor-elementor-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}' => ''
                ],
            ]
        );  

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'course_carousel_category_typo',
                'label'     => __('Typography', 'tutor-elementor-addons'),
                'selector'  => ' .tutor-segment-title',
            ]
        );

        $this->add_control(
            'course_carousel_category_spacing',
            [
                'label' => __( 'Space', 'tutor-elementor-addons' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 300,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}}' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
                'separator' => 'after'
            ]
        ); 

		$this->end_controls_section();

		//content section end		

		//rating section start
		$this->start_controls_section(
			'course_carousel_rating_styles',
			[
				'label' => __('Rating','tutor-elementor-addons'),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

        $this->add_control(
            'course_carousel_star_color',
            [
                'label'     => __('Star Color', 'tutor-elementor-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .etlms-course-title h4' => 'color: ',
                ],
            ]
        );                
        $this->add_control(
            'course_carousel_star_size',
            [
                'label' => __( 'Star Size', 'tutor-elementor-addons' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 300,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}}' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        ); 

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'course_carouse_rating__typo',
                'label'     => __('Typography', 'tutor-elementor-addons'),
                'selector'  => '{{WRAPPER}}',
            ]
        );

        $this->add_control(
            'course_carousel_star_text_color',
            [
                'label'     => __('Text Color', 'tutor-elementor-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .etlms-course-title h4' => 'color: ',
                ],
            ]
        );                
        $this->add_responsive_control(
            'course_carousel_star_gap',
            [
                'label' => __( 'Gap', 'tutor-elementor-addons' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 300,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}}' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );         
		$this->end_controls_section();		
		//rating section end		

		//footer section start
		$this->start_controls_section(
			'course_carousel_footer_styles',
			[
				'label' => __('Footer','tutor-elementor-addons'),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);
        $this->add_control(
            'course_carouse_footer_background_color',
            [
                'label'     => __('Background Color', 'tutor-elementor-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}'=> 'color: ',
                ],
            ]
        ); 	

        $this->add_responsive_control(
            'course_carousel_footer_padding',
            [
                'label' => __( 'Padding', 'tutor-elementor-addons' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em' ],
                'selectors' => [
                    '.etlms-course-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
        	'course_carousel_footer_padding_divider',
        	[
        		'type' => Controls_Manager::DIVIDER
        	]
        );        

        $this->add_control(
        	'course_carousel_price_title',
        	[
        		'label' => __('Price','tutor-elementor-addons'),
        		'type' => Controls_Manager::HEADING
        	]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'course_carouse_price_typo',
                'label'     => __('Typography', 'tutor-elementor-addons'),
                'selector'  =>' .tutor-segment-title',
            ]
        );

        $this->add_control(
            'course_carousel_price_text_color',
            [
                'label'     => __('Text Color', 'tutor-elementor-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
					'{{WRAPPER}}'=> 'color: ',
				],
				'seperator' => 'after'
            ]
        );

        $this->add_control(
        	'course_carousel_cart_title',
        	[
        		'label' => 'Cart',
        		'type' => Controls_Manager::HEADING
        	]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'course_carousel_cart_typo',
                'label'     => __('Typography', 'tutor-elementor-addons'),
                'selector'  => '',
            ]
        );

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'course_carousel_cart_text_shadow',
				'label' => __( 'Text Shadow', 'tutor-elementor-addons' ),
				'selector' => '{{WRAPPER}} .wrapper',
			]
		);

		$this->start_controls_tabs(
			'course_carousel_cart_tabs'
		);
		//normal tab
		$this->start_controls_tab(
			'course_carousel_text_normal_tab',
			[
				'label' => __('Normal','tutor-elementor-addons')
			]
		);
	        $this->add_control(
	            'course_course_text_normal_color',
	            [
	                'label'     => __('Color', 'tutor-elementor-addons'),
	                'type'      => Controls_Manager::COLOR,
	                'selectors' => [
						"{{WRAPPER}}" => 'color: ',
					],
	            ]
	        );	        

	        $this->add_control(
	            'course_course_text_normal_background_color',
	            [
	                'label'     => __('Background Color', 'tutor-elementor-addons'),
	                'type'      => Controls_Manager::COLOR,
	                'selectors' => [
						"{{WRAPPER}}" => 'color: ',
					],
	            ]
	        );

		$this->end_controls_tab();		
		//hover tab
		$this->start_controls_tab(
			'course_carousel_text_hover_tab',
			[
				'label' => __('Hover','tutor-elementor-addons')
			]
		);
	        $this->add_control(
	            'course_course_text_hover_color',
	            [
	                'label'     => __('Color', 'tutor-elementor-addons'),
	                'type'      => Controls_Manager::COLOR,
	                'selectors' => [
						"{{WRAPPER}}" => 'color: ',
					],
	            ]
	        );	        

	        $this->add_control(
	            'course_course_text_hover_background_color',
	            [
	                'label'     => __('Background Color', 'tutor-elementor-addons'),
	                'type'      => Controls_Manager::COLOR,
	                'selectors' => [
						"{{WRAPPER}}" => 'color: ',
					],
	            ]
	        );		
		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_control(
			'course_carousel_footer_tab_divider',
			[
				'type' => Controls_Manager::DIVIDER
			]
		);

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'course_carousel_cart_border',
                'label' => __( 'Border Type', 'tutor-elementor-addons' ),
                'selector' => "{{WRAPPER}}",
            ]
        );

        $this->add_control(
            'course_carousel_cart_border_radius',
            [
                'label' => __( 'Border Radius', 'tutor-elementor-addons' ),
                'type' => Controls_Manager::DIMENSIONS,
                'selectors' => [
                    "{{wrapper}}" => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'course_carousel_cart_box_shadow',
                'label' => __( 'Box Shadow', 'tutor-elementor-addons' ),
                'selector' => "{{WRAPPER}}",
            ]
        );

        $this->add_control(
        	'course_carousel_cart_border_divider',
        	[
        		'type' => Controls_Manager::DIVIDER
        	]
        );

        $this->add_responsive_control(
            'course-carousel_cart_button_padding',
            [
                'label' => __( 'Padding', 'tutor-elementor-addons' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em' ],
                'selectors' => [
                    '.etlms-course-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );        

		$this->end_controls_section();		
		//footer section end		

		//arrow section start
		$this->start_controls_section(
			'course_carousel_arrow_styles',
			[
				'label' => __('Arrow','tutor-elementor-addons'),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);
		$this->end_controls_section();		
		//arrow section end
	}

	protected function render(){
		ob_start();
		$settings = $this->get_settings_for_display();

		include_once etlms_get_template('course/course-carousel');
		echo ob_get_clean();
	}

}