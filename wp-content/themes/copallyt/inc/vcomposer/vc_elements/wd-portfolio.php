<?php

//-----------------portfolio------------------*/
add_action('admin_init', 'copallyt_portfolio_init');

function copallyt_portfolio_init() {
	global $vc_add_css_animation;
	global $wd_fonts_array;

	if ( function_exists( 'vc_map' ) ) {
		vc_map( array(
			"name"            => esc_html__( "Portfolio AD", 'copallyt' ),
			"base"            => "admiral_portfolio",
			"icon" => get_template_directory_uri()."/images/icon/meknes.png",
			"content_element" => true,
			"is_container"    => false,
			"params"          => array(
				array(
					"heading"    => esc_html__( "Portfolio Layout", 'copallyt' ),
					"type"       => "dropdown",
					"param_name" => "admiral_portfolio_layout",
					"value"      => array(
						'Grid (Default)'        => 'grid',
						'Masonry'               => 'masonry',
						'Free Style'            => 'free_style',
						'Carousel'              => 'carousel',
						'Custom portfolio item' => 'custom_item'
					),
				),
				array(
					"heading"    => esc_html__( "Hover Style", 'copallyt' ),
					"type"       => "dropdown",
					"param_name" => "admiral_portfolio_hover_style",
					"value"      => array(
						'Style 1' => 'style-1',
						'Style 2' => 'style-2',
						'Style 3' => 'style-3'
					),
					"dependency" => Array(
						"element" => "admiral_portfolio_layout",
						"value"   => array( 'grid', 'masonry', 'free_style' )
					),
				),
                array(
                    "heading"    => esc_html__( "Layout Style", 'copallyt' ),
                    "type"       => "dropdown",
                    "param_name" => "admiral_portfolio_free_style_layout",
                    "value"      => array(
                        'Style 1' => 'style-1',
                        'Style 2' => 'style-2'
                    ),
                    "dependency" => Array(
                        "element" => "admiral_portfolio_layout",
                        "value"   => array( 'free_style' )
                    ),
                ),
				array(
             "type" => "colorpicker",
             "class" => "",
             "heading" => esc_html__("Overlay Color", 'copallyt'),
             "param_name" => "overlay_color",
             "value" => "",
             "value"   => array( 'grid', 'masonry', 'free_style' )
        ),
				array(
					"type"       => "checkbox",
					"heading"    => esc_html__( "Categories", 'copallyt' ),
					"param_name" => "admiral_portfolio_categories",
					'value'      => copallyt_get_categories( 'projet' ),
				),
				array(
					"type"       => "checkbox",
					"heading"    => esc_html__( "Enable Filters", 'copallyt' ),
					"param_name" => "admiral_portfolio_filters",
					"std"        => "yes",
					'value'      => array( esc_html__( 'Yes, please', 'copallyt' ) => 'yes' ),
					"dependency" => Array(
						"element" => "admiral_portfolio_layout",
						"value"   => array( 'grid', 'masonry', 'free_style' )
					),
				),
                array(
                    "type"       => "dropdown",
                    "heading"    => esc_html__( "Items To Show", 'copallyt' ),
                    "param_name" => "portfolio_items_to_show",
                    'value'      => array(
                        '1 item'  => '1',
                        '2 items' => '2',
                        '3 items' => '3',
                        '4 items' => '4',
                        '5 items' => '5',
                        '6 items' => '6',
                        '7 items' => '7',
                        '8 items' => '8',
                        '9 items' => '9',
                        '10 items' => '10',
                        '11 items' => '11',
                        '12 items' => '12',
                        '13 items' => '13',
                        '14 items' => '14',
                        '15 items' => '15',
                        '20 items' => '20',
                        '25 items' => '25',
                        '30 items' => '30',
                        '35 items' => '35',
                        '40 items' => '40',
                        'All items' => '-1'
                        
                        
                    ),
                    "dependency" => Array(
                        "element" => "admiral_portfolio_layout",
                        "value"   => array('masonry' , 'free_style', 'carousel', 'custom_item', 'grid' )
                    ),
                ),
                array(
                    "type"       => "checkbox",
                    "heading"    => esc_html__( "Show Pagination", 'copallyt' ),
                    "param_name" => "admiral_portfolio_pagination",
                    "std"        => "yes",
                    'value'      => array( esc_html__( 'Yes, please', 'copallyt' ) => 'false' ),
                    "dependency" => Array(
                        "element" => "admiral_portfolio_layout",
                        "value"   => array('masonry' , 'free_style', 'carousel', 'custom_item', 'grid' )
                    ),
                ),
                array(
                    "type"       => "checkbox",
                    "heading"    => esc_html__( "Enable Link Icon", 'copallyt' ),
                    "param_name" => "admiral_portfolio_link",
                    "std"        => "yes",
                    'value'      => array( esc_html__( 'Yes, please', 'copallyt' ) => 'yes' ),
                    "dependency" => Array(
                        "element" => "admiral_portfolio_layout",
                        "value"   => array('masonry' , 'free_style', 'carousel', 'custom_item', 'grid' )
                    ),
                ),
                array(
                    "type"       => "checkbox",
                    "heading"    => esc_html__( "Enable View Icon", 'copallyt' ),
                    "param_name" => "admiral_portfolio_view",
                    "std"        => "yes",
                    'value'      => array( esc_html__( 'Yes, please', 'copallyt' ) => 'yes' ),
                    "dependency" => Array(
                        "element" => "admiral_portfolio_layout",
                        "value"   => array('masonry' , 'free_style', 'carousel', 'custom_item', 'grid' )
                    ),
                ),
                
				array(
					"type"       => "dropdown",
					"heading"    => esc_html__( "Columns Number On Mobile", 'copallyt' ),
					"param_name" => "admiral_portfolio_columns_mobile",
					'value'      => array(
						'1 Column'  => '1',
						'2 Columns' => '2',
						'3 Columns' => '3',
						'4 Columns' => '4'
					),
					"dependency" => Array(
						"element" => "admiral_portfolio_layout",
						"value"   => array( 'grid', 'masonry', 'free_style' )
					),
				),
				array(
					"type"       => "dropdown",
					"heading"    => esc_html__( "Columns Number On Tablet", 'copallyt' ),
					"param_name" => "admiral_portfolio_columns_tablet",
					'value'      => array(
						'1 Column'  => '1',
						'2 Columns' => '2',
						'3 Columns' => '3',
						'4 Columns' => '4'
					),
					"dependency" => Array(
						"element" => "admiral_portfolio_layout",
						"value"   => array( 'grid', 'masonry', 'free_style' )
					),
				),
				array(
					"type"       => "dropdown",
					"heading"    => esc_html__( "Columns Number On Desktop", 'copallyt' ),
					"param_name" => "admiral_portfolio_columns_desktop",
					'value'      => array(
						'1 Column'  => '1',
						'2 Columns' => '2',
						'3 Columns' => '3',
						'4 Columns' => '4'
					),
					"dependency" => Array(
						"element" => "admiral_portfolio_layout",
						"value"   => array( 'grid', 'masonry', 'free_style' )
					),
				),
                array(
                    "type" => "dropdown",
                    "heading" => esc_html__("Static Html Item Description Position", 'copallyt'),
                    "param_name" => "admiral_static_html_item_position",
                    "value" => array( 'None' => 'none',
                                      'Before' => 'before',
                                      'After' => 'after'),
                    "dependency" => Array("element" => "admiral_portfolio_layout", "value" => array( 'grid'))
                ),
                array(
                    "type" => "dropdown",
                    "heading" => esc_html__("Static Html Item Description Column Width", 'copallyt'),
                    "param_name" => "admiral_static_html_item_width",
                    "value" => array( '1 Columns' => 'one-column',
                                      '2 Columns' => 'two-columns',
                                      '3 Columns' => 'three-columns'),
                    "dependency" => Array("element" => "admiral_portfolio_layout", "value" => array( 'grid'))
                ),
                array(
                    "type" => "textarea_raw_html",
                    "heading" => esc_html__("Static HTML Item", 'copallyt'),
                    "param_name" => "admiral_static_html_item",
                    "dependency" => Array("element" => "admiral_portfolio_layout", "value" => array('grid'))
                ),
                array(
                     "type" => "textfield",
                     "class" => "",
                     "heading" => esc_html__("Spacing Between Items", 'copallyt'),
                     "param_name" => "padding_items",
                     "dependency" => Array("element" => "admiral_portfolio_layout", "value" => array('masonry' , 'free_style', 'grid'))
                ),
                array(
                     "type" => "colorpicker",
                     "class" => "",
                     "heading" => esc_html__("Static HTML Item background Color", 'copallyt'),
                     "param_name" => "admiral_static_html_item_bg_color",
                     "value" => "",
                     "group" => "Title Style",
                     "dependency" => Array("element" => "admiral_portfolio_layout", "value" => array( 'grid' ))
                ),
				array(
					"type"       => "dropdown",
					"heading"    => esc_html__( "Load More Style", 'copallyt' ),
					"param_name" => "load_more_style",
					'value'      => array(
						'Load More Link' => 'load_more_link',
						'Load More on scroll' => 'load_more_on_scroll',
                        'None'  => 'none'
					),
					"dependency" => Array(
						"element" => "admiral_portfolio_layout",
						"value"   => array( 'grid', 'masonry', 'free_style' )
					),
				),
				array(
					"type"       => "dropdown",
					"heading"    => esc_html__( "Navigation Style", 'copallyt' ),
					"param_name" => "navigation_style",
					'value'      => array(
						'Arrows'  => 'arrow',
						'Thumbnail' => 'thumb'
					),
					"dependency" => Array(
						"element" => "admiral_portfolio_layout",
						"value"   => array( 'carousel' )
					),
				),

				// Portfolio title Typo
				array(
                     "heading" => esc_html__("Portfolio Title Tag", 'copallyt'),
                     "type" => "dropdown",
                     "param_name" => "portfolio_title_tag",
                     "value" => array('H2 (Default)' => 'h2',
                                                        'H1' => 'h1',
                                                        'H3' => 'h3',
                                                        'H4' => 'h4',
                                                        'H5' => 'h5',
                                                        'H6' => 'h6'),
                     "dependency" => Array("element" => "admiral_portfolio_layout", "value" => array('masonry' , 'free_style', 'carousel', 'custom_item', 'grid' )),
                     "group" => "Title Style",
                ),
        array(
             "type" => "dropdown",
             'value' => $wd_fonts_array,
             "heading" => esc_html__("Portfolio Title Font Family", 'copallyt'),
             "param_name" => "portfolio_title_font_family",
             "dependency" => Array("element" => "admiral_portfolio_layout", "value" => array('masonry' , 'free_style', 'carousel', 'custom_item', 'grid' )),
             "group" => "Title Style",
        ),
        array(
             "type" => "textfield",
             "class" => "",
             "heading" => esc_html__("Portfolio Title Font Size", 'copallyt'),
             "param_name" => "portfolio_title_font_size",
             "min" => 14,
             "suffix" => "px",
             "group" => "Title Style",
             "dependency" => Array("element" => "admiral_portfolio_layout", "value" => array('masonry' , 'free_style', 'carousel', 'custom_item', 'grid' ))
        ),
        array(
             "type" => "colorpicker",
             "class" => "",
             "heading" => esc_html__("Portfolio Title Font Color", 'copallyt'),
             "param_name" => "portfolio_title_color",
             "value" => "",
             "group" => "Title Style",
             "dependency" => Array("element" => "admiral_portfolio_layout", "value" => array('masonry' , 'free_style', 'carousel', 'custom_item', 'grid' ))
        ),
        array(
             "type" => "dropdown",
             "heading"           =>   esc_html__("Portfolio Title Font Weight", 'copallyt'),
             "param_name"   =>   "portfolio_title_font_weight",
             'value' => array(
                  esc_html__('Default', 'copallyt') =>   '900',
                  '100'     =>   '100',
                  '200'     =>   '200',
                  '300'     =>   '300',
                  '500'     =>   '500',
                  '600'     =>   '600',
                  '700'     =>   '700',
                  '800'     =>   '800',
                  '400'     =>   '400',
             ),
             "group" => "Title Style",
             "dependency" => Array("element" => "admiral_portfolio_layout", "value" => array('masonry' , 'free_style', 'carousel', 'custom_item', 'grid' ))
        ),
        array(
             "type" => "dropdown",
             "heading" => esc_html__("Portfolio Title Text Transform", 'copallyt'),
             "param_name" => "portfolio_title_text_transform",
             'value' => array(
                  esc_html__('Default', 'copallyt') =>   'none',
                  'Lowercase'    =>   'lowercase',
                  'Uppercase'    =>   'uppercase',
                  'Capitalize'   =>   'capitalize',
                  'Inherit' =>   'inherit',
             ),
             "group" => "Title Style",
             "dependency" => Array("element" => "admiral_portfolio_layout", "value" => array('masonry' , 'free_style', 'carousel', 'custom_item', 'grid' ))
        ),
        array(
             "type" => "textfield",
             "class" => "",
             "heading" => esc_html__("Portfolio Title Line Height", 'copallyt'),
             "param_name" => "portfolio_title_line_height",
             "value" => "",
             "suffix" => "px",
             "group" => "Title Style",
             "dependency" => Array("element" => "admiral_portfolio_layout", "value" => array('masonry' , 'free_style', 'carousel', 'custom_item', 'grid' ))
        ),
        array(
             "type" => "textfield",
             "class" => "",
             "heading" => esc_html__("Portfolio Title Letter spacing", 'copallyt'),
             "param_name" => "portfolio_title_letter_spacing",
             "value" => "",
             "suffix" => "px",
             "group" => "Title Style",
             "dependency" => Array("element" => "admiral_portfolio_layout", "value" => array('masonry' , 'free_style', 'carousel', 'custom_item', 'grid' ))
        ),
        array(
             "type" => "dropdown",
             "heading"           =>   esc_html__("Portfolio Title Font Style", 'copallyt'),
             "param_name"   =>   "portfolio_title_font_style",
             'value' => array(
                  esc_html__('Normal', 'copallyt')  =>   'normal',
                  esc_html__('Italic','copallyt')        =>   'italic',
                  esc_html__('Inherit','copallyt')       =>   'inherit',
                  esc_html__('Initial','copallyt')       =>   'initial',
             ),
             "group" => "Title Style",
             "dependency" => Array("element" => "admiral_portfolio_layout", "value" => array('masonry' , 'free_style', 'carousel', 'custom_item', 'grid' ))
        ),
				

				// Tags Typo
        array(
             "type" => "dropdown",
             'value' => $wd_fonts_array,
             "heading" => esc_html__("Portfolio Tags Font Family", 'copallyt'),
             "param_name" => "portfolio_tags_font_family",
             "dependency" => Array("element" => "admiral_portfolio_layout", "value" => array('masonry' , 'free_style', 'carousel', 'custom_item', 'grid' )),
             "group" => "Tags Style",
        ),
        array(
             "type" => "textfield",
             "class" => "",
             "heading" => esc_html__("Portfolio Tags Font Size", 'copallyt'),
             "param_name" => "portfolio_tags_font_size",
             "min" => 14,
             "suffix" => "px",
             "group" => "Tags Style",
             "dependency" => Array("element" => "admiral_portfolio_layout", "value" => array('masonry' , 'free_style', 'carousel', 'custom_item', 'grid' )),
        ),
        array(
             "type" => "colorpicker",
             "class" => "",
             "heading" => esc_html__("Portfolio Tags Font Color", 'copallyt'),
             "param_name" => "portfolio_tags_color",
             "value" => "",
             "group" => "Tags Style",
             "dependency" => Array("element" => "admiral_portfolio_layout", "value" => array('masonry' , 'free_style', 'carousel', 'custom_item', 'grid' )),
        ),
        array(
             "type" => "dropdown",
             "heading"           =>   esc_html__("Portfolio Tags Font Weight", 'copallyt'),
             "param_name"   =>   "portfolio_tags_font_weight",
             'value' => array(
                  esc_html__('Default', 'copallyt') =>   '400',
                  '100'     =>   '100',
                  '200'     =>   '200',
                  '300'     =>   '300',
                  '500'     =>   '500',
                  '600'     =>   '600',
                  '700'     =>   '700',
                  '800'     =>   '800',
                  '400'     =>   '900',
             ),
             "group" => "Tags Style",
             "dependency" => Array("element" => "admiral_portfolio_layout", "value" => array('masonry' , 'free_style', 'carousel', 'custom_item', 'grid' ))
        ),
        array(
             "type" => "dropdown",
             "heading" => esc_html__("Portfolio Tags Text Transform", 'copallyt'),
             "param_name" => "portfolio_tags_text_transform",
             'value' => array(
                  esc_html__('Default', 'copallyt') =>   'none',
                  'Lowercase'    =>   'lowercase',
                  'Uppercase'    =>   'uppercase',
                  'Capitalize'   =>   'capitalize',
                  'Inherit' =>   'inherit',
             ),
             "group" => "Tags Style",
             "dependency" => Array("element" => "admiral_portfolio_layout", "value" => array('masonry' , 'free_style', 'carousel', 'custom_item', 'grid' ))
        ),
        array(
             "type" => "textfield",
             "class" => "",
             "heading" => esc_html__("Portfolio Tags Line Height", 'copallyt'),
             "param_name" => "portfolio_tags_line_height",
             "value" => "",
             "suffix" => "px",
             "group" => "Tags Style",
             "dependency" => Array("element" => "admiral_portfolio_layout", "value" => array('masonry' , 'free_style', 'carousel', 'custom_item', 'grid' ))
        ),
        array(
             "type" => "textfield",
             "class" => "",
             "heading" => esc_html__("Portfolio Tags Letter spacing", 'copallyt'),
             "param_name" => "portfolio_tags_letter_spacing",
             "value" => "",
             "suffix" => "px",
             "group" => "Tags Style",
             "dependency" => Array("element" => "admiral_portfolio_layout", "value" => array('masonry' , 'free_style', 'carousel', 'custom_item', 'grid' ))
        ),
        array(
             "type" => "dropdown",
             "heading"           =>   esc_html__("Portfolio Tags Font Style", 'copallyt'),
             "param_name"   =>   "portfolio_tags_font_style",
             'value' => array(
                  esc_html__('Normal', 'copallyt')  =>   'normal',
                  esc_html__('Italic','copallyt')        =>   'italic',
                  esc_html__('Inherit','copallyt')       =>   'inherit',
                  esc_html__('Initial','copallyt')       =>   'initial',
             ),
             "group" => "Tags Style",
             "dependency" => Array("element" => "admiral_portfolio_layout", "value" => array('masonry' , 'free_style', 'carousel', 'custom_item', 'grid' ))
        ),

        // Filters Typo
        array(
             "type" => "dropdown",
             "heading"           =>   esc_html__("Filters Position", 'copallyt'),
             "param_name"   =>   "filters_position",
             'value' => array(
                  esc_html__('Center', 'copallyt')  =>   'center',
                  esc_html__('Right','copallyt')        =>   'right',
                  esc_html__('Left','copallyt')       =>   'left'
             ),
             "group" => "Filters Style",
             "dependency" => Array("element" => "admiral_portfolio_layout", "value" => array('masonry', 'grid' ))
        ),
        array(
             "type" => "dropdown",
             'value' => $wd_fonts_array,
             "heading" => esc_html__("Filters Font Family", 'copallyt'),
             "param_name" => "filters_font_family",
             "dependency" => Array("element" => "admiral_portfolio_layout", "value" => array('masonry', 'grid' )),
             "group" => "Filters Style",
        ),
        array(
             "type" => "textfield",
             "class" => "",
             "heading" => esc_html__("Filters Font Size", 'copallyt'),
             "param_name" => "filters_font_size",
             "min" => 14,
             "suffix" => "px",
             "group" => "Filters Style",
             "dependency" => Array("element" => "admiral_portfolio_layout", "value" => array('masonry', 'grid' ))
        ),
        array(
             "type" => "colorpicker",
             "class" => "",
             "heading" => esc_html__("Filters Font Color", 'copallyt'),
             "param_name" => "filters_color",
             "value" => "",
             "group" => "Filters Style",
             "dependency" => Array("element" => "admiral_portfolio_layout", "value" => array('masonry', 'grid' ))
        ),
        array(
             "type" => "colorpicker",
             "class" => "",
             "heading" => esc_html__("Filters Hover Color", 'copallyt'),
             "param_name" => "filters_hover_color",
             "value" => "",
             "group" => "Filters Style",
             "dependency" => Array("element" => "admiral_portfolio_layout", "value" => array('masonry', 'grid' ))
        ),
        array(
             "type" => "dropdown",
             "heading"           =>   esc_html__("Filters Font Weight", 'copallyt'),
             "param_name"   =>   "filters_font_weight",
             'value' => array(
                  esc_html__('Default', 'copallyt') =>   '900',
                  '100'     =>   '100',
                  '200'     =>   '200',
                  '300'     =>   '300',
                  '500'     =>   '500',
                  '600'     =>   '600',
                  '700'     =>   '700',
                  '800'     =>   '800',
                  '400'     =>   '400',
             ),
             "group" => "Filters Style",
             "dependency" => Array("element" => "admiral_portfolio_layout", "value" => array('masonry', 'grid' ))
        ),
        array(
             "type" => "dropdown",
             "heading" => esc_html__("Filters Text Transform", 'copallyt'),
             "param_name" => "filters_text_transform",
             'value' => array(
                  esc_html__('Default', 'copallyt') =>   'none',
                  'Lowercase'    =>   'lowercase',
                  'Uppercase'    =>   'uppercase',
                  'Capitalize'   =>   'capitalize',
                  'Inherit' =>   'inherit',
             ),
             "group" => "Filters Style",
             "dependency" => Array("element" => "admiral_portfolio_layout", "value" => array('masonry', 'grid' ))
        ),
        array(
             "type" => "textfield",
             "class" => "",
             "heading" => esc_html__("Filters Line Height", 'copallyt'),
             "param_name" => "filters_line_height",
             "value" => "",
             "suffix" => "px",
             "group" => "Filters Style",
             "dependency" => Array("element" => "admiral_portfolio_layout", "value" => array('masonry', 'grid' ))
        ),
        array(
             "type" => "textfield",
             "class" => "",
             "heading" => esc_html__("Filters Letter spacing", 'copallyt'),
             "param_name" => "filters_letter_spacing",
             "value" => "",
             "suffix" => "px",
             "group" => "Filters Style",
             "dependency" => Array("element" => "admiral_portfolio_layout", "value" => array('masonry', 'grid' ))
        ),
        array(
             "type" => "dropdown",
             "heading"           =>   esc_html__("Filters Font Style", 'copallyt'),
             "param_name"   =>   "filters_font_style",
             'value' => array(
                  esc_html__('Normal', 'copallyt')  =>   'normal',
                  esc_html__('Italic','copallyt')        =>   'italic',
                  esc_html__('Inherit','copallyt')       =>   'inherit',
                  esc_html__('Initial','copallyt')       =>   'initial',
             ),
             "group" => "Filters Style",
             "dependency" => Array("element" => "admiral_portfolio_layout", "value" => array('masonry', 'grid' ))
        ),
		$vc_add_css_animation
    )
) );
}}