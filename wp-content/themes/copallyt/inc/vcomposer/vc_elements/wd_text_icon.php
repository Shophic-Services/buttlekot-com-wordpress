<?php
global $vc_add_css_animation;
global $icons;
$icons = unserialize( $icons );
add_filter( 'vc_iconpicker-type-fontawesome', 'vc_iconpicker_type_fontawesome' );
vc_map( array(
	"name" => esc_html__("Text block with an Icon", 'copallyt'),
	"base" => "wd_text_icon",
	"icon" => get_template_directory_uri()."/images/icon/meknes.png",
	"content_element" => true,
	"is_container" => FALSE,
	"params" => array(
		array(
			"heading" => esc_html__("Alignment", 'copallyt'),
			"type" => "dropdown",
			"param_name" => "box_alignment",
			'value' => array('Left (Default)' => 'left',
							 'center' => 'center',
							 'right' => 'right',
							),
		),
		array(
			"heading" => esc_html__("Show subtitle", 'copallyt'),
			"type" => "dropdown",
			"param_name" => "box_show_subtitle",
			'value' => array(
							 'none' => 'none',
							 'Show SubTitle' => 'wd_show',
							),
		),
		array(
			"heading" => esc_html__("Icon Position", 'copallyt'),
			"type" => "dropdown",
			"param_name" => "box_style",
			'value' => array('(Default)' => 'style1',
							 'Icon Left' => 'style2',
							 'Icon right' => 'style3',
							),
		),
		array(
			"heading" => esc_html__("Apply Link To", 'copallyt'),
			"type" => "dropdown",
			"param_name" => "box_link_apply",
			'value' => array('No Link (Default)' => 'no_link',
							 'All Box' => 'all_box',
							 'Title Box' => 'title_box',
							 'Read More button' => 'read_more_btn',
							),
		),
		array(
			"heading" => esc_html__("Extra class name", 'copallyt'),
			"type" => "textfield",
			"param_name" => "box_extra_class_name",
			"value" => '',
			"description" => 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.'
		),
		
		//__________________Title_______________________
		array(
			"heading" => esc_html__("Title Text", 'copallyt'),
			"type" => "textfield",
			"param_name" => "box_title",
			"value" => 'I am a Title change my',
			"group" => "Title",
		),
		array(
			"heading" => esc_html__("Title Text Padding", 'copallyt'),
			"type" => "textfield",
			"param_name" => "box_title_padding",
			"value" => '0px',
			"group" => "Title",
		),
		array(
			"heading" => esc_html__("Text Color", 'copallyt'),
			"type" => "colorpicker",
			"param_name" => "box_title_color",
			"value" => '#eee',
			"group" => "Title",
		),
		array(
			"heading" => esc_html__("Title Separator Color", 'copallyt'),
			"type" => "colorpicker",
			"param_name" => "box_title_separator_color",
			"value" => '',
			"group" => "Title",
		),
		array(
			"heading" => esc_html__("Title Separator Height", 'copallyt'),
			"type" => "textfield",
			"param_name" => "box_title_separator_height",
			"value" => '',
			"group" => "Title",
		),
		array(
			"heading" => esc_html__("Title Separator Width", 'copallyt'),
			"type" => "textfield",
			"param_name" => "box_title_separator_width",
			"value" => '',
			"group" => "Title",
		),
		//////////// Typography Title
		array(
			"type" => "textfield",
			"heading" => esc_html__("Font Family", 'copallyt'),
			"param_name" => "wd_title_font_family",
			"group" => "Title",
		),
		
		array(
			"type" => "dropdown",
			"heading" 		=>	__("Font Weight", 'copallyt'),
			"param_name"	=>	"wd_title_font_weight",
			'value' => array(
				__('Default', 'copallyt')	=>	'400',
				'100'	=>	'100',
				'200'	=>	'200',
				'300'	=>	'300',
				'500'	=>	'500',
				'600'	=>	'600',
				'700'	=>	'700',
				'800'	=>	'800',
				'900'	=>	'900',
			),
			"group" => "Title"
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Font Size", 'copallyt'),
			"param_name" => "wd_title_font_size",
			"min" => 14,
			"suffix" => "px",
			"group" => "Title",
		),
		
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Text Transform", 'copallyt'),
			"param_name" => "wd_title_text_transform",
			'value' => array(
				__('Default', 'copallyt')	=>	'None',
				'lowercase'	=>	'Lowercase',
				'uppercase'	=>	'Uppercase',
				'capitalize'	=>	'Capitalize',
				'inherit'	=>	'Inherit',
			),
			"group" => "Title"
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Line Height", 'copallyt'),
			"param_name" => "wd_title_line_height",
			"value" => "",
			"suffix" => "px",
			"group" => "Title"
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Letter spacing", 'copallyt'),
			"param_name" => "wd_title_letter_spacing",
			"value" => "",
			"suffix" => "px",
			"group" => "Title"
		),
		//__________________SubTitle_______________________
		array(
			"heading" => esc_html__("Subtitle Text", 'copallyt'),
			"type" => "textfield",
			"param_name" => "box_subtitle",
			"value" => 'I am a Subtitle change my',
			"group" => "Subtitle",
			"dependency" => Array("element" => "box_show_subtitle", "value" => array('wd_show')),
		),
		array(
			"heading" => esc_html__("Title SubText Padding", 'copallyt'),
			"type" => "textfield",
			"param_name" => "box_subtitle_padding",
			"value" => '0px',
			"group" => "Subtitle",
			"dependency" => Array("element" => "box_show_subtitle", "value" => array('wd_show')),
		),
		array(
			"heading" => esc_html__("SubTitle Text Color", 'copallyt'),
			"type" => "colorpicker",
			"param_name" => "box_subtitle_color",
			"value" => '#eee',
			"group" => "Subtitle",
			"dependency" => Array("element" => "box_show_subtitle", "value" => array('wd_show')),
		),
		//////////// Typography SubTitle
		array(
			"type" => "textfield",
			"heading" => esc_html__("Font Family", 'copallyt'),
			"param_name" => "wd_subtitle_font_family",
			"group" => "Subtitle",
			"dependency" => Array("element" => "box_show_subtitle", "value" => array('wd_show')),
		),
		
		array(
			"type" => "dropdown",
			"heading" 		=>	__("Font Weight", 'copallyt'),
			"param_name"	=>	"wd_subtitle_font_weight",
			'value' => array(
				__('Default', 'copallyt')	=>	'400',
				'100'	=>	'100',
				'200'	=>	'200',
				'300'	=>	'300',
				'500'	=>	'500',
				'600'	=>	'600',
				'700'	=>	'700',
				'800'	=>	'800',
				'900'	=>	'900',
			),
			"group" => "Subtitle",
			"dependency" => Array("element" => "box_show_subtitle", "value" => array('wd_show')),
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Font Size", 'copallyt'),
			"param_name" => "wd_subtitle_font_size",
			"min" => 14,
			"suffix" => "px",
			"group" => "Subtitle",
			"dependency" => Array("element" => "box_show_subtitle", "value" => array('wd_show')),
		),
		
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Text Transform", 'copallyt'),
			"param_name" => "wd_subtitle_text_transform",
			'value' => array(
				__('Default', 'copallyt')	=>	'None',
				'lowercase'	=>	'Lowercase',
				'uppercase'	=>	'Uppercase',
				'capitalize'	=>	'Capitalize',
				'inherit'	=>	'Inherit',
			),
			"group" => "Subtitle",
			"dependency" => Array("element" => "box_show_subtitle", "value" => array('wd_show')),
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Line Height", 'copallyt'),
			"param_name" => "wd_subtitle_line_height",
			"value" => "",
			"suffix" => "px",
			"group" => "Subtitle",
			"dependency" => Array("element" => "box_show_subtitle", "value" => array('wd_show')),
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Letter spacing", 'copallyt'),
			"param_name" => "wd_subtitle_letter_spacing",
			"value" => "",
			"suffix" => "px",
			"group" => "Subtitle",
			"dependency" => Array("element" => "box_show_subtitle", "value" => array('wd_show')),
		),
		//__________________Content_______________________
		array(
			"type" => "textarea",
			"heading" => esc_html__("Content Text", 'copallyt'),
			"param_name" => "box_content",
			"value" => "",
			"group" => "Content",
		),
		array(
			"heading" => esc_html__("Content Text Padding", 'copallyt'),
			"type" => "textfield",
			"param_name" => "box_content_padding",
			"value" => '0px',
			"group" => "Content",
		),
		array(
			"heading" => esc_html__("Content Text Color", 'copallyt'),
			"type" => "colorpicker",
			"param_name" => "box_content_color",
			"value" => '#eee',
			"group" => "Content",
		),
		//////////// Typography SubTitle
		array(
			"type" => "textfield",
			"heading" => esc_html__("Font Family", 'copallyt'),
			"param_name" => "wd_content_font_family",
			"group" => "Content",
		),
		array(
			"type" => "dropdown",
			"heading" 		=>	__("Font Weight", 'copallyt'),
			"param_name"	=>	"wd_content_font_weight",
			'value' => array(
				__('Default', 'copallyt')	=>	'400',
				'100'	=>	'100',
				'200'	=>	'200',
				'300'	=>	'300',
				'500'	=>	'500',
				'600'	=>	'600',
				'700'	=>	'700',
				'800'	=>	'800',
				'900'	=>	'900',
			),
			"group" => "Content"
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Font Size", 'copallyt'),
			"param_name" => "wd_content_font_size",
			"min" => 14,
			"suffix" => "px",
			"group" => "Content",
		),
		
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Text Transform", 'copallyt'),
			"param_name" => "wd_content_text_transform",
			'value' => array(
				__('Default', 'copallyt')	=>	'None',
				'lowercase'	=>	'Lowercase',
				'uppercase'	=>	'Uppercase',
				'capitalize'	=>	'Capitalize',
				'inherit'	=>	'Inherit',
			),
			"group" => "Content"
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Line Height", 'copallyt'),
			"param_name" => "wd_content_line_height",
			"value" => "",
			"suffix" => "px",
			"group" => "Content"
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Letter spacing", 'copallyt'),
			"param_name" => "wd_content_letter_spacing",
			"value" => "",
			"suffix" => "px",
			"group" => "Content"
		),
		//__________________Icon_______________________
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Icon', 'copallyt' ),
			'param_name' => 'wd_switch',
			'value' => array(
				__('None', 'copallyt')	=>	'None',
				'Icon'	=>	'wd_icon',
				'Image'	=>	'wd_image',
			),
			"group" => "Icon",
		),
		array(
			'type' => 'attach_image',
			'heading' => esc_html__( 'Image', 'copallyt' ),
			'param_name' => 'wd_source_image',
			"group" => "Icon",
			"dependency" => Array("element" => "wd_switch", "value" => array('wd_image')),
		),
		array(
			'type' => 'iconpicker',
			'heading' => esc_html__( 'Icon', 'copallyt' ),
			'param_name' => 'wd_icon_fontawesome',
			'settings' => array(
				'emptyIcon' => true, // default true, display an "EMPTY" icon?
				'iconsPerPage' => 4000, // default 100, how many icons per/page to display
			),
			'description' => esc_html__( 'Select icon from library.', 'copallyt' ),
			"dependency" => Array("element" => "wd_switch", "value" => array('wd_icon')),
			"group" => "Icon",
		),
		array(
			"heading" => esc_html__("Icon Padding", 'copallyt'),
			"type" => "textfield",
			"param_name" => "box_icon_padding",
			"value" => '0px',
			"group" => "Icon",
		),
		array(
			"heading" => esc_html__("Icon Margin", 'copallyt'),
			"type" => "textfield",
			"param_name" => "box_icon_margin",
			"value" => '0',
			"dependency" => Array("element" => "wd_switch", "value" => array('wd_icon')),
			"group" => "Icon",
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => esc_html__("Icon Font Size", 'copallyt'),
			"param_name" => "wd_icon_font_size",
			"min" => 14,
			"suffix" => "px",
			"dependency" => Array("element" => "wd_switch", "value" => array('wd_icon')),
			"group" => "Icon",
		),
		array(
			"heading" => esc_html__("Icon Color", 'copallyt'),
			"type" => "colorpicker",
			"param_name" => "box_icon_color",
			"value" => '#eee',
			"dependency" => Array("element" => "wd_switch", "value" => array('wd_icon')),
			"group" => "Icon",
		),
		
		array(
			"heading" => esc_html__("Icon Border Style", 'copallyt'),
			"type" => "dropdown",
			"param_name" => "box_icon_border_style",
			"dependency" => Array("element" => "wd_switch", "value" => array('wd_icon')),
			"value" => array(
				'None'   => 'none',
				'Solid'  => 'solid',
				'dached' => 'dached',
				'dotted' => 'dotted',
				'double' => 'double',
				'groove' => 'groove',
				'ridge'  => 'ridge',
				'inset'  => 'inset',
				'outset' => 'outset',
				),
			"group" => "Icon",
		),
		array(
			"heading" => esc_html__("Icon Background Color", 'copallyt'),
			"type" => "colorpicker",
			"param_name" => "box_icon_background_color",
			"value" => '#eee',
			"dependency" => Array("element" => "box_icon_border_style", "value" => array('solid','dached','dotted','double','groove','ridge','inset','outset')),
			"group" => "Icon",
		),
		array(
			"heading" => esc_html__("Icon Border Color", 'copallyt'),
			"type" => "colorpicker",
			"param_name" => "box_icon_border_color",
			"value" => '#eee',
			"dependency" => Array("element" => "box_icon_border_style", "value" => array('solid','dached','dotted','double','groove','ridge','inset','outset')),
			"group" => "Icon",
		),
		
		array(
			"heading" => esc_html__("Icon Border width", 'copallyt'),
			"type" => "textfield",
			"param_name" => "box_icon_border_width",
			"value" => '0',
			"dependency" => Array("element" => "box_icon_border_style", "value" => array('solid','dached','dotted','double','groove','ridge','inset','outset')),
			"group" => "Icon",
		),
		array(
			"heading" => esc_html__("Icon Border Radius", 'copallyt'),
			"type" => "textfield",
			"param_name" => "box_icon_border_radius",
			"value" => '0',
			"dependency" => Array("element" => "box_icon_border_style", "value" => array('solid','dached','dotted','double','groove','ridge','inset','outset')),
			"group" => "Icon",
		),
		
		//__________________Link_______________________
		array(
			"type" => "textfield",
			"heading" => esc_html__("Link", 'copallyt'),
			"param_name" => "box_link",
			"value" => "",
			"group" => "Link",
			"dependency" => Array("element" => "box_link_apply", "value" => array('all_box', 'title_box','read_more_btn')),
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Read MoreText", 'copallyt'),
			"param_name" => "box_read_more",
			"value" => "",
			"group" => "Link",
			"dependency" => Array("element" => "box_link_apply", "value" => array('read_more_btn')),
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Read More Class", 'copallyt'),
			"param_name" => "box_read_more_class",
			"value" => "",
			"group" => "Link",
			"dependency" => Array("element" => "box_link_apply", "value" => array('read_more_btn')),
		),

		$vc_add_css_animation

	)
) );