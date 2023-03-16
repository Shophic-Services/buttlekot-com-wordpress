<?php 

global $vc_add_css_animation;
vc_map( array(
    "name"            => esc_html__("Pricing Table", 'copallyt'), // add a name
    "base"            => "wd_pricing_table", // bind with our shortcode
    "description"     => "You can add a prince table",
    "content_element" => true, // set this parameter when element will has a content
    "is_container"    => FALSE, // set this param when you need to add a content element in this element
    // Here starts the definition of array with parameters of our compnent
    "params" => array( 
        array(
            "type" => "textfield",
            "heading" => esc_html__("Title", 'copallyt'),
            "param_name" => "title",
        ), 
        array(
            "type" => "textfield",
            "heading" => esc_html__("Price", 'copallyt'),
            "param_name" => "price",
        ), 
        array(
            "type" => "textfield",
            "heading" => esc_html__("Description", 'copallyt'),
            "param_name" => "description",
        ), 
        array(
            "type" => "textfield",
            "heading" => esc_html__("Button Text", 'copallyt'),
            "param_name" => "button_text",
            "value" => "Buy Now",
        ), 
        array(
            "type" => "vc_link",
            "heading" => esc_html__("Button Link", 'copallyt'),
            "param_name" => "button_link",
        ),
        array(
            'type' => 'param_group',
            'value' => '',
            'param_name' => 'plan_options',
            'params' => array(
                array(
                    'type' => 'textfield',
                    'value' => '',
                    'heading' => 'Enter your Plan Option(multiple field)',
                    'param_name' => 'plan_option',
                )
            )
        ),
        array(
            "type" => "checkbox",
            "heading" => esc_html__("Set this table as featured", 'copallyt'),
            "param_name" => "featured",
            "value" =>array( esc_html__( 'Yes, please', 'copallyt' ) => 'featured' ),
        ),
        $vc_add_css_animation
    )
) );