<?php 
global $icons;


vc_add_param("vc_tab",
		array(
			'type' => 'dropdown',
			'heading' =>  'Icon',
			'param_name' => "wd_icon",
			"value" =>$icons
			)
		);
vc_add_param("vc_tab",
        array(
            "type" => "checkbox",
            "heading" => esc_html__("Display image instead of icon", 'copallyt'),
            "param_name" => "wd_image_checkbox",
            'value' => array( esc_html__( 'Yes, please', 'copallyt' ) => 'yes' ),
        )
        );
vc_add_param("vc_tab",
        array(
            "type" => "attach_image", // it will bind a img choice in WP
            "heading" => esc_html__("Image", 'copallyt'),
            "param_name" => "wd_image",
        )
        );
vc_add_param("vc_tab",
        array(
            "type" => "attach_image", // it will bind a img choice in WP
            "heading" => esc_html__("Background Image", 'copallyt'),
            "param_name" => "wd_bg_image",
        )
        );
vc_add_param("vc_tab",
        array(
            "type" => "dropdown", // it will bind a img choice in WP
            "heading" => esc_html__("Background position H", 'copallyt'),
            "param_name" => "wd_bg_position_h",
            "value" => array(
              "Left" => "left",
              "Right" => "right",
              "Center" => "center"
            ),
        )
        );
vc_add_param("vc_tab",
        array(
            "type" => "dropdown", // it will bind a img choice in WP
            "heading" => esc_html__("Background position V", 'copallyt'),
            "param_name" => "wd_bg_position_v",
            "value" => array(
              "Top" => "top",
              "Bottom" => "bottom",
              "Center" => "center"
            ),
        )
        );
vc_add_param("vc_tab",
        array(
            "type" => "dropdown", // it will bind a img choice in WP
            "heading" => esc_html__("Background Repeat", 'copallyt'),
            "param_name" => "wd_bg_repeat",
            "value" => array(
              "repeat-x" => "repeat-x",
              "repeat-y" => "repeat-y",
              "repeat" => "repeat-x",
              "no-repeat" => "no-repeat"
            ),
        )
        );