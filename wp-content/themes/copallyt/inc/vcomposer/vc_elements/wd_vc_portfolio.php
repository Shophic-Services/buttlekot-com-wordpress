<?php 

global $vc_add_css_animation;
//-----------------portfolio------------------*/

vc_map( array(
    "name" => esc_html__("Portfolio", 'copallyt'),
    "base" => "wd_vc_portfolio", 
    "icon" => get_template_directory_uri()."/images/icon/meknes.png",
    "content_element" => true, 
    "is_container" => FALSE,
    "params" => array(         
		array(
            "type" => "textfield", // it will bind a textfield in WP
            "heading" => esc_html__("Items to display", 'copallyt'),
            "param_name" => "itemperpage",
        ),
        array(
            "type" => "textfield", // it will bind a textfield in WP
            "heading" => esc_html__("Show", 'copallyt'),
            "param_name" => "number",
        ),
				array(
            "type" => "textfield", // it will bind a textfield in WP
            "heading" => esc_html__("Margin", 'copallyt'),
            "param_name" => "margin",
        ),
				array(
            "type" => "dropdown", // it will bind a textfield in WP
            "heading" => esc_html__("Layout", 'copallyt'),
            "param_name" => "layout",
             "value" => array('grid'=>'1','carousel'=>'2'),
        ),
        $vc_add_css_animation
    
    )
) );